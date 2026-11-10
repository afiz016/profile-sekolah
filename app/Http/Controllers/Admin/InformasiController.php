<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::latest()->paginate(10);
        return view('admin.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            try {
                $file = $request->file('gambar');
                
                // Buat nama file yang unik
                $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
                
                // Simpan file
                $path = $file->storeAs('informasi', $filename, config('filesystems.media_disk'));
                
                // Simpan path relatif ke database
                $data['gambar'] = $path;
                
                // Log untuk debugging
                \Log::info('File berhasil disimpan: ' . $path);
                
            } catch (\Exception $e) {
                \Log::error('Error uploading file: ' . $e->getMessage());
                return redirect()->back()->withErrors(['gambar' => 'Gagal mengupload gambar: ' . $e->getMessage()])->withInput();
            }
        }

        $informasi = Informasi::create($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function edit(Informasi $informasi)
    {
        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            try {
                // Hapus gambar lama jika ada
                if ($informasi->gambar) {
                    Storage::disk(config('filesystems.media_disk'))->delete($informasi->gambar);
                }
                
                $file = $request->file('gambar');
                
                // Buat nama file yang unik
                $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
                
                // Simpan file
                $path = $file->storeAs('informasi', $filename, config('filesystems.media_disk'));
                
                // Simpan path relatif ke database
                $data['gambar'] = $path;
                
                \Log::info('File berhasil diupdate: ' . $path);
                
            } catch (\Exception $e) {
                \Log::error('Error updating file: ' . $e->getMessage());
                return redirect()->back()->withErrors(['gambar' => 'Gagal mengupload gambar: ' . $e->getMessage()])->withInput();
            }
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy(Informasi $informasi)
    {
        try {
            if ($informasi->gambar) {
                Storage::disk(config('filesystems.media_disk'))->delete($informasi->gambar);
            }
            $informasi->delete();
            return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting informasi: ' . $e->getMessage());
            return redirect()->route('admin.informasi.index')->with('error', 'Gagal menghapus informasi.');
        }
    }
}