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
            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>

            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>

            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>

            <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-2xl font-semibold">Title here</div>
                <div class="text-sm text-gray-500 mb-2">Author here</div>
                <div class="text-black mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut officia molestias placeat minima nisi quasi quam animi harum. Vero eaque nam perferendis ut sapiente velit at beatae quidem voluptatem eos!</div>
                <button class="text-white bg-green-700 py-2 px-5 rounded-xl cursor-pointer">Read more</button>
            </div>
        </div>
    </div>
    
</div>

@endsection
