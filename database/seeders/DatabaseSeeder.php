<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating a test user manually
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Encrypt the password
            'is_admin' => true, // Ensure you have an is_admin column in users table
        ]);

        // Generate 10 random users
        User::factory(10)->create();
    }
}
