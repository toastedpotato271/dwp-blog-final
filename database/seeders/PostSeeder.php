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

                Post::factory(100)->make()->each(function ($post) use ($user) {
                        $post->user_id = $user->random()->id;
                        $post->save();
                        $post->view_count = rand(0, 99);
                });
        }
}
