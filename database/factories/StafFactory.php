<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staf>
 */
class StafFactory extends Factory
{
    public function definition()
    {
        return [
            'nip' => fake()->numberBetween(111111111111111111, 999999999999999999),
            'name' => fake()->name(),
            'username' => fake()->unique()->userName(),
            'position' => fake()->sentence(2),
            'address' => fake()->address(),
            'dob' => fake()->date(),
            'education' => fake()->sentence(2),
        ];
    }
}
