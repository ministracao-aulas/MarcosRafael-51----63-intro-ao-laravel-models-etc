<?php

namespace Database\Factories;

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
            'codigo_produto' => $this->faker->ean8(),
            'quantidade' => $this->faker->randomNumber(2, true),
            'valor' => $this->faker->randomFloat(1, 01, 99),
        ];
    }
}
