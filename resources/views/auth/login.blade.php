<!Doctype html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href={{asset('vendor/bootstrap/css/bootstrap.css')}}>
    <link rel="stylesheet" href="{{asset("css/form.css")}}">
</head>
<body>
<div class="container">
    <form method="post" action="{{route('login')}}" class="mb-3 form">
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

            <label class="form-check-label" for="remember_me">
                <input class="form-check-input" type="checkbox" name="remember" id="remember_me"
                       value="{{old('remember') ? 'checked': ''}}">
                Remember Me
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        <div>
            <a href="{{route('register')}} " class="dont">
                you don't have an account? Register
            </a>
        </div>
        <div>
            <a href="{{route('password.request')}}" class="dont">
                forgot your password?
            </a>
            </div>



    </form>
</div>


</body>
</html>
