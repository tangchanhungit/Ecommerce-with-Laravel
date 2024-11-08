<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FreshFood</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
        }
        .login-form {
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }
        .login-form input,
        .login-form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form button {
            background-color: #000;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #333;
        }
        .login-form label {
            display: block;
            margin-bottom: 5px;
        }
        .login-form .logos img {
            height: 40px;
            margin: 10px;
        }
        .login-form .terms {
            font-size: 12px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form class="login-form" action="{{ route('check.email') }}" method="POST">
        @csrf
        <div class="logos">
            <img src="{{ asset('images/nike-logo.png') }}" alt="Nike">
            <img src="{{ asset('images/jordan-logo.png') }}" alt="Jordan">
        </div>
        <h2>Enter your email to join us or sign in.</h2>
        <label for="email">Email*</label>
        <input type="email" id="email" name="email" required>
        <div class="terms">
            By continuing, I agree to FreshFood's <a href="#">Privacy Policy</a> and <a href="#">Terms of Use</a>.
        </div>
        <button type="submit">Continue</button>
    </form>
</body>
</html>
