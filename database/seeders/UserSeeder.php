<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin Account',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);

        User::factory()->create([
            'name' => 'User One',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user1111')
        ]);

        User::factory()->create([
            'name' => 'User Two',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('user2222')
        ]);
    }
}
