@extends('layouts.master')

@section('content')
<div class="mx-30">


    <div class="mb-5 flex items-end justify-between">
        <h1 class="font-semibold text-2xl">Categories</h1>
        <a href="{{route('categories.create')}}" class="bg-blue-500 text-white px-5 py-2 rounded-2xl cursor-pointer flex gap-2 items-center"><x-tabler-plus class="h-5"/> Add Role</a>
    </div>

    @if(session('error'))
        <div class="border border-red-400 text-red-400 my-5 p-2 rounded-2xl text-center">{{ session('error') }}</div>
    @endif
    

    <div class="grid grid-cols-[1fr_2fr_4fr_4fr]">
        <div class="bg-gray-100 p-5 font-semibold text-center">ID</div>
        <div class="bg-gray-100 p-5 font-semibold text-center">Role Name</div>
        <div class="bg-gray-100 p-5 font-semibold text-center">Description</div>
        <div class="bg-gray-100 p-5 font-semibold text-center">Actions</div>

        @foreach ($categories as $category)
        <div class="border-b-1 border-gray-200 p-5 text-center">{{$category->id}}</div>
        <div class="border-b-1 border-gray-200 p-5 text-center">{{$category->category_name}}</div>
        <div class="border-b-1 border-gray-200 p-5">{{$category->description}}</div>
        <div class="border-b-1 border-gray-200 p-5 text-center">
            <div class="flex flex-wrap items-center justify-center gap-2">
                       
                <a href="{{route('categories.edit', $category->id)}}" class="bg-yellow-400 text-white px-5 py-2 rounded-2xl cursor-pointer">
                    <x-tabler-pencil />
                </a>
         
                <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-2xl cursor-pointer">
                        <x-tabler-trash />
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection