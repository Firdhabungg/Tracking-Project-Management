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
            'title' => 'SI Pendataan Atlet Daerah',
            'client_id' => 3,
            'user_id' => 3,
            'start_date' => '2026-02-02',
            'end_date' => '2026-05-30',
            'progress' => 40,
            'status' => 'in_progress',
        ]);
        Project::create([
            'title' => 'SI Pendataan Atlet Daerah',
            'client_id' => 4,
            'user_id' => 4,
            'start_date' => '2026-09-02',
            'end_date' => '2027-01-15',
            'progress' => 100,
            'status' => 'completed',
        ]);
    }
}
