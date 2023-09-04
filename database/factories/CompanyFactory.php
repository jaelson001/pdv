<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            "primary"=> "#333333",
            "accent"=> "#ff8915",
            "secondary"=> "#242424",
            "theme"=> "light",//dark, light, system
            "logo"=> "public/logo.ico",
            'remember_token' => Str::random(10),
        ];
    }
}
