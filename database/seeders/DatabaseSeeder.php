<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Billing;
use Database\Factories\OneKBillFactory;
use Database\Factories\ThreeKBillFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call([
            UserSeeder::class,
            ContactSeeder::class,
            PointSeeder::class,
            BillingSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

    }
}
