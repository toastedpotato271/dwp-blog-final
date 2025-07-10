<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            RoleSeeder::class,
            PostSeeder::class,
            MediaSeeder::class,
            CommentSeeder::class,
            RelationshipSeeder::class
        ]);
    }
}
