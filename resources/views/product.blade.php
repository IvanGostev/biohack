@extends('layouts.app')
@section('content')
    <section class="crumbs">
        <div class="container">
            <a href="{{route('index')}}">BACK</a>
        </div>
    </section>
    <section class="good">
        <div class="container">
            <div class="good__preview">
                <form class="good__main" method="post" action="{{route('product', $product->id)}}">
                    @csrf
                    <input name="imageId" type="text" hidden value="{{$activeImage->id}}">
                    <button class="good__arrow left" name="action" value="left"></button>
                    <img class="good__img" src="{{asset('storage/' . $activeImage->patch)}}">
                    <button class="good__arrow right" name="action" value="right"></button>
                </form>
                <form method="get" class="good__photos" action="{{route('product', $product->id)}}">
                    @foreach ($product->images() as $image)
                        <button class="good__photo" type="submit" name="imageId" value="{{$image->id}}">
                            <img src="{{asset('storage/' . $image->patch)}}" alt="">
                        </button>
                    @endforeach
                </form>
            </div>
            <form class="good__info" method="post" action="{{route('product', $product->id)}}">
                @csrf
                <div class="good__top">
                    <p class="good__reviews">{{$product->countReviews()}} Reviews</p>
                    <p class="good__ask">Ask the Seller</p>
                </div>
                <div class="good__title">
                    <p>{{$product->title}}</p>
                    <p>${{$product->price}}</p>
                </div>
                <p class="good__description">{{$product->description}}</p>
                <p class="good__weight"><span>Package quantity: </span> {{$product->weight}}g</p>
                <p class="good__delivery">Select your delivery options:</p>
                <div class="good__options">
                    <div class="good__option">
                        <p>From:</p>
                        <select name="fromIdActive">
                            @foreach($product->from() as $item)
                                <option {{$fromIdActive == $item->country()->id ? 'selected' : '' }}  value="{{$item->country()->id}}">{{$item->country()->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="good__option" >
                        <p>To:</p>
                        <select name="toIdActive">
                            @foreach($product->to() as $item)
                                <option {{$toIdActive == $item->country()->id ? 'selected' : '' }} value="{{$item->country()->id}}">{{$item->country()->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="good__option" >
                        <p>Shipping:</p>
                        <select name="deliveryIdActive">
                            @foreach($product->delivery() as $item)
                                <option {{$deliveryIdActive == $item->delivery()->id ? 'selected' : '' }} value="{{$item->delivery()->id}}">{{$item->delivery()->title}}</option>
                        </select>
                        @endforeach
                    </div>
                </div>
                <div class="good__control" >
                    <div class="good__count">
                        <input type="hidden" name="countActive" value="{{$countActive}}">
                        <button type="submit" name="minus" value="1" class="good__minus"></button>
                        <p class="good_number">{{$countActive}}</p>
                        <button type="submit" name="plus" value="1" class="good__plus"></button>
                    </div>
                    <button class="good__btn" type="submit" name="cart" value="1" >ADD TO CART</button>
                </div>
                <div class="good__faq">
                    @foreach($product->questions() as $question)
                        <details>
                            <summary>{{$question->title}}</summary>
                            <p>{{$question->answer}}</p>
                        </details>
                    @endforeach()
                </div>
            </form>
        </div>
    </section>
    <section class="reviews">
        <div class="container">
            <div class="reviews__top">
                <div class="reviews__left">
                    <h6 class="reviews__title">Customer Reviews</h6>
                    <h6 class="reviews__reviews">21 Reviews</h6>
                </div>
                <div class="reviews__right">
                    <button class="reviews__btn">WRITE A REVIEW</button>
                </div>
            </div>
            <div class="reviews__main">
                <div style  >

                </div>

                <div class="review">
                    <div class="review__left">
                        <h5 class="review__name">Anna Any</h5>
                        <h6 class="review__date">Aug 26 2025</h6>
                    </div>
                    <div class="review__right">
                        <p class="review__top">Ножницы для кутикулы изготовлены из японской стали медицинского качества.
                            Материал устойчив к коррозии и износу, имеет долгий срок службы. Высоколегированная сталь
                            имеет твердость 53 HRC и произведена с помощью инновационных методов закалки и обработки
                            стали. Инструмент имеет идеальную заточку и возможность регулировать плавность хода.</p>
                        <p class="review__bottom">
                            <img src="./img/bad.png" alt="">
                            <img src="./img/bad.png" alt="">
                            <img src="./img/bad.png" alt="">
                        </p>
                    </div>
                </div>

                <button name='showmore' class="reviews__more">SHOW MORE</button>
            </div>
        </div>
    </section>
@endsection
