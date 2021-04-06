@extends('layout')

@section('content')

        <form method="post" action="{{ route('store') }}" class="form-group">
            @csrf
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            @if($errors->has('title'))
                <small>{{ $errors->first('title') }}</small>
            @endif
            <br/>
            <br/>
            <div class="form-control">
                <label>Post-Content</label>
                <textarea rows="10" cols="50" name="content" class="form-control"
                          id="tinymce">{{ old('content') }}</textarea>
                @if($errors->has('content'))
                    <small>{{ $errors->first('content') }}</small>
                @endif
            </div>

            <div>
                <label>Post-image</label>
                <input type="file" class="form-control-file" id="postImage" name="postImage">
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
@endsection

