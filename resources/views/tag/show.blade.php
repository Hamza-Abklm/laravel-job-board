<x-layout :title="$pageTitle">
    
    <h2 class="text-2xl">{{ $post->title }}</h2>
    <p>{{ $post -> body }}</p>
    <p>{{ $post -> author }}</p>
    
</x-layout>