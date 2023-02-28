<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => mt_rand(2, 6),
            'name' => fake()->sentence(2),
            'slug' => fake()->slug(),
            'body' => fake()->sentence(5),
            'location' => fake()->sentence(2),
            'time' => Carbon::today()->addDays(mt_rand(1, 10)),
        ];
    }
}
