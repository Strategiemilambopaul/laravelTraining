@extends('layouts.app')
@section('content')
    <h1>Mes articles</h1>
    <ul>
        @foreach($articles as $article)
        <li>
            <a href="{{route('article', ['id'=>$article->id])}}">{{$article->tittle}}</a>
        </li>
        <p>{{$article->content}}</p>
        @endforeach
    </ul>

    <hr>

    <h3>Différents videos</h3>
    @forelse($videos as $video )
        <ul>

            <li>{{$video->name}} : <a href="">{{$video->url}}</a></li>
        </ul>
        @foreach($video->comments as $commentvideo)
        
        <p>{{$commentvideo->content}}</p>
        @endforeach
    @empty
        <li>Not Videos</li>
    @endforelse
@endsection
    