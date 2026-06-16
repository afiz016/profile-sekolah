<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Informasi;

class InformasiSeeder extends Seeder
{
    public function run(): void
    {
        $informasi = [
            [
                'judul' => 'Penerimaan Siswa Baru 2024/2025',
                'konten' => 'Sekolah kami membuka pendaftaran siswa baru untuk tahun ajaran 2024/2025. Pendaftaran dibuka mulai tanggal 1 Januari hingga 31 Maret 2024. Persyaratan dan informasi lengkap dapat dilihat di website resmi sekolah.',
                'is_published' => true,
            ],
            [
                'judul' => 'Kegiatan Ekstrakurikuler Semester Genap',
                'konten' => 'Berbagai kegiatan ekstrakurikuler telah dimulai untuk semester genap ini. Siswa dapat memilih dari berbagai pilihan seperti basket, futsal, musik, teater, dan robotika. Pendaftaran masih dibuka hingga akhir bulan ini.',
                'is_published' => true,
            ],
            [
                'judul' => 'Prestasi Siswa dalam Olimpiade Matematika',
                'konten' => 'Siswa-siswi kami berhasil meraih prestasi gemilang dalam Olimpiade Matematika tingkat provinsi. Tiga siswa berhasil masuk ke babak final dan satu siswa meraih medali emas.',
                'is_published' => true,
            ],
            [
                'judul' => 'Program Beasiswa untuk Siswa Berprestasi',
                'konten' => 'Sekolah menyediakan program beasiswa untuk siswa berprestasi dari keluarga kurang mampu. Program ini mencakup biaya sekolah dan perlengkapan belajar selama satu tahun ajaran.',
                'is_published' => true,
            ],
            [
                'judul' => 'Renovasi Laboratorium Komputer',
                'konten' => 'Laboratorium komputer sekolah telah selesai direnovasi dengan peralatan terbaru. Fasilitas ini dilengkapi dengan 40 unit komputer modern dan akses internet berkecepatan tinggi.',
                'is_published' => true,
            ]
        ];

        foreach ($informasi as $item) {
            Informasi::create($item);
        }
    }
}
