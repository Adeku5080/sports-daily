@extends('layout')

@section('content')

    @foreach($posts as $post)
        @can('view-any', $post)
            <a href="{{ route('show', $post->id) }}" class="d-block">
                <h2>{{ $post->title }}</h2>

                <p class="overflow-wrap">
                    {{ substr(strip_tags($post->content), 0,300) }}{{ strlen(strip_tags($post->content)) > 300 ? "..." : "" }}
                </p>
            </a>
        @endcan
    @endforeach
@endsection

