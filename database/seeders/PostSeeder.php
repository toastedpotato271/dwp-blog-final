<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                $user = User::all();

                if ($user->count() === 0) {
                        echo 'No users found, please run UserSeeder.';
                        return;
                };

                Post::factory(200)->make()->each(function ($post) use ($user) {
                        $post->user_id = $user->random()->id;

                        if ($post->publication_date != null) {
                                $post->views_count = rand(1, 99);
                        }

                        $post->save();
                });

                $randomPost = Post::where('publication_date', '!=', null)->inRandomOrder()->first();

                if ($randomPost) {
                        $randomPost->update(['featured_post' => true]);
                }
        }
}
