<x-layout :title="$pageTitle">

    <h2 class="text-2xl">{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <p>{{ $post->author }}</p>

    <!-- --------------------------- -->

    <!-- 💬 Comment Section -->
    <div class="mt-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Comments</h2>

        <!-- Add Comment Form -->
        <form method="POST" action="/comments" class="mb-6">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input value="{{ old('author') }}" type="text" name="author" id="author"
                    class="mt-1  {{ $errors->has('author') ? 'border-red-500' : 'border-gray-300' }} block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                @error('author')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">Comment</label>
                <textarea name="content" id="content" rows="3"
                    class="mt-1 {{ $errors->has('content') ? 'border-red-500' : 'border-gray-300' }} block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('content') }}</textarea>
                @error('content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            @if (session("success"))
                <div class="bg-green-50 px-3 py-2 my-2">{{ session('success') }}</div>

            @endif
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Submit Comment
            </button>
        </form>

        <!-- Display Comments -->
        @forelse ($comments as $comment)
            <div class="bg-gray-50 p-4 rounded shadow mb-2">
                <p class="text-sm text-gray-600 font-semibold">{{ $comment->author }}</p>
                <p class="text-gray-800">~ {{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
        @endforelse

       
    </div>

</x-layout>