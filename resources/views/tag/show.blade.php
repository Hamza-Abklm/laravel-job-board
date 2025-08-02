<x-layout :title="$pageTitle">

    <h2>Tag : {{ $tag->title }}</h2>


    <h3>Related posts</h3>
    <ul>
        @forelse ($tag->posts as $post)
            <li>
                <strong>{{ $post->title }}</strong>
                <p>{{ $post->body }}</p>
                <p>Author : {{ $post->author }}</p>
                <a href="{{ route('blog.show', $post->id) }}">View full Post</a>
            </li>
        @empty
            <p>No Related Post found for this comment</p>
        @endforelse
    </ul>

    


</x-layout>