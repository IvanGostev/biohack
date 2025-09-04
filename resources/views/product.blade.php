@extends('layouts.app')
@section('content')
    <section class="crumbs">
        <div class="container">
            <a href="{{route('index')}}">
                <img src="{{asset('img/arrow-left-1.svg')}}" alt="">
                BACK</a>
        </div>
    </section>
    <section class="good">
        <div class="container">
            <div class="good__preview">
                <form class="good__main" method="post" action="{{route('product', $product->id)}}">
                    @csrf
                    <input name="imageId" type="text" hidden value="{{$activeImage->id}}">
                    <button class="good__arrow left" name="action" value="left">
                        <img src="{{asset('./img/arrow-left.svg')}}" alt="">
                    </button>
                    <img class="good__img" src="{{asset('storage/' . $activeImage->patch)}}">
                    <button class="good__arrow right" name="action" value="right">
                        <img src="{{asset('./img/arrow-right.svg')}}" alt="">
                    </button>
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
                    <a style="cursor: pointer" href="{{route('profile.support')}}" class="good__ask">Ask the Seller</a>
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
                                <option
                                    {{$fromIdActive == $item->country()->id ? 'selected' : '' }}  value="{{$item->country()->id}}">{{$item->country()->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="good__option">
                        <p>To:</p>
                        <select name="toIdActive">
                            @foreach($product->to() as $item)
                                <option
                                    {{$toIdActive == $item->country()->id ? 'selected' : '' }} value="{{$item->country()->id}}">{{$item->country()->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="good__option">
                        <p>Shipping:</p>
                        <select name="deliveryIdActive">
                            @foreach($product->delivery() as $item)
                                <option
                                    {{$deliveryIdActive == $item->delivery()->id ? 'selected' : '' }} value="{{$item->delivery()->id}}">{{$item->delivery()->title}}</option>
                        </select>
                        @endforeach
                    </div>
                </div>
                <div class="good__control">
                    <div class="good__count">
                        <input type="hidden" name="countActive" value="{{$countActive}}">
                        <button type="submit" name="minus" value="1" class="good__minus">
                            <img src="{{asset('./img/minus.svg')}}" alt="">
                        </button>
                        <p class="good_number">{{$countActive}}</p>
                        <button type="submit" name="plus" value="1" class="good__plus">
                            <img src="{{asset('./img/add.svg')}}" alt="">
                        </button>
                    </div>
                    <button class="good__btn" type="submit" name="cart" value="1">ADD TO CART</button>
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
                    <h6 class="reviews__reviews">{{$product->countReviews()}} Reviews</h6>
                </div>
                <form  class="reviews__right" href="#reviews">
                    <button class="reviews__btn" name="writeReview" value="display" style="display: {{$writeReview == 'display' ? 'none' : 'display'}}">WRITE A REVIEW</button>
                    <button style="display: {{$writeReview == 'display' ? 'display' : 'none'}}" class="reviews__btn" name="writeReview" value="none">HIDE THE FORM</button>
                </form>
            </div>
            <div class="reviews__main" id="reviews">
                @if($writeReview == 'display')
                <form method="post" class="review-create" style="width: 100%; gap: 10px; display: flex; flex-direction: column; margin-bottom: 60px
                    " enctype='multipart/form-data' action="{{route('review')}}">
                    @csrf
                    <input type="text" name="product_id" hidden value="{{$product->id}}">
                    <div style="width: 100%; ; padding-bottom: 20px; border-radius: 8px;">
                        <input multiple type="file"
                               style="width: 100%;padding: 10px; background-color: #f2f7f8; border-radius: 8px"
                               id="" accept="image/png, image/jpeg" name="images[]" >
                    </div>
                    <div style="width: 100%; ; padding-bottom: 20px; border-radius: 8px; ">
                    <textarea style="width: 100%;padding: 10px; background-color: #f2f7f8; border-radius: 8px" name="text"
                              id="" placeholder="Your text ..."></textarea>
                    </div>
                    <button class="reviews__btn" type="submit" style="display: inline-block">Submit</button>
                </form>
@endif
@foreach($reviews as $review)
                <div class="review">
                    <div class="review__left">
                        <h5 class="review__name">{{$review->user()->name}}</h5>
                        <h6 class="review__date">{{$review->created_at}}</h6>
                    </div>
                    <div class="review__right">
                        <p class="review__top">{{$review->text}}</p>
                        <p class="review__bottom">
                            @foreach($review->images() as $image)
                            <img src="{{asset('storage/' . $image->patch)}}" alt="">
                            @endforeach()
                        </p>
                    </div>
                </div>
@endforeach()
                <button name='showmore' class="reviews__more">SHOW MORE</button>
            </div>
        </div>
    </section>
@endsection
