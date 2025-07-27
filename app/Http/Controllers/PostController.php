<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;




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
        Log::info("Post.create - Showing post creation form.");

        $categories = Category::all();

        return view('posts.create', ['categories' => $categories]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info("Post.create - Post Store Function START");
        Log::info("Post.create - \$request values", $request->all());

        // Step 1: Validate inputs
        $validated_request_items = $request->validate([
            'post_title' => 'required|string|max:255',
            'post_content' => 'required|string',
            'post_image' => 'nullable|string',
            'post_category' => 'nullable|array',
            'post_category.*' => 'exists:categories,id',
            'post_tag' => 'nullable|string', // JSON string of tags from hidden input
        ]);

        // 1 : Validating Inputs - but for images
        $isValidImageLink = function (?string $url): bool {
            if (!$url) return true; // It's nullable
            $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $parsedUrl = parse_url($url);
            $host = $parsedUrl['host'] ?? '';
            $path = $parsedUrl['path'] ?? '';

            // Step 2: Check if image ends with valid extensions
            foreach ($validExtensions as $ext) {
                if (str_ends_with(strtolower($path), ".$ext")) {
                    return true;
                }
            }

            // Step 3: If failed, check which host it come from.
            $trustedHosts = ['images.unsplash.com', 'plus.unsplash.com'];
            if (in_array($host, $trustedHosts)) {
                return true;
            }

            return false;
        };

        // 1: ❌ Reject bad image links
        $valid_image_link_flag = $validated_request_items['post_image'];
        if ($valid_image_link_flag == false) {
            return back()->withErrors(['post_image' => 'The image URL must be a valid image or an Unsplash link.'])->withInput();
        }

        // Step 2: Slug (must be unique) Generator - then create the unique slug
        $make_slug_unique_from_db = function (string $newSlug) {
            $counter = 1;
            $original = $newSlug;
            while (Post::where('slug', $newSlug)->exists()) {
                $newSlug = "{$original}-{$counter}";
                $counter++;
            }
            return $newSlug;
        };
        $tempSlug = Str::slug($validated_request_items['post_title']);
        $newSlug = $make_slug_unique_from_db($tempSlug);

        // Step 3: Optional: check if categories are attached.
        if (empty($validated_request_items['post_category'])) {
            Log::info("Post.create - post wasn't attached with categories");
        } else {
            Log::info("Post.create - post category attached", [
                'category' => $validated_request_items['post_category']
            ]);
        }

        // Step 4: Create the Post
        $post = new Post();
        $post->title = $validated_request_items['post_title'];
        $post->slug = $newSlug;
        $post->status = 'D'; // D - Draft
        $post->content = $validated_request_items['post_content'];
        $post->featured_image_url = $validated_request_items['post_image'] ?? null;
        $post->publication_date = now();
        $post->last_modified_date = now();
        $post->user_id = Auth::id();

        $post->save();

        try {
            if ($post->save()) {

                $post->categories()->sync($request->post_category ?? []);

                Log::info("Post.create - Post successfully published and saved to DB");
            } else {
                Log::warning("Post.create - Post.save() returned false");
            }
        } catch (\Exception $e) {
            Log::error("Post.create - Exception occurred: " . $e->getMessage());
        }



        // Step 4: Redirect or return view
        Log::info("Post.create - Post Store Function END");
        return redirect()->route('posts.create')->with('success', 'Post created successfully!');
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
