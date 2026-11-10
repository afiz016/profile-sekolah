<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use App\Models\Kontak;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $groups = Pengaturan::all()->groupBy('group');

        // Ensure expected groups exist to prevent "Undefined array key" in views
        $pengaturan = [
            'general' => $groups->get('general', collect()),
            'contact' => $groups->get('contact', collect()),
            'profile' => $groups->get('profile', collect()),
        ];

        // Get contact messages
        $kontaks = Kontak::latest()->paginate(10);
        $unreadCount = Kontak::unread()->count();

        return view('admin.pengaturan.index', compact('pengaturan', 'kontaks', 'unreadCount'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
        ]);

        $settings = $request->input('settings', []);

        // Normalize and validate WhatsApp number if provided
        if (isset($settings['whatsapp_sekolah'])) {
            $raw = $settings['whatsapp_sekolah'];
            // Remove anything except digits and plus sign
            $normalized = preg_replace('/[^0-9+]/', '', $raw);
            // Ensure only a leading plus is allowed
            $normalized = preg_replace('/(?!^)\+/', '', $normalized);

            // Validate: optional leading +, then 8-15 digits (common range for international numbers)
            if (!preg_match('/^\+?[0-9]{8,15}$/', $normalized)) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['settings.whatsapp_sekolah' => 'Format nomor WhatsApp tidak valid. Gunakan kode negara, mis. 62812...']);
            }

            // Save normalized value back to settings so we store a clean number
            $settings['whatsapp_sekolah'] = $normalized;
        }

        try {
            foreach ($settings as $key => $value) {
                // Normalize null to empty string to match DB NOT NULL column
                if (is_null($value)) {
                    $value = '';
                }

                // If array/object, encode as JSON
                if (is_array($value) || is_object($value)) {
                    $value = json_encode($value);
                }

                // Invalidate cache for this setting key to ensure frontend reads fresh value
                Cache::forget('pengaturan:' . $key);

                Pengaturan::set($key, $value);
            }
        } catch (QueryException $e) {
            // Return with error message, keep old input
            return redirect()->back()->withInput()->withErrors(['db' => 'Terjadi kesalahan saat menyimpan pengaturan: ' . $e->getMessage()]);
        }

        return redirect()->route('admin.pengaturan')->with('success', 'Pengaturan berhasil diperbarui.');
    }

    // Methods for handling contact messages
    public function showKontak($id)
    {
        $kontak = Kontak::findOrFail($id);
        
        // Mark as read when viewed
        if (!$kontak->is_read) {
            $kontak->markAsRead();
        }
        
        return view('admin.pengaturan.show-kontak', compact('kontak'));
    }

    public function markAsRead($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->markAsRead();
        
        return redirect()->back()->with('success', 'Pesan ditandai sebagai sudah dibaca.');
    }

    public function destroyKontak($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();
        
        return redirect()->route('admin.pengaturan')->with('success', 'Pesan berhasil dihapus.');
    }
}
