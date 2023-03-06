<?php

namespace Database\Seeders;

use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $user){
            Point::factory()->create([
                'balance' => 0,
                'user_id' => $user->id,
            ]);
        }
    }
}
