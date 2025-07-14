@extends('layouts.master')
    
@section('content')

<a class="flex items-center gap-2 px-15 mb-10 mt-5 text-green-800 cursor-pointer" href="{{route('landing')}}"><x-ri-arrow-left-long-line class="h-5"/>Back to home</a>

<div class="px-15 mt-5">
    <div class="text-4xl font-semibold mt-4 mb-1">Title Here</div>
    <div class="flex gap-5 text-gray-600 mb-5">
        <span class="flex items-center"><x-css-profile class="h-4"/> Juan Dela Cruz</span>
        <span class="flex gap-1 items-center"><x-zondicon-time class="h-3"/>{{date('M d, Y')}}</span>
        <span class="bg-red-800 inline-block px-5 py-2 text-white rounded-2xl">Tag Here</span>  
    </div>
    <div class="bg-black rounded-2xl h-90 mb-10"></div>
    <div class="leading-7">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse fermentum nisl vitae suscipit vulputate. Praesent rutrum dui vel justo congue cursus. Vivamus sit amet semper nunc. Vestibulum viverra nulla finibus, pellentesque magna ut, vestibulum nisi. Quisque scelerisque odio sed justo interdum gravida. Vivamus quis massa eget urna dapibus vehicula sed sed nisl. Nunc nec eros ut nibh finibus condimentum. Sed in dapibus tellus, nec tempus diam. Praesent porttitor diam non nisl laoreet, in hendrerit augue iaculis. Proin in urna lobortis, auctor ligula at, malesuada nunc.
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
        <img
            src="https://i.pravatar.cc/40?u=1"
            alt="User avatar"
            class="w-10 h-10 rounded-full"
        />
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <h3 class="font-semibold text-sm">Jane Doe</h3>
                <span class="text-xs text-gray-500">Jul 14, 2025</span>
            </div>
            <p class="mt-1 text-gray-700 text-sm">
                This blog really helped me understand budgeting better. Keep up the great work!
            </p>
        </div>
    </div>
</div>

<hr class="mt-20 text-gray-300">

<div class="px-20 text-2xl font-bold mt-10 text-center">Other Articles</div>
<div class="px-20 grid grid-cols-3 gap-7 mt-5">
    <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-red-600 font-semibold mb-2">Tag here</div>
                <div class="text-2xl font-semibold">Title here</div>
            </div>

             <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-red-600 font-semibold mb-2">Tag here</div>
                <div class="text-2xl font-semibold">Title here</div>
            </div>

             <div class="cursor-pointer">
                <div class="bg-black h-[200px] rounded-2xl mb-2"></div>
                <div class="text-red-600 font-semibold mb-2">Tag here</div>
                <div class="text-2xl font-semibold">Title here</div>
            </div>
</div>

@endsection
