@extends('layouts.app')
@section('content')
    <section class="banner">
        <div class="container">
            <div class="banner__main">
                <h4 class="banner__title">Biohack your body <br>
                    Unclock your potential</h4>
                <p class="banner__descritpion">
                    Smart sepplements and tools to help you think <br> sharper, sleep better, and feel more alive.
                </p>
                <a class="banner__btn"><p>shop new</p></a>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="container">
            <div class="about__left">
                <h3 class="about__title">About us</h3>
                <p class="about__description">
                    Biohackers is more than a brand - it's a mindset. We believe that with the right tools, anyone can
                    upgrade their body and mind. <br><br>
                    Our mission is to make cutting-edge wellness accessible. Every product we offer is carefully
                    selected to support energy, focus, recovery, and long-term health. <br><br>
                    Whether you're an entrepreneur, athlete, student, or just curious - you're already on your path.
                    We're here to help you go further.
                </p>
            </div>
            <div class="about__right">
                <div class="about__img">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="store" id="store">
        <div class="container">
            <h4 class="store__title">Products</h4>
            <div class="products">
                @foreach($products as $product)
                    <form class="product">
                        <a href="{{route('product', $product->id)}}" class="product__top">
                            <img src="{{asset('storage/' . $product->image()->patch)}}" alt="">
                        </a>
                        <a href="{{route('product', $product->id)}}" class="product__title">{{$product->title}}</a>
                        <a href="{{route('product', $product->id)}}" class="product__weight">{{$product->weight}}g</a>
                        <a href="{{route('product', $product->id)}}" class="product__price">${{$product->price}}</a>
                        <a href="{{route('product', $product->id)}}" class="product__reviews">{{$product->countReviews()}} Reviews</a>
                        <a style="cursor: pointer" href="{{route('product', $product->id)}}" class="product__btn">ADD TO CART</a>
                    </form>
                @endforeach
            </div>
        </div>
    </section>
    <section class="referral" id="referral">
        <div class="container">
            <div class="referral__main">
                <h3 class="referral__title">Referral Program</h3>
                <p class="referral__descritpion">Invite & Earn Rewards
                    <br>
                    <span>You get 5%</span> of every order made by your referral. <br>
                    They receive <span>5% off on all products.</span>
                </p>
                <a href="" class="referral__btn">SIGN IN TO GET YOUR LINK</a>
                <p href="" class="referral__caption">Referral rewards are added after a completed purchase.
                    Discountsmapply automaticaly at checkout.</p>
            </div>
            <img src="./img/" alt="">
        </div>
    </section>
    <section class="faq" id="faq">
        <div class="container">
            <h3 class="faq__title">FAQ</h3>
            <details>
                <summary>Are you products safe?</summary>
                <p>Скандинавская мифология — мифология древних скандинавов Скандинавская мифология — мифология древних
                    скандинавов Скандинавская мифология — мифология древних скандинавов </p>
            </details>
            <details>
                <summary>Are you products safe?</summary>
                <p>Скандинавская мифология — мифология древних скандинавов Скандинавская мифология — мифология древних
                    скандинавов Скандинавская мифология — мифология древних скандинавов </p>
            </details>
            <details>
                <summary>Are you products safe?</summary>
                <p>Скандинавская мифология — мифология древних скандинавов Скандинавская мифология — мифология древних
                    скандинавов Скандинавская мифология — мифология древних скандинавов </p>
            </details>
            <details>
                <summary>Are you products safe?</summary>
                <p>Скандинавская мифология — мифология древних скандинавов Скандинавская мифология — мифология древних
                    скандинавов Скандинавская мифология — мифология древних скандинавов </p>
            </details>
            <details>
                <summary>Покажи-скрой меня</summary>
                <p>Скандинавская мифология — мифология древних скандинавов</p>
            </details>
            <details>
                <summary>Покажи-скрой меня</summary>
                <p>Скандинавская мифология — мифология древних скандинавов</p>
            </details>
        </div>
    </section>

@endsection
