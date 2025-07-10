<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $userID = User::inRandomOrder()->value('id');
        $title = fake()->word();
        $status = fake()->randomElement(['D', 'P', 'I']);

        return [
            "user_id" => $userID,
            "title" => $title,
            "content" => fake()->paragraph(),
            "slug" => Str::slug($title),
            "publication_date" => $status == 'P' ? fake()->dateTimeBetween('-1 year', 'now') : null,
            "status" => $status,
            "featured_image_url" => fake()->imageUrl(640, 480, 'animals', true),
        ];
    }
}
