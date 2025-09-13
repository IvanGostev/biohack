@extends('layouts.app')
@section('content')
    <section class="crumbs">
        <div class="container">
            <a href="{{route('index')}}">
                <img src="{{asset('img/arrow-left-1.png')}}" alt="">
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
                        <img src="{{asset('./img/arrow-left.png')}}" alt="">
                    </button>
                    <img class="good__img" src="{{asset('storage/' . $activeImage->patch)}}">
                    <button class="good__arrow right" name="action" value="right">
                        <img src="{{asset('./img/arrow-right.png')}}" alt="">
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
                <p class="good__weight"><span>Package quantity: </span> {{$product->weight}}</p>
                <p class="good__delivery">Select your delivery options:</p>
                <input type="text" hidden name="fromIdActive" value="{{$fromIdActive}}">
                <input type="text" hidden name="toIdActive" value="{{$toIdActive}}">
                <input type="text" hidden name="deliveryIdActive" value="{{$deliveryIdActive}}">
                <div class="good__options">
                    @if($panel == 'from')
                        <div class="good__option">
                            <p>From:</p>
                            <select name="fromIdActive">
                                @foreach($froms as $from)
                                    <option
                                        {{$fromIdActive == $from->from()->id ? 'selected' : '' }}  value="{{$from->from()->id}}">{{$from->from()->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if($panel == 'to')
                        <div class="good__option">
                            <p>To:</p>
                            <select name="toIdActive">
                                @foreach($tos as $item)
                                    <option
                                        {{$toIdActive == $item->to()->id ? 'selected' : '' }} value="{{$item->to()->id}}">{{$item->to()->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if($panel == 'delivery')
                        <div class="good__option">
                            <p>Shipping:</p>
                            <select name="deliveryIdActive">
                                @foreach($deliveries as $item)
                                    <option
                                        {{$deliveryIdActive == $item->delivery()->id ? 'selected' : '' }} value="{{$item->delivery()->id}}">{{$item->delivery()->title}}</option>
                                @endforeach
                            </select>

                        </div>
                    @endif


                </div>
                <div class="good__control">
                    <div class="good__count">
                        <input type="hidden" name="countActive" value="{{$countActive}}">
                        <button type="submit" name="minus" value="1" class="good__minus">
                            <img  src="{{asset('./img/minus.png')}}" alt="">
                        </button>
                        <p class="good_number">{{$countActive}}</p>
                        <button type="submit" name="plus" value="1" class="good__plus">
                            <img src="{{asset('./img/add.png')}}" alt="">
                        </button>
                    </div>

                    @if($panel == 'from')
                        <button class="good__btn" type="submit" name="selectionto" value="1">Go to the selection "To"
                        </button>
                    @elseif($panel == 'to')
                        <div style="display: flex; gap: 10px; width: 100%; max-height: 50px">
                            <button style="width: 100%; display: block" class="good__btn" type="submit"
                                    name="selectionfrom" value="1">Go back to the
                                selection "From"
                            </button>
                            <button style="width: 100%; display: block" class="good__btn" type="submit"
                                    name="selectiondelivery" value="1">Go to the
                                selection "Delivery"
                            </button>
                        </div>
                    @elseif($panel == 'delivery')
                        <div style="display: flex; gap: 10px; width: 100%; max-height: 50px">
                            <button style="width: 100%; display: block" class="good__btn" type="submit"
                                    name="selectionto" value="1">Go back to the
                                selection "To"
                            </button>
                            <button style="width: 100%; display: block" class="good__btn" type="submit" name="cart"
                                    value="1">ADD TO CART
                            </button>
                        </div>
                    @endif
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

                <form class="reviews__right" href="#reviews">
                    @if(!((auth()->check() and auth()->user()->countReviews($product->id) > 0)))
                        <button class="reviews__btn" name="writeReview" value="display"
                                style="display: {{($writeReview == 'display' or $errors->has('image')) ? 'none' : 'display'}}">WRITE A REVIEW
                        </button>
                        <button style="display: {{($writeReview == 'display' or $errors->has('image')) ? 'display' : 'none'}}" class="reviews__btn"
                                name="writeReview" value="none">HIDE THE FORM
                        </button>
                    @endif
                </form>
            </div>
            <div class="reviews__main" id="reviews">
                @if($writeReview == 'display' or $errors->has('image'))
                    <form method="post" class="review-create" style="width: 100%; gap: 10px; display: flex; flex-direction: column; margin-bottom: 60px
                    " enctype='multipart/form-data' action="{{route('review')}}">
                        @csrf
                        <input type="text" name="product_id" hidden value="{{$product->id}}">
                        <div
                            style="width: 100%; background-color: #f2f7f8; margin-bottom: 20px; border-radius: 8px; display: flex">
                            <input multiple type="file"
                                   style="width: 100%;padding: 10px; ; border-radius: 8px"
                                   id="" accept="image/png, image/jpeg" name="images[]">
                            <p style="width: 140px; padding: 10px 10px 0 0;">
                                up to 5 images
                            </p>
                        </div>
                        <div style="width: 100%; ; padding-bottom: 20px; border-radius: 8px; ">
                    <textarea style="width: 100%;padding: 10px; background-color: #f2f7f8; border-radius: 8px"
                              name="text"
                              required id="" placeholder="Your text ..."></textarea>
                        </div>
                        <p style="color: red">{{$errors->first('image')}}</p>
                        <button class="reviews__btn" type="submit" style="display: inline-block">Submit</button>
                    </form>
                @endif

                @foreach($reviews as $review)
                    <form class="review" action="{{route('review.delete')}}" method="post">
                        @csrf
                        <div class="review__left">
                            <div>
                                <img style="width: 58px; height: 58px; border-radius: 100px"
                                    src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : '/img/user.png' }}"
                                    alt="">
                            </div>
                            <div>
                                <h5 class="review__name">{{$review->user()->name}}</h5>
                                <h6 class="review__date">{{$review->created_at}}</h6>
                                <br>
                                @if(auth()->check() and auth()->user()->id == $review->user()->id)
                                    <input type="text" hidden name="review_id" value="{{$review->id}}">
                                    <button style="
                                width: 100%;
    height: 38px;
        padding: 0;
                                " type="submit" class="reviews__btn">Delete
                                    </button>
                                @endif
                            </div>

                        </div>
                        <div class="review__right">
                            <p class="review__top">{{$review->text}}</p>
                            <p class="review__bottom">
                                @foreach($review->images() as $image)
                                    <a href="?imageFileActive={{$image->id}}">
                                        <img style="width: 109px; height: 133px"
                                             src="{{asset('storage/' . $image->patch)}}" alt="">
                                    </a>
                                @endforeach()
                            </p>
                        </div>
                    </form>
                @endforeach()
                {{--                <a name='showmore' class="reviews__more">SHOW MORE</a>--}}
            </div>
        </div>
    </section>

    @if($imageFileActive)
        <div id="img-viewer" style="display: block">
            <a class="close" href="{{route('product', $product->id) . '#reviews'}}">&times;</a>
            <img class="modal-content" id="full-image" src="{{asset('storage/' . $imageFileActive->patch)}}">
        </div>
        <style>
            /*body {*/
            /*    scroll: hidden;*/
            /*}*/

            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                max-width: 700px;
            }

            .modal-content {
                animation-name: zoom;
                animation-duration: 0.6s;
            }

            @keyframes zoom {
                from {
                    transform: scale(0)
                }
                to {
                    transform: scale(1)
                }
            }

            #img-viewer {
                display: none;
                position: fixed;
                z-index: 1000;
                padding-top: 100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
            }

            #img-viewer .close {
                position: absolute;
                top: 15px;
                right: 35px;
                color: #f1f1f1;
                font-size: 40px;
                font-weight: bold;
                transition: 0.3s;
            }

            #img-viewer .close:hover {
                cursor: pointer;
            }

            @media only screen and (max-width: 700px) {
                .modal-content {
                    width: 100%;
                }
            }

            .img-container {
                position: relative;
                width: 300px;
            }

            .img-source {
                border: 5px solid #ccc;
                border-radius: 5px;
                width: 100%;
            }

            .expand-icon {
                position: absolute;
                right: 10px;
                top: 15px;
                cursor: pointer;
            }

        </style>
    @endif
@endsection
