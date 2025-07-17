
@extends('layouts.master')
@section('title', 'landing')
    
@section('content')

<div class="bg-black p-10 rounded-2xl text-gray-50 min-h-100 flex flex-col-reverse">

    @foreach ($featuredPosts as $post)
        <div>
            <div class="text-md mb-2">Featured</div>
            <div class="text-5xl mb-1">{{$post->title}}</div>
            <div class="flex gap-5 items-center justify-center">
                <span class="flex-11/12">{{Str::limit($post->content,300)}}</span>
                <a class="flex-1/12 cursor-pointer" href="{{ route('posts.show', $post->id) }}"><x-letsicon-arrow-right-light class="w-10" /></a>
            </div>
        </div>
    @endforeach
   
</div>
<div class="flex gap-10 mt-5">
    <div class="w-[70%]">
        <div class="text-2xl font-bold">Latest Posts</div>
        <div>
            <div class="grid grid-cols-2 gap-7 mt-5">
                @foreach ($latestPosts as $post)
                    <div class="cursor-pointer">
                        <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                            @foreach ($post->categories as $category)
                                <div class="text-red-600 font-semibold mb-2">{{$category->category_name}}</div>
                            @endforeach
                        <div class="text-2xl font-semibold">{{$post->title}}</div>
                        <div class="flex gap-5 text-gray-600 my-2">
                            <span class="flex items-center"><x-css-profile class="h-4"/>{{ $post->users->name}}</span>
                            <span class="flex gap-1 items-center">
                                <x-zondicon-time class="h-3" />
                                {{ date('M d, Y', strtotime($post->publication_date)) }}
                            </span>   
                            <span class="flex gap-1 items-center">
                                <x-heroicon-o-eye class="h-5"/>{{ $post->views_count }}
                            </span>                    
                        </div>                    
                        <div class="text-black mb-4">{{Str::limit($post->content,150)}}</div>
                        <a class="text-white bg-green-700 py-3 px-5 rounded-xl cursor-pointe mt-3" href="{{ route('posts.show', $post->id) }}">Read more</a>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $latestPosts->links() }}
            </div>
        </div>
    </div>
    <div class="w-[30%]">
        <div class="text-2xl font-bold">Popular</div>
        <div class="grid grid-cols-1 gap-2 mt-5">

            @foreach ($popularPosts as $post)
                <a class="bg-black h-[200px] rounded-2xl mb-2 p-5 cursor-pointer text-white flex flex-col-reverse" href="{{ route('posts.show', $post->id) }}">
                    @foreach ($post->categories as $category)
                        <div class="text-md">{{$category->category_name}}</div>
                    @endforeach
                    <div class="text-2xl mb-1">{{$post->title}}</div>
                </a>
            @endforeach
 
        </div>
    </div>
</div>

@endsection

