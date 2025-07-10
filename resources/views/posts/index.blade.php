@extends('layouts.app')
@section('content')
    
<div class="p-10">
    <div class="grid grid-cols-4 gap-4">
        @foreach ($posts as $post)
            <div class="border border-gray-600 p-5 rounded-xl">
                <div class="font-semibold text-2xl">{{$post->title}}</div>
                <div class="flex my-2">
                    <div class="text-sm rounded-full border p-2">Views: {{$post->views_count}}</div>
                </div>
                <div class="text-lg">{{$post->content}}</div>
            </div>
        @endforeach
    </div>
</div>