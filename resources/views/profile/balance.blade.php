@extends('layouts.profile')
@section('content')

    <div class="account__badge">
        <p style="padding-left: 10px;">Balance</p>
    </div>
    <div class="account__balance" style="padding-bottom: 50px;">


        <table style="width: 100%">
            <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Sum</th>
                <th scope="col">Status</th>
                <th scope="col">Exact replenishment time or account address</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr>
                    <th scope="row">{{$message->type}}</th>
                    <th>{{$message->sum}}</th>
                    <th>{{$message->status}}</th>
                    <th>{{$message->text}}</th>
                    <th>{{$message->created_at}}</th>
                </tr>
            @endforeach()

            </tbody>
        </table>


    </div>
    <form class="account__create-message" action="{{route('profile.balance')}}" method="post">
        @csrf
        <input required type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
        <div class="input">
            <input required type="number" name="sum" placeholder="sum in $">
        </div>
        <div class="input">
            <select required type="number" name="type"
                    style="
    height: 100%;
    width: 100%;
    padding: 0 16px;
    ">
                <option value="replenishment">Replenishment</option>
                <option value="withdrawal">Withdrawal</option>
            </select>
        </div>
        <div class="input">
            <input required type="text" name="text" placeholder="Exact replenishment time or account address">
        </div>
        <button class="btn" type="submit">
            <img src="{{asset('/img/send.svg')}}" alt="" style="transform: rotate(345deg)">
        </button>
    </form>
@endsection
