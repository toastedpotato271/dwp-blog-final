<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {

        $featuredPosts = Post::where('featured_post', 1)
            ->orderBy('publication_date', 'desc')
            ->get();

        $latestPosts = Post::where('publication_date', '!=', null)
            ->orderBy('publication_date', 'desc')
            ->paginate(10);

        $popularPosts = Post::where('publication_date', '!=', null)
            ->orderBy('views_count', 'desc')
            ->take(10)  // top 10
            ->get();

        $categories = Category::all();

        return view(
            'landing',
            [
                'featuredPosts' => $featuredPosts,
                'latestPosts' => $latestPosts,
                'popularPosts' => $popularPosts,
                'categories' => $categories
            ]
        );
    }
}