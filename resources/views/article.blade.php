@extends('layouts.app')
@section('content')
<h2>
    {{$article->tittle}}
    
</h2>

<span>{{$article->image->name ?? "No image"}}</span>
<hr>
<p>{{$article->content}}</p>

<hr>

<h1>Differents Comments</h1>
<ul>
    @forelse($article->comments as $comment)
    <li>{{$comment->content}}</li>
    @empty

    <li>Not Comments</li>
    @endforelse
</ul>
<hr>
<h1>Differents Tags  for this article</h1>
<ol>
    @forelse($article->tags as $tags)
    <li>{{$tags->name}}</li>
        @foreach($tags->posts as $post)
            <ul>
            <li>{{$post->tittle}}</li>
            </ul>
        @endforeach
    @empty

    <li>Not Tags</li>
    @endforelse
</ol>
<hr>
<span style='text-color:red'>Nom de l'artist de l'image: {{$article->artistImage->name ?? 'Inconnu'}}</span>
<hr>
<h4>Recent Image</h4>
<span>{{$article->recentImage->name ?? "not define"}}</span>
<h4>Previous Image</h4>
<span>{{$article->previousImage->name ?? "not define"}}</span>
@endsection