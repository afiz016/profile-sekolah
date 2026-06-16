<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeri = [
            [
                'judul' => 'Kegiatan Belajar Mengajar',
                'gambar' => 'placeholder.jpg',
                'deskripsi' => 'Suasana belajar mengajar yang kondusif di kelas',
                'kategori' => 'akademik',
                'is_published' => true,
            ],
            [
                'judul' => 'Laboratorium Sains',
                'gambar' => 'placeholder.jpg',
                'deskripsi' => 'Fasilitas laboratorium sains yang lengkap dan modern',
                'kategori' => 'fasilitas',
                'is_published' => true,
            ],
            [
                'judul' => 'Kegiatan Olahraga',
                'gambar' => 'placeholder.jpg',
                'deskripsi' => 'Siswa-siswi sedang melakukan kegiatan olahraga',
                'kategori' => 'ekstrakurikuler',
                'is_published' => true,
            ],
            [
                'judul' => 'Perpustakaan Sekolah',
                'gambar' => 'placeholder.jpg',
                'deskripsi' => 'Perpustakaan dengan koleksi buku yang lengkap',
                'kategori' => 'fasilitas',
                'is_published' => true,
            ],
            [
                'judul' => 'Kegiatan Seni dan Budaya',
                'gambar' => 'placeholder.jpg',
                'deskripsi' => 'Penampilan siswa dalam acara seni dan budaya',
                'kategori' => 'ekstrakurikuler',
                'is_published' => true,
            ],
            [
                'judul' => 'Upacara Bendera',
                'gambar' => 'placeholder.jpg',
                'deskripsi' => 'Kegiatan upacara bendera setiap hari Senin',
                'kategori' => 'kegiatan',
                'is_published' => true,
            ]
        ];

        foreach ($galeri as $item) {
            Galeri::create($item);
        }
    }
}
