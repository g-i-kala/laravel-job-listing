<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => fake()->sentence(),
            'user_id' => User::query()->inRandomOrder()->value('id') ?? User::factory()->create()->id,
            'post_id' => Post::query()->inRandomOrder()->value('id') ?? Post::factory()->create()->id,
        ];
    }
}
