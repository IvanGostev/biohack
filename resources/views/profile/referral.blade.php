@extends('layouts.profile')
@section('content')

        <h1 class="account__title">Referral Program</h1>
        <div class="account__program">
            <div class="program__left">
                <p>Share your unique referral link and earn rewards!</p>
                <ul>
                    <li>
                        <div class="box"></div> You earn <span>5%</span> from every purchase your friends make
                    </li>
                    <li>
                        <div class="box"></div> Your friends get <span>5% off</span> on all their orders
                    </li>
                </ul>
                <h6>Your referral link:</h6>
                <div>
                    <input type="text" value="{{request()->root() . '/' . auth()->user()->id . '/referral'}}">
                    <!-- <button class="btn"></button> -->
                </div>
            </div>
            <div class="program__right">
                <h6>Referral Stats</h6>
                <div class="stats">
                    <div class="stat">
                        <p class="stat__title">Purchases by Referrals</p>
                        <p class="stat__price"><span>${{auth()->user()->refIncome() * 20}}</span> this month</p>
                        <p class="stat__price"><span>${{auth()->user()->refIncome() * 20}}</span> all time</p>
                    </div>
                    <div class="stat">
                        <p class="stat__title">Your Earnings</p>
                        <p class="stat__price"><span>${{auth()->user()->refIncome()}}</span> this month</p>
                        <p class="stat__price"><span>${{auth()->user()->refIncome()}}</span> all time</p>
                    </div>
                </div>
                <div class="caption">
                    <p>This Month: <span>{{auth()->user()->refCount()}}</span></p>
                    <p>Total Referrals Month: <span>{{auth()->user()->refCount()}}</span></p>
                </div>
            </div>
        </div>

@endsection
