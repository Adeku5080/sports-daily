@extends('layout')

@section('content')

    <form method="post" action="{{ route('store') }}">
        @csrf
        <label>Title</label>

        <input type="text" name="title" value="{{ old('title') }}">
        @if($errors->has('title'))
            <small>{{ $errors->first('title') }}</small>
        @endif

        <br/>
        <br/>

        <textarea rows="10" cols="50" name="content">{{ old('content') }}</textarea>

        @if($errors->has('content'))
            <small>{{ $errors->first('content') }}</small>
        @endif

        <button>Submit</button>
    </form>
@endsection
