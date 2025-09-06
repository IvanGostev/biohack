<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIOHACKERS</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<header class="header" id="header">
    <nav class="nav container">
        <div class="nav__left">
            <a href="{{route('index')}}" style="cursor: pointer" class="nav__logo">BIOHACKERS</a>
        </div>
        <ul class="nav__center">
            <a class="nav__item" href="/#about">ABOUT US</a>
            <a class="nav__item" href="/#store">PRODUCTS</a>
            <a class="nav__item" href="/#faq">FAQ</a>
            <a class="nav__item" href="/#referral">REFERRAL PROGRAM</a>
            <a class="nav__item" href="/#contacts">CONTACTS</a>
        </ul>
        <ul class="nav__right">
            @auth
                <p class="nav__item">BALANCE: ${{auth()->user()->balance}}</p>
            @endauth
            <a href="{{route('profile.cart')}}" class="nav__item">CART</a>
            @guest
                <a href="{{route('login')}}" class="nav__item">LOG IN</a>
            @endguest
            @auth
                <a href="{{route('profile.edit')}}" class="nav__item">PROFILE</a>
            @endauth

        </ul>

    </nav>
</header>
@yield('content')
<section class="social" id="contacts">
    <div class="container">
        <div class="social__main">
            <div class="social__left">
                <h6>Follow us on our social networks</h6>
            </div>
            <div class="social__right">
                @foreach(getSocials() as $social)
                    <a class="social__item" href="{{$social->link}}">
                        <img style="width: 26px; height: 26px" src="{{ asset('storage/' . $social->img )}}" alt="">
                        <p>{{$social->title}}</p>
                    </a>
                @endforeach()
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="container footer__top">
        <p class="footer__logo">BIOHACKERS</p>
        <div class="footer__center">
            <ul class="footer__nav">
                <a class="footer__item title">COMPANY</a>
                <a href="/#about" class="footer__item">About Us</a>
                <a href="/#store" class="footer__item">Products</a>
                <a href="/#faq" class="footer__item">FAQ</a>
                <a href="/#referral" class="footer__item">Referral Program</a>
                <a href="/#contacts" class="footer__item">Contacts</a>
            </ul>
            <ul class="footer__nav">
                <a class="footer__item title">LEGAL</a>
                <a class="footer__item">Privacy Policy</a>
                <a class="footer__item">Terms of Use</a>
            </ul>


        </div>
        <a href="#header" class="footer__btn">
            <img src="{{ asset('./img/arrow-up.svg')}}" alt=""
                 style="display:block; margin: 0 auto; padding-top: 14px;">
        </a>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <p class="footer__description">2025 Biohackers. All rights reserved</p>
        </div>
    </div>
</footer>
</body>
</html>
