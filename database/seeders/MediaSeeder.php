<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            Media::factory()->create([
                'post_id' => $post->id,
            ]);
        }
    }
}
