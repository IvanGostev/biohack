@extends('layouts.profile')
@section('content')

    <div class="account__badge">
        <img src="" alt="">
        <p>Support Chat</p>
    </div>
    <div class="account__chat">

{{--        <div class="account__message">--}}
{{--            <p class="text">Is hello my bro</p>--}}
{{--            <p class="date">10:15</p>--}}
{{--        </div>--}}
        @foreach($messages as $message)
            <div class="account__message{{$message->whom == 'user' ? 'left' : ''}}">
                <p class="text">{{$message->text}}</p>
                <p class="date">{{$message->created_at}}</p>
            </div>
        @endforeach()
    </div>
    <form class="account__create-message" action="{{route('profile.message')}}" method="post">
        @csrf
        <input type="text" name="user_id" value="{{auth()->user()->id}}" hidden>
        <div class="input">
            <input type="text" name="text" placeholder="Type your message...">
        </div>
        <button class="btn" type="submit"></button>
    </form>
@endsection
