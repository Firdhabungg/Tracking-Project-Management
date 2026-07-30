<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        Project::create([
            'title' => 'Sistem Management Stok Barang',
            'client_id' => 5,
            'user_id' => 5,
            'start_date' => '2026-01-20',
            'end_date' => '2026-06-10',
            'progress' => 75,
            'status' => 'in_progress',
        ]);
    }
}
