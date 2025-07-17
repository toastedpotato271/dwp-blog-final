@extends('layouts.master')
    
@section('content')

<div class="flex gap-15 mt-5">
    <div class="w-[30%]">
        <div class="text-2xl font-bold">Categories</div>
        <div class="grid grid-cols-1 gap-2 mt-5">
            <button class="bg-green-800 rounded-2xl mb-2 p-5 cursor-pointer text-white text-left">
                Budgeting & Savings           
            </button>
            <button class="border border-gray-300 rounded-2xl mb-2 p-5 cursor-pointer text-gray text-left">
                Investing
            </button>
              <button class="border border-gray-300 rounded-2xl mb-2 p-5 cursor-pointer text-gray text-left">
                Debt & Credit
            </button>
              <button class="border border-gray-300 rounded-2xl mb-2 p-5 cursor-pointer text-gray text-left">
                Financial Planning
            </button>
            <button class="border border-gray-300 rounded-2xl mb-2 p-5 cursor-pointer text-gray text-left">
                Career & Income
            </button>
        </div>
    </div>
    <div class="w-[70%]">
        <div class="text-2xl font-bold">Budgeting & Savings</div>
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
                    </div>
                    <div class="text-black mb-4">{{$post->content}}</div>
                    <a class="text-white bg-green-700 py-3 px-5 rounded-xl cursor-pointe mt-3" href="{{ route('posts.show', $post->id) }}">Read more</a>
                </div>
            @endforeach
            
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
          
        </div>
    </div>
    
</div>

@endsection
