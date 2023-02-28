<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => mt_rand(2, 6),
            'title' => fake()->sentence(2),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraphs(5, 9)
        ];
    }
}
