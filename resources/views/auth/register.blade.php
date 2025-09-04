<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('css/auth.css')}}" />
</head>
<body>
<section class="crumbs">
    <div class="container">
        <a href="/">CANCEL</a>
    </div>
</section>
<form class="form" action="{{route('register')}}" method="post">
    @csrf
    <div class="container">
        <h1 class="form__logo">BIOHACKERS</h1>
        <h2 class="form__title">Sign Up</h2>
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach()
        <div class="input">
            <input type="text" name="name" placeholder="Username">
        </div>
        <div class="input">
            <input type="password" name="password" placeholder="Password">
        </div>
        <button class="form__btn signup" type="submit">SIGN UP</button>
        <div class="between">
            <div class="between__right"></div>
            <p class="between__center">or</p>
            <div class="between__left"></div>
        </div>
        <button class="form__btn telegram">TELEGRAM</button>
        <p class="form__already">
            Already have an account? <a href='{{route('login')}}'>Log in</a>
        </p>
        <p class="form__pp">
            By continuing, you agree to our Terms of Service and Privacy Policy
        </p>
    </div>
</form>
<footer class="footer">
    <div class="container">
        <p>2025 Biohackers. All rights reserved</p>
    </div>
</footer>
</body>
</html>
