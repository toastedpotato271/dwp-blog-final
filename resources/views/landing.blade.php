@extends('layouts.master')
@section('title', 'landing')
    
@section('content')

<div class="bg-black p-10 rounded-2xl text-gray-50 min-h-100 flex flex-col-reverse">
    <div>
        <div class="text-md mb-2">Featured</div>
        <div class="text-5xl mb-1">Sample Title Here</div>
        <div class="flex gap-5 items-center justify-center">
            <span class="flex-11/12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam libero facilis assumenda ut in voluptatem fugit veritatis ipsam consectetur corrupti, aliquid autem voluptatibus deserunt facere nihil! Nesciunt nihil voluptatem libero.</span>
            <span class="flex-1/12 cursor-pointer"><x-letsicon-arrow-right-light class="w-10"/></span>
        </div>
    </div>
</div>
<div class="flex gap-10 mt-5">
    <div class="w-[70%]">
        <div class="text-2xl font-bold">Most Popular</div>
        <div class="grid grid-cols-2 gap-7 mt-5">
            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-red-600 font-semibold mb-2">Tag here</div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>

            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-red-600 font-semibold mb-2">Tag here</div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>

            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-red-600 font-semibold mb-2">Tag here</div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>

            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-red-600 font-semibold mb-2">Tag here</div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>
        </div>
    </div>
    <div class="w-[30%]">
        <div class="text-2xl font-bold">Latest</div>
        <div class="grid grid-cols-1 gap-2 mt-5">
            <div class="bg-black h-[200px] rounded-2xl mb-2 p-5 cursor-pointer text-white flex flex-col-reverse">
                <div class="text-md">Tag Here</div>
                <div class="text-2xl mb-1">Sample Title Here</div>
            </div>
            <div class="bg-black h-[200px] rounded-2xl mb-2 p-5 cursor-pointer text-white flex flex-col-reverse">
                <div class="text-md">Tag Here</div>
                <div class="text-2xl mb-1">Sample Title Here</div>
            </div>
            <div class="bg-black h-[200px] rounded-2xl mb-2 p-5 cursor-pointer text-white flex flex-col-reverse">
                <div class="text-md">Tag Here</div>
                <div class="text-2xl mb-1">Sample Title Here</div>
            </div>
            <div class="bg-black h-[200px] rounded-2xl mb-2 p-5 cursor-pointer text-white flex flex-col-reverse">
                <div class="text-md">Tag Here</div>
                <div class="text-2xl mb-1">Sample Title Here</div>
            </div>
        </div>
    </div>
</div>

@endsection

