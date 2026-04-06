<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@vitalpulse.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        // Create sample regular users
        User::create([
            'name' => 'John Doe',
            'email' => 'test1@example.com',
            'password' => bcrypt('test123'),
            'role' => 'user',
        ]);

        
    }
}
