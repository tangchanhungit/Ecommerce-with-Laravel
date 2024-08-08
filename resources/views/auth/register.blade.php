<!-- resources/views/register.blade.php -->
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
        .register-form {
            padding: 40px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }
        .register-form .email-info{
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .register-form .email-info a{
            color: gray;
            text-decoration: underline;
            margin-left: 5px;
        }
        .register-form input,
        .register-form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px; 
        }
        .register-form label {
            display: block;
            margin-bottom: 5px;
        }
        .register-form .checkbox-container {
            display: flex;
            align-items: center;
        }
        .register-form .checkbox-container input {
            width: auto;
            margin-right: 10px;
        }
        .register-form .checkbox-container label {
            margin: 0;
        }
        .register-form button{
            background-color: #000;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .register-form button{
            background-color: #333;
        }
        .resend-link {
            color: gray;
            text-decoration: underline;
            cursor: pointer;
            display: none;
        }
    </style>
</head>
<body>
    <form class="register-form" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="logos">
            <img src="{{ asset('images/nike-logo.png') }}" alt="Nike">
            <img src="{{ asset('images/jordan-logo.png') }}" alt="Jordan">
        </div>
        <h2>Now let's make you a FreshFood Member.</h2>
        <label>We've sent a code to</label>
        <div class="email-info">
            {{ session('email') }} <a href="{{ route('login.form') }}">Edit</a>
        </div>
        <label for="code">Code*</label>
        <input type="text" id="code" name="code" required>

        <div style="text-align: right; font-size: 12px;">
            <div id="countdown">Resend code in 15s</div>
            <a href="{{ route('resend.code') }}" id="resend-link" class="resend-link">Resend Code</a>
        </div>   

        <label for="first_name">First Name*</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name*</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="password">Password*</label>
        <input type="password" id="password" name="password" required>

        <div class="checkbox-container">
            <input type="checkbox" id="newsletter" name="newsletter">
            <label for="newsletter">Sign up for emails to get updates from us on products, offers and your Member benefits.</label>
        </div>

        <div class="checkbox-container">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms of Use</a>.</label>
        </div>
        <button type="submit">Create Account</button>
    </form>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var countdownElement = document.getElementById('countdown');
        var resendLink = document.getElementById('resend-link');
        var timeLeft = 15;

        var countdownInterval = setInterval(function () {
            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                countdownElement.style.display = 'none';
                resendLink.style.display = 'inline';
            } else {
                countdownElement.textContent = 'Resend code in ' + timeLeft + 's';
                timeLeft--;
            }
        }, 1000);
    });
</script>
</html>
