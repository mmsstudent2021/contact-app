<?php

namespace Database\Seeders;

use App\Models\Billing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Billing::factory(50)->oneThousand()->create();
        Billing::factory(50)->threeThousand()->create();
        Billing::factory(50)->fiveThousand()->create();
    }
}
