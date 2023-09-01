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
            "code" => random_int(7890000000000, 7899999999999),
            "name" => "Product",
            "description" => "Product description",
            "quantity" => 1000,
            "price" => 100,
        ];
    }
}
