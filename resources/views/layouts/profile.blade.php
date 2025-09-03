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
            <h6 class="nav__logo">BIOHACKERS</h6>
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
            <a class="nav__item" href="{{route('profile.cart')}}">CART</a>
            @guest
                <a href="{{route('login')}}" class="nav__item">LOG IN</a>
            @endguest
            @auth
                <a href="{{route('profile.edit')}}" class="nav__item">PROFILE</a>
            @endauth

        </ul>
    </nav>
</header>
<section class="crumb">
    <div class="container">
        <p>Home / My Account</p>
    </div>
</section>
<section class="title">
    <div class="container">
        <p>My Account</p>
    </div>
</section>
<section class="account">
    <div class="container">
        <div class="account__left">
            <div class="account__user">
                <img class="account__img" style="border-radius: 100px" src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : '/img/user.png' }}" alt="">
                <div>
                    <h5 class="account__name">{{auth()->user()->name}}</h5>
                    <h6 class="account__status">Status: <span>Verified</span></h6>
                </div>
            </div>
            <form class="account__ul" action="{{route('logout')}}" method="post">
                @csrf
                <a href="{{route('profile.cart')}}" class="account__item {{request()->is('profile/cart') ? 'active' : ''}}">My Cart</a>
                <a href="{{route('profile.referral')}}" class="account__item" {{request()->is('profile/referral') ? 'active' : ''}}>Referral Program</a>
                <a href="{{route('profile.status')}}" class="account__item" {{request()->is('profile/status') ? 'active' : ''}}>Account Status</a>
                <a href="{{route('profile.support')}}" class="account__item" {{request()->is('profile/support') ? 'active' : ''}}>Support</a>
                <a href="{{route('profile.balance')}}" class="account__item" {{request()->is('profile/balance') ? 'active' : ''}}>Balance</a>
                <a href="{{route('profile.edit')}}" class="account__item {{request()->is('profile/edit') ? 'active' : ''}}">Edit Profile</a>

                <button  class="account__item" style="
              text-align: left; margin-top: 20px; color: #222222;
                ">Log out</button>
            </form>
        </div>
        <div class="account__right">

            @yield('content')
        </div>
    </div>
    </div>
</section>
<section class="social" id="contacts">
    <div class="container">
        <div class="social__main">
            <div class="social__left">
                <h6>Follow us on our social networks</h6>
            </div>
            <div class="social__right">
                <a class="social__item">
                    Telegram
                </a>
                <a class="social__item">
                    YouTube
                </a>
                <a class="social__item">
                    Reddit
                </a>
                <a class="social__item">
                    X (Twitter)
                </a>
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
        <a href="#header" class="footer__btn"></a>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <p class="footer__description">2025 Biohackers. All rights reserved</p>
        </div>
    </div>
</footer>
</body>
</html>
