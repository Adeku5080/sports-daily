<!Doctype html>
<html>
<head>
    <title></title>
</head>
<body>

<form method="POST" action="{{ route('password.update') }}">
@csrf

<!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div>
        <label for="email" value='Email'/>E-mail</label>

        <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email', $request->email)}}"
               required autofocus/>
        @if($errors->has('email'))
            <small>{{ $errors->first('email') }}</small>
        @endif
    </div></br>

    <!-- Password -->
    <div class="mt-4">
        <label for="password" value='Password'/>New Password</label>

        <input id="password" class="block mt-1 w-full" type="password" name="password" required/>
        @if($errors->has('password'))
            <small>{{ $errors->first('password') }}</small>
        @endif
    </div></br>

    <!-- Confirm Password -->
    <div class="mt-4">
        <label for="password_confirmation" value='Confirm Password'/>Confirm Password</label>

        <input id="password_confirmation" class="block mt-1 w-full"
               type="password"
               name="password_confirmation" required/>
        @if($errors->has('password_confirmation'))
            <small>{{ $errors->first('password_confirmation') }}</small>
        @endif
    </div>

    <div class="flex items-center justify-end mt-4">
        <button>
            Reset Password
        </button>
    </div>
</form>

</body>
</html>


