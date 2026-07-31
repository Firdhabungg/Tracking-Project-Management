<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();
        // Client::factory(5)->create();

        // Project::create([
        //     'title' => 'Sistem Management Stok Barang',
        //     'client_id' => 5,
        //     'user_id' => 5,
        //     'start_date' => '2026-01-20',
        //     'end_date' => '2026-06-10',
        //     'progress' => 75,
        //     'status' => 'in_progress',
        // ]);

        // Client::create([
        //     'company_name' => 'CV Berkah Mandiri',
        //     'contact_person' => 'Siti Rahma',
        //     'email' => 'siti@berkahmandiri.id',
        //     'phone' => '+62 856-1122-3344',
        // ]);
        // Client::create([
        //     'company_name' => 'PT Digital Nusantara',
        //     'contact_person' => 'Andi Wijaya',
        //     'email' => 'andi@digitalnusantara.com',
        //     'phone' => '+62 818-7654-3210',
        // ]);
        // Client::create([
        //     'company_name' => 'Koperasi Tani Subur',
        //     'contact_person' => 'Joko Widodo',
        //     'email' => 'joko@tanisubur.org',
        //     'phone' => '+62 21-5550199',
        // ]);
        // Client::create([
        //     'company_name' => 'Koperasi Desa Merah Putih',
        //     'contact_person' => 'Subianto',
        //     'email' => 'subianto@kdmp.org',
        //     'phone' => '+62 812-3456-7890',
        // ]);
        // Client::create([
        //     'company_name' => 'PT Finansial Prima',
        //     'contact_person' => 'Dian Sastro',
        //     'email' => 'dian@finansialprima.co.id',
        //     'phone' => '+62 813-9876-5432',
        // ]);
        // Client::create([
        //     'company_name' => 'PT Mega Finansial Utama',
        //     'contact_person' => 'Jessica Wijaya',
        //     'email' => 'jessica@megafinansial.com',
        //     'phone' => '+62 817-8901-2345',
        // ]);

        // User::create([
        //     'name' => 'Ahmad Hidayat',
        //     'email' => 'ahmad.hidayat@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone' => '+62 812-3456-7890'
        // ]);
        // User::create([
        //     'name' => 'Dewi Lestari',
        //     'email' => 'dewi.lestari@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone' => '+62 813-9876-5432'
        // ]);
        // User::create([
        //     'name' => 'Zahra Helmalia',
        //     'email' => 'zahra.helmalia@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone' => '+62 896-4856-7765'
        // ]);
        // User::create([
        //     'name' => 'Rizky Pratama',
        //     'email' => 'rizky.pratama@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone' => '+62 811-2233-4455'
        // ]);
    }
}
