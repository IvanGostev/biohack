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
                <a href="#store" class="banner__btn"><p>shop new</p></a>
            </div>
        </div>
    </section>
    @foreach($infos as $info)
        <section class="about" id="about">
            <div class="container" style="justify-content: space-between; ">
                <div class="about__left">
                    <h3 class="about__title">{{$info->title}}</h3>
                    <p class="about__description">
                        {{$info->text}}
                    </p>
                </div>
                <div class="about__right">
                    <div class="about__img" style="background-image: url('{{asset('storage/' . $info->img)}}');     width: 400px!important;">
                    </div>
                </div>
            </div>
        </section>
    @endforeach

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
                        <a href="{{route('product', $product->id)}}" class="product__weight">{{$product->weight}}</a>
                        <a href="{{route('product', $product->id)}}" class="product__price">${{$product->price}}</a>
                        <a href="{{route('product', $product->id)}}"
                           class="product__reviews">{{$product->countReviews()}} Reviews</a>
                        <a style="cursor: pointer" href="{{route('product', $product->id)}}" class="product__btn">ADD TO
                            CART</a>
                    </form>
                @endforeach
            </div>
        </div>
    </section>
    <section class="referral" id="referral">
        <div class="container">
            <div class="referral__main" style="position: relative">
                <h3 class="referral__title">Referral Program</h3>
                <p class="referral__descritpion">Invite & Earn Rewards
                    <br>
                    <span>You get 5%</span> of every order made by your referral. <br>
                    They receive <span>5% off on all products.</span>
                </p>
                <a href="{{route('profile.referral')}}" class="referral__btn">SIGN IN TO GET YOUR LINK</a>
                <p href="" class="referral__caption">Referral rewards are added after a completed purchase.
                    Discountsmapply automaticaly at checkout.</p>
                <img src="{{asset('./img/dna.png')}}" alt="" style="    position: absolute;
    z-index: -1;
    left: -430px;
    width: 2000px;
    height: 900px;
    top: -300px;
    transform: rotate(345deg);">
                <img src="{{asset('./img/dna2.png')}}" alt="" style="    position: absolute;
    z-index: -1;
    right: -410px;
    height: 450px;
    top: -320px;">
            </div>

        </div>
    </section>
    <section class="faq" id="faq">
        <div class="container">
            <h3 class="faq__title">FAQ</h3>
            @foreach($faqs as $faq)
                <details>
                    <summary>{{$faq->title}}</summary>
                    <p>{{$faq->answer}} </p>
                </details>
            @endforeach
        </div>
    </section>

@endsection
