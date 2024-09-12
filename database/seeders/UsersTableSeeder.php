<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'admin123',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'phone_number' => '1234567890',
            'role' => 'admin',
        ]);
    }
}
