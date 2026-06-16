<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;
use App\Models\Galeri;
use App\Models\Pengaturan;

class FrontendController extends Controller
{
    public function home()
    {
        $informasiTerbaru = Informasi::published()->latest()->take(3)->get();
        $totalInformasi = Informasi::published()->count();
        $totalGaleri = Galeri::published()->count();
        $pengunjungTerdaftar = 210; // Static for now, can be dynamic later
        
        return view('frontend.home', compact('informasiTerbaru', 'totalInformasi', 'totalGaleri', 'pengunjungTerdaftar'));
    }

    public function profil()
    {
        return view('frontend.profil');
    }

    public function informasi()
    {
        $informasi = Informasi::published()->latest()->paginate(9);
        return view('frontend.informasi', compact('informasi'));
    }

    public function showInformasi($id)
    {
        $informasi = Informasi::published()->findOrFail($id);
        return view('frontend.informasi-detail', compact('informasi'));
    }

    public function galeri()
    {
        $galeri = Galeri::published()->latest()->get();
        return view('frontend.galeri', compact('galeri'));
    }

    public function kontak()
    {
        return view('frontend.kontak');
    }

    public function storeKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string|min:10|max:1000'
        ], [
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama harus minimal 2 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'subjek.required' => 'Subjek harus dipilih',
            'pesan.required' => 'Pesan harus diisi',
            'pesan.min' => 'Pesan harus minimal 10 karakter',
            'pesan.max' => 'Pesan maksimal 1000 karakter'
        ]);

        try {
            // Simpan ke database
            \App\Models\Kontak::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'subjek' => $request->subjek,
                'pesan' => $request->pesan
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.'
            ], 500);
        }
    }
}