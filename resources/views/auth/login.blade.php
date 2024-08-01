<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sign In</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Sign In</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="user-box">
                    <input type="text" name="email">
                    <label>Email</label>
                    @if ($errors->has('email'))
                        <span class="error-message">
                            {{$errors -> first('email')}}
                        </span>
                    @endif
                </div>
                <div class="user-box">
                    <input type="password" name="password">
                    <label>Password</label>
                    @if ($errors->has('email'))
                        <span class="error-message">
                            {{$errors -> first('password')}}
                        </span>
                    @endif
                </div>
                <div class="remember-me">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <button type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Submit
                </button>
            </form>
        </div>
    </div>
</body>
</html>
</body>

</html>