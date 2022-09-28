<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supply>
 */
class SupplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quantity'          => $this->faker->numberBetween(10, 100),
            'purchase_price'    => $this->faker->numberBetween(10, 10000),
            'total_price'       => $this->faker->numberBetween(10, 100000),
            'users_id'          => User::all()->random()->id,
            'products_id'       => Product::all()->random()->id,
            'created_at'        => $this->faker->dateTimeBetween('-1 week')
        ];
    }
}
