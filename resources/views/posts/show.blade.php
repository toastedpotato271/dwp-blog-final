@extends('layouts.master')
    
@section('content')

<a class="flex items-center gap-2 px-15 mb-10 mt-5 text-green-800 cursor-pointer" href="{{route('landing')}}"><x-ri-arrow-left-long-line class="h-5"/>Back to home</a>

<div class="px-15 mt-5">
    <div class="text-4xl font-semibold mt-4 mb-1">{{ $post->title }}</div>
    <div class="flex gap-5 text-gray-600 mb-5">
        <span class="flex items-center"><x-css-profile class="h-4"/>{{ $post->users->name }}</span>
        <span class="flex gap-1 items-center"><x-zondicon-time class="h-3"/>{{ date('M d, Y', strtotime($post->publication_date)) }}</span>
        <span class="flex gap-1 items-center">
            <x-heroicon-o-eye class="h-5"/>{{ $post->views_count }}
        </span>   
        @foreach($post->categories as $category)
            <span class="bg-red-800 inline-block px-5 py-2 text-white rounded-2xl">
                {{ $category->category_name }}
            </span>
        @endforeach    
    </div>
    <div class="rounded-2xl h-90 mb-10 bg-cover bg-center" style="background-image: url('{{ $post->media->first()?->url }}')"></div>
    <div class="leading-7">
    {{$post->content}}
    </div>
</div>

<div class="px-15 mb-10 mt-10 max-w-2xl mx-auto space-y-8">

    <!-- 💬 Comment Form -->
    <div class="space-y-3">
        <h2 class="text-xl font-semibold">Leave a Comment</h2>
        <textarea
            placeholder="Write your comment here..."
            class="w-full h-28 p-4 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>
        <div class="flex justify-end">
            <button class="px-4 py-2 bg-green-800 text-white rounded-2xl transition cursor-pointer">
                Post Comment
            </button>
        </div>
    </div>

    <!-- 🧍 Sample Comment -->
    <div class="flex gap-4">
        <div class="flex-1">
            @foreach ($comments as $comment)
                <div class="mb-10">
                    <img
                        src="https://i.pravatar.cc/40?u=1"
                        alt="User avatar"
                        class="w-10 h-10 rounded-full mb-2"
                    />
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-sm">{{$comment->users->name}}</h3>
                        <span class="flex gap-1 items-center text-sm">
                            <x-zondicon-time class="h-2" />
                            {{ date('M d, Y', strtotime($comment->created_at)) }}
                        </span> 
                    </div>
                    <p class="mt-1 text-gray-700 text-sm">
                        {{$comment->comment_context}}
                    </p>
                </div>
            @endforeach

            @if ($comments->isEmpty())
                <div class="flex justify-center items-center py-10">
                    <span class="text-lg text-gray-500">There are no comments yet...</span>
                </div>
            @endif
        </div>
    </div>
</div>

<hr class="mt-20 text-gray-300">

<div class="px-20 text-2xl font-bold mt-10 text-center">Other Articles</div>
<div class="px-20 grid grid-cols-3 gap-7 mt-5">
    @foreach ($others as $other)
        <a class="cursor-pointer" href="{{ route('posts.show', $other->id) }}">
            <div class="h-[200px] rounded-2xl mb-2 bg-cover bg-center" style="background-image: url('{{ $post->media->first()?->url }}')"></div>
            @foreach($other->categories as $category)
                <span class="bg-red-800 inline-block px-5 py-2 text-white rounded-2xl">
                    {{ $category->category_name }}
                </span>
            @endforeach             
        <div class="text-2xl font-semibold">{{$other->title}}</div>
        </a>
    @endforeach
</div>

@endsection
