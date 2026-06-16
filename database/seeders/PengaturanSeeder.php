<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaturan;

class PengaturanSeeder extends Seeder
{
    public function run(): void
    {
        $pengaturan = [
            [
                'key' => 'nama_sekolah',
                'value' => 'SMA Negeri 1 Jakarta',
                'type' => 'text',
                'group' => 'general'
            ],
            [
                'key' => 'alamat_sekolah',
                'value' => 'Jl. Pendidikan No. 123, Jakarta Pusat',
                'type' => 'textarea',
                'group' => 'general'
            ],
            [
                'key' => 'telepon_sekolah',
                'value' => '(021) 123-4567',
                'type' => 'text',
                'group' => 'contact'
            ],
            [
                'key' => 'email_sekolah',
                'value' => 'info@sma1jakarta.sch.id',
                'type' => 'text',
                'group' => 'contact'
            ],
            [
                'key' => 'visi_sekolah',
                'value' => 'Menjadi sekolah unggulan yang menghasilkan generasi berkarakter, berprestasi, dan berbudaya.',
                'type' => 'textarea',
                'group' => 'profile'
            ],
            [
                'key' => 'misi_sekolah',
                'value' => 'Menyelenggarakan pendidikan berkualitas dengan mengembangkan potensi siswa secara optimal.',
                'type' => 'textarea',
                'group' => 'profile'
            ]
        ];

        foreach ($pengaturan as $item) {
            Pengaturan::create($item);
        }
    }
}
