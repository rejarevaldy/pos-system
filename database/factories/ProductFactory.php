<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_code'      => Str::upper($this->faker->randomElement(["SEL", 'ADM',]) .  $this->faker->numberBetween(0, 255)),
            'product_name'      => 'Product Example ' . $this->faker->numberBetween(0, 50),
            'product_type'      => 'Example',
            'product_weight'    =>  $this->faker->numberBetween(10, 1000),
            'product_unit'      =>  $this->faker->randomElement(['kg', 'g', 'ml', 'oz', 'l', 'ml']),
            'product_brand'     => 'Example',
            'product_status'    => $this->faker->randomElement(['avaible', 'empty']),
            'stock'             => $this->faker->numberBetween(10, 100),
            'price'             => $this->faker->numberBetween(10, 10000),
        ];
    }
}
