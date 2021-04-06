@extends('layout')

@section('page-title', "Post: {$post->title}")

@section('content')

    <p>{!! $post->content !!}</p>

    <p>Added {{ $post->created_at->diffForHumans() }}

    </p>
    @can('update',$post)
        <a href="{{route('edit', $post->id )}}" class="btn btn-primary">
            edit
        </a>
    @endcan

    @can('delete',$post)
        <form method="post" action="{{route('delete', $post->id)}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete" class="btn btn-primary">
        </form>
    @endcan


    @include('comments._form')

    <h4>Comments</h4>
    @foreach($post->comments as $comment)
        <div>{{ $comment->content }}</div>
    @endforeach
@endsection

