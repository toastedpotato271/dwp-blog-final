@extends('layouts.master')
    
@section('content')


<div class="px-15 mb-10 mt-10 max-w-2xl mx-auto space-y-8">
    <a class="flex items-center gap-2 mb-10 mt-5 text-green-800 cursor-pointer" href="{{route('landing')}}"><x-ri-arrow-left-long-line class="h-5"/>Back to home</a>
    <!-- 💬 Comment Form -->
    <div class="space-y-3">
        <h2 class="text-xl font-semibold">Create a blog</h2>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf <!-- for security reasons -->
            <input name="post_title" type="text" placeholder="Title" class="w-full h-10 p-4 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <textarea
                name="post_content" 
                placeholder="Write your content here..."
                class="w-full h-50 p-4 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
            ></textarea>
            <input name="post_image" type="image-link" placeholder="Image Link" class="w-full h-10 p-4 mb-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"/>
            <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 my-2">
                Select Categories:
            </label>
            <div class="grid mb-5">
                @foreach ($categories as $category)
                    <label class="inline-flex items-center">
                        <input 
                            type="checkbox" 
                            name="post_categories[]" 
                            value="{{ $category->id }}" 
                            class="form-checkbox text-blue-600"
                            {{ in_array($category->id, old('post_category', [])) ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">{{ $category->category_name }}</span>
                    </label>
                @endforeach
            </div>
            <!-- TAG INPUT -->
            <div id="tagBox" class="w-full mb-3">
            <!-- existing tags get injected here -->
            <div id="tagContainer" class="flex flex-wrap gap-2 mb-2"></div>

            <!-- the input -->
            <input
                name="post_tags"
                id="tagInput"
                type="text"
                placeholder="Add a tag and press Enter"
                class="w-full h-10 p-4 border border-gray-300 rounded-lg
                    focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <script>
                // simple state
                const tags = [];
                const input = document.getElementById('tagInput');
                const container = document.getElementById('tagContainer');

                // render helper
                function renderTags() {
                    container.innerHTML = '';
                    tags.forEach((tag, i) => {
                    const chip = document.createElement('span');
                    chip.className =
                        'flex items-center gap-1 bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm';
                    chip.innerHTML = `
                        ${tag}
                        <button data-index="${i}" class="text-blue-500 hover:text-blue-700">
                        &times;
                        </button>`;
                    container.appendChild(chip);
                    });
                }

                // add tag on Enter / comma
                input.addEventListener('keydown', (e) => {
                    if ((e.key === 'Enter' || e.key === ',') && input.value.trim()) {
                    e.preventDefault();
                    tags.push(input.value.trim());
                    input.value = '';
                    renderTags();
                    }
                });

                // remove tag on × click
                container.addEventListener('click', (e) => {
                    if (e.target.tagName === 'BUTTON') {
                    tags.splice(e.target.dataset.index, 1);
                    renderTags();
                    }
                });
            </script>
            {{-- SUBMIT BUTTON --}}
            <div class="flex justify-center">
                <button class="px-10 py-3 mt-5 bg-green-800 text-white rounded-2xl transition cursor-pointer">
                    Post Now
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
