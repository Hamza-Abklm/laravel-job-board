<x-layout :title="$pageTitle">
    <h2>Blog</h2>
    @foreach ($posts as $post)
    <h2 class="text-2xl">{{ $post->title }}</h2>
    <p>{{ $post -> body }}</p>
    <ul>
        @foreach ( $post->comments as $comment )
            <li>{{ $comment->content }},{{ $comment->author }}</li>
        @endforeach
    </ul>
    @endforeach
</x-layout>