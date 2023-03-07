<?php

namespace Database\Factories;

use App\Models\Billing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class OneKBillingFactory extends Factory
{
    protected $model = Billing::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'codes' => 01 . fake()->unique()->randomNumber(4),
            'amount' => 1000,
            'used' => 0,
            'filled_at' => null
        ];
    }
}
