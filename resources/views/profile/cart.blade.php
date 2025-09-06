@extends('layouts.profile')
@section('content')
    <h1 class="account__title">My Cart</h1>
    @if(count($items) == 0)
        <div class="account__cart">
            <div class="account__text">
                <p>Your cart is currently empty. <br>
                    Browse our products and add something you love!
                </p>
                <a href="{{route('index')}}" class="btn">
                    GO TO PRODUCTS
                </a>
            </div>
        </div>
    @else
        <div class="account__products">
            @foreach($items as $item)
            <div class="account__product">
                <div class="module"><img src="{{asset('storage/' . $item->image()->patch)}}" alt="">
                    <div class="text">
                        <h5>{{$item->title}}</h5>
                        <h6><span>Package quantity:</span> {{$item->weight}}</h6>
                    </div>
                </div>

                <form method="post" action="{{route('profile.cart')}}" class="count module" >
                    @csrf
                    <input type="text" hidden name="id" value="{{$item->id}}">
                    <button name="action" value="minus" type='submit' class="account__minus">
                        <img style="height: auto" src="{{asset('./img/minus.svg')}}" alt="">
                    </button>
                    <div class="account__number">{{$item->count}}</div>
                    <button name="action" value="plus" type='submit' class="account__plus">
                        <img style="height: auto" src="{{asset('./img/add.svg')}}" alt="">
                    </button>
                </form>

                <form method="post" action="{{route('profile.cart')}}" class="module" >
                    @csrf
                    <input type="text" hidden name="id" value="{{$item->id}}">
                    <p class="price">${{$item->product()->price * $item->count}}</p>
                    <button name="action" value="delete" type='submit' class="cross">
                        <img style="height: auto" src="{{asset('./img/cross.svg')}}" alt="">
                    </button>
                </form>

            </div>
@endforeach

            <div class="account__subtotal">
                <form class="text" action="{{route('profile.order')}}" method="post">
                    @csrf
                    <h6>Subtotal {{auth()->user()->ref ? '- 5% from your referral' : '' }}:</h6>
                    <button
                        class="btn" type="submit">CHECKOUT</button>
                </form>
                <div>
                    <p>${{auth()->user()->ref ? (int)($sum- $sum * 0.05) : $sum }}</p>
                </div>
            </div>
        </div>
    @endif
@endsection
