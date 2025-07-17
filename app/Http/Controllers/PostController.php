<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $category = $request->query('category');

        $posts = Post::query();

        if ($category) {
            $posts->whereHas('categories', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        }

        $posts = $posts->whereNotNull('publication_date')
            ->with(['users', 'media', 'categories'])
            ->orderBy('publication_date', 'desc')
            ->paginate(10);

        $categories = Category::all();

        return view('posts.index', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = Post::with('categories')->find($id);
        $others = Post::with('categories')->inRandomOrder()->take(3)->get();

        $comments = $posts->comments()->with('users')->get();

        return view('posts.show', [
            'post' => $posts,
            'comments' => $comments,
            'others' => $others
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
