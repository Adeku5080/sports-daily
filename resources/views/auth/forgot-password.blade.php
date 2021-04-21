<!Doctype html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href={{asset('vendor/bootstrap/css/bootstrap.css')}}>
</head>
<body>
<div>
    <form method="Post" action="{{route('password.email')}}">
        @csrf
        <label class="form-label">E-mail</label>
        <input type="text" name="email" value="{{old('email')}}" class="form-control">
        @if($errors->has('email'))
            <small>{{ $errors->first('email') }}</small>
        @endif
        <div class="flex items-center justify-end mt-4">
            <button>
                Email Password Reset link
            </button>
        </div>

    </form>
</div>
</body>
</html>
