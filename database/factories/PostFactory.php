<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word,
            'content' => fake()->realTextBetween(),
            'thumbnail' => 'https://picsum.photos/id/' . rand(1, 1000) . '/200/300',
            'status' => 1,
        ];
    }
}
