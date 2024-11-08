<!-- resources/views/password.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password</title>
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
        .password-form {
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }
        .password-form input,
        .password-form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .password-form button {
            background-color: #000;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .password-form button:hover {
            background-color: #333;
        }
        .password-form label {
            display: block;
            margin-bottom: 5px;
        }
        .password-form .logos img {
            height: 40px;
            margin: 10px;
        }
        .password-form .email-info {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .password-form .email-info a {
            color: gray;
            text-decoration: underline;
            margin-left: 5px;
        }
        .password-form .forgot-password a{
            font-weight: 500;
            margin-top: 10px;
            color: gray;
        }
    </style>
</head>
<body>
    <form class="password-form" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="logos">
            <img src="{{ asset('images/nike-logo.png') }}" alt="Nike">
            <img src="{{ asset('images/jordan-logo.png') }}" alt="Jordan">
        </div>
        <h2>What's your password?</h2>
        <div class="email-info">
            {{ $email }} <a href="{{ route('login.form') }}">Edit</a>
        </div>
        <label for="password">Password*</label>
        <input type="password" id="password" name="password" required>
        <div class="forgot-password">
            <a href="#">Forgot password?</a>
        </div>
        <button type="submit">Sign In</button>
    </form>    
</body>
</html>
