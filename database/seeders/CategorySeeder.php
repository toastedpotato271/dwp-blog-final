<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "category_name" => "Budgeting & Savings",
            "slug" => Str::slug("Budgeting & Savings"),
            "description" => "Budgeting & Savings."
        ]);
        Category::create([
            "category_name" => "Investing",
            "slug" => Str::slug("Investing"),
            "description" => "Investing."
        ]);
        Category::create([
            "category_name" => "Debt & Credit",
            "slug" => Str::slug("Debt & Credit"),
            "description" => "Debt & Credit."
        ]);
        Category::create([
            "category_name" => "Financial Planning",
            "slug" => Str::slug("Financial Planning"),
            "description" => "Financial Planningt."
        ]);
        Category::create([
            "category_name" => "Career & Income",
            "slug" => Str::slug("Career & Income"),
            "description" => "Career & Income."
        ]);
    }
}
