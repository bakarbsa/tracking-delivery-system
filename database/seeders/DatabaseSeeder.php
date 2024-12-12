<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => 1,
            'name' => 'Zura',
            'username' => 'zura',
            'password' => bcrypt('zura123'),
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'John Smith',
            'username' => 'john',
            'password' => bcrypt('john123'),
        ]);
        User::factory()->create([
            'id' => 3,
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        Project::factory()
            ->count(30)
            ->hasTasks(30)
            ->create();
    }
}
