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
        User::create([
            'name' => 'Default user',
            'email' => 'user@example.com',
            'password' => 'user123',
            'role' => 'user',
            'phone_number' => '123456789',
            'address' => 'JL Desa Apel',
        ]);

        User::create([
            'name' => 'User Admin',
            'email' => 'admin@example.com',
            'password' => 'Admin123',
            'role' => 'admin',
            'phone_number' => '23122341',
            'address' => 'JL Desa Iblis',
        ]);
    }
}