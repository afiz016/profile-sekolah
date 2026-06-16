<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin_sekolah@gmail.com',
            'password' => Hash::make('admin1234'), // password terenkripsi
        ]);

        $this->call([
            InformasiSeeder::class,
            GaleriSeeder::class,
            PengaturanSeeder::class,
        ]);
    }
}
