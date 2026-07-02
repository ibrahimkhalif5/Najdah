<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
                'name' => 'admin123',
                'email' => 'najdah@gmail.com',
                'password' => bcrypt('najdah@admin'), // Set your desired admin password here
                // Add any other fields if necessary (e.g., role, is_admin, etc.)
            ]);





        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
