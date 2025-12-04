<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role_id' => 1, // Assuming 1 is the ID for Admin role
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
                'role_id' => 2, // Assuming 2 is the ID for User role
            ],  
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }   

    }
}
