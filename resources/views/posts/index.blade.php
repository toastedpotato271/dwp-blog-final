@extends('layouts.master')
    
@section('content')

<div class="flex gap-15 mt-5">
    <div class="w-[30%]">
        <div class="text-2xl font-bold">Categories</div>
        <div class="grid grid-cols-1 gap-2 mt-5">

            <a class="border border-gray-300 rounded-2xl mb-2 p-5 cursor-pointer text-gray text-left {{ request('category') === null ? 'bg-green-800 text-white font-semibold' : 'text-gray-700' }}"
                href="{{ route('posts.index') }}">
                All
            </a>

            @foreach ($categories as $category)
                <a
                    href="{{ route('posts.index', ['category' => $category->slug]) }}"
                    class="border border-gray-300 rounded-2xl mb-2 p-5 cursor-pointer text-left
                        {{ request('category') === $category->slug ? 'bg-green-800 text-white font-semibold' : 'text-gray-700' }}">
                    {{ $category->category_name }}
                </a>
            @endforeach
           
        </div>
    </div>
    <div class="w-[70%]">
        <div>
            <div class="grid grid-cols-2 gap-7 mt-5">
                @foreach ($posts as $post)
                <div class="cursor-pointer">
                        <div class="h-[200px] rounded-2xl mb-2 bg-cover bg-center"
                            style="background-image: url('{{ $post->media->first()?->url }}')">
                        </div>                    
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
                {{ $posts->links() }}
            </div>
          
        </div>
    </div>
    
</div>

@endsection
