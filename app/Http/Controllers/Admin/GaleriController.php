<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            try {
                $file = $request->file('gambar');
                
                // Buat nama file yang unik
                $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
                
                // Simpan file
                $path = $file->storeAs('galeri', $filename, config('filesystems.media_disk'));
                
                // Simpan path relatif ke database
                $data['gambar'] = $path;
                
                // Log untuk debugging
                \Log::info('Galeri file berhasil disimpan: ' . $path);
                
            } catch (\Exception $e) {
                \Log::error('Error uploading galeri file: ' . $e->getMessage());
                return redirect()->back()->withErrors(['gambar' => 'Gagal mengupload gambar: ' . $e->getMessage()])->withInput();
            }
        }

        $galeri = Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            try {
                // Hapus gambar lama jika ada
                if ($galeri->gambar) {
                    Storage::disk(config('filesystems.media_disk'))->delete($galeri->gambar);
                }
                
                $file = $request->file('gambar');
                
                // Buat nama file yang unik
                $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\.]/', '', $file->getClientOriginalName());
                
                // Simpan file
                $path = $file->storeAs('galeri', $filename, config('filesystems.media_disk'));
                
                // Simpan path relatif ke database
                $data['gambar'] = $path;
                
                \Log::info('Galeri file berhasil diupdate: ' . $path);
                
            } catch (\Exception $e) {
                \Log::error('Error updating galeri file: ' . $e->getMessage());
                return redirect()->back()->withErrors(['gambar' => 'Gagal mengupload gambar: ' . $e->getMessage()])->withInput();
            }
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        try {
            if ($galeri->gambar) {
                Storage::disk(config('filesystems.media_disk'))->delete($galeri->gambar);
            }
            $galeri->delete();
            return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error deleting galeri: ' . $e->getMessage());
            return redirect()->route('admin.galeri.index')->with('error', 'Gagal menghapus galeri.');
        }
    }
}
