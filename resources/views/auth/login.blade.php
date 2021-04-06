
<!Doctype html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href={{asset('vendor/bootstrap/css/bootstrap.css')}}>
</head>
<body>
<div class="container">
    <form method="post" action="{{route('login')}}" class="mb-3">
        @csrf

        <label class="form-label">E-mail</label>
        <input type="text" name="email" value="{{old('email')}}" class="form-control">
        @if($errors->has('email'))
            <small>{{ $errors->first('email') }}</small>
        @endif
        <br/><br/>

        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
        @if($errors->has('password'))
            <small>{{ $errors->first('password') }}</small>
        @endif
        <br/><br/>
        <div class="form-check">
            <input  class="form-check-input" type="checkbox" name="remember" value="{{old('remember') ? 'checked': ''}}">
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <p>You dont have an account? <a href="{{route('register')}}">Register</a></p>

    </form>
</div>



</body>
</html>
