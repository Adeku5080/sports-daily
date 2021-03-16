@extends('layout')

@section('content')

    <header>
        <div>
            <h3>Sports Daily</h3>
        </div>
        <nav>
            <ul>
                <li>add-post</li>
                <li>log-out</li>
            </ul>
        </nav>
    </header>


    @foreach($posts as $post)
        <a href="{{route('show', ['post'=>$post->id])}}"><h2>{{$post->title}}</h2></a>
    @endforeach
@endsection
