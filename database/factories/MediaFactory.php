<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::inRandomOrder()->value('id'),
            'file_name' => Str::slug(fake()->word(3, true)),
            'file_type' => ".jpg",
            'url' => "https://picsum.photos/200/300",
            'description' => Str::limit(fake()->paragraph(), 50),
            'upload_date' => now(),
        ];
    }
}
