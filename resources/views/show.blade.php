@extends('layout')

@section('content')

    <p>{{$post->content}}</p>

    <a href="{{route('edit',['post'=>$post->id])}}">
        <button>edit</button>
    </a>

    <form method="post" action="{{route('delete', $post->id)}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="delete">
    </form>

@endsection

