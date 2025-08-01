<x-layout :title="$pageTitle">
    <h2>comment exploring</h2>
    @foreach ($comments as $comment)
    <h2 class="text-2xl">{{ $comment->content }}</h2>
    <p>{{ $comment -> author }}</p>
    <a href="/blog/{{ $comment->post->id }}">{{ $comment -> post -> title }}</a>
    @endforeach
</x-layout>