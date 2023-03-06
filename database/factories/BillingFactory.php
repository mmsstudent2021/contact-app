<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function oneThousand()
    {
        return $this->state(function (array $attributes){
            return [
                'code' => 10 . fake()->unique()->randomNumber(4,true),
                'amount' => 1000,
                'used' => 0,
                'filled_at' => null
            ];
        });
    }
    public function threeThousand()
    {
        return $this->state(function (array $attributes){
            return [
                'code' => 30 . fake()->unique()->randomNumber(4,true),
                'amount' => 3000,
                'used' => 0,
                'filled_at' => null
            ];
        });
    }
    public function fiveThousand()
    {
        return $this->state(function (array $attributes){
            return [
                'code' => 50 . fake()->unique()->randomNumber(4,true),
                'amount' => 5000,
                'used' => 0,
                'filled_at' => null
            ];
        });
    }
}
