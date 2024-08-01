<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="user-box">
                    <input type="text" name="first_name">
                    <label>First Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="last_name">
                    <label>Last Name</label>
                </div>
                <div class="user-box">
                    <input type="text" name="email">
                    <label>Email</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password">
                    <label>Password</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password_confirmation">
                    <label>Confirm Password</label>
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
