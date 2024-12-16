<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    User::factory()->create([
      'id' => 1,
      'role_id' => 1,
      'name' => 'Zura Poco',
      'location_id' => 1,
      'username' => 'zura',
      'password' => bcrypt('zura123'),
    ]);
    User::factory()->create([
        'id' => 2,
        'role_id' => 2,
        'name' => 'John Smith',
        'location_id' => 2,
        'username' => 'john',
        'password' => bcrypt('john123'),
    ]);
    User::factory()->create([
        'id' => 3,
        'role_id' => 1,
        'name' => 'Super Admin',
        'location_id' => 3,
        'username' => 'admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin123'),
    ]);
  }
}