@extends('layout')

@section('content')

    <form method="post" action="{{ route('update',['post'=> $post->id]) }}" class="form-group">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" value="{{ old('title',$post->title)}}" class="form-control">
        @if($errors->has('title'))
            <small>{{ $errors->first('title') }}</small>
        @endif

        <br/>
        <br/>

        <textarea rows="10" cols="50" name="content" class="form-control"
                  id="tinymce">{{ old('content', $post->content)}}</textarea>

        @if($errors->has('content'))
            <small>{{ $errors->first('content') }}</small>
        @endif

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
