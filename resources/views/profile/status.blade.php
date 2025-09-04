@extends('layouts.profile')
@section('content')
        <h1 class="account__title">Account status</h1>
        <div class="account__telegram">
            <div class="connect">
                <p>To get verified, please connect your Telegram account</p>
                <a href="" class="btn">CONNECT TELEGRAM</a>
            </div>
            <div class="status">
                <p>Your current status:</p>
                <h6>Not Verified</h6>
            </div>
        </div>
        <div class="account__glasses">
            <ul>
                <li class="title">Status</li>
                <li>Verified</li>
                <li>Buyer</li>
                <li>Trusted Buyer</li>
                <li>Super Buyer</li>
            </ul>
            <ul class="dashed">
                <li class="title">Requirement</li>
                <li>Connect Telegram</li>
                <li>Make 1 purshase</li>
                <li>Make 10 purshases</li>
                <li>Make 100 purshases</li>
            </ul>
            <ul>
                <li class="title">You Progress</li>
                <li class="green" style="color: black">None</li>
                <li class="bold">{{auth()->user()->countOrders()}} / 1</li>
                <li class="bold">{{auth()->user()->countOrders()}} / 10</li>
                <li class="bold">{{auth()->user()->countOrders()}} / 100</li>
            </ul>
        </div>
@endsection
