@extends('layouts.profile')
@section('content')

    <div class="account__badge">
        <div style="background-color: white; width: 52px; height: 52px; border-radius: 100px; margin: 0 14px ">
            <img src="{{asset('img/messages.svg')}}" alt="" style="display:block; margin: 0 auto">
        </div>

        <p>Support Chat</p>
    </div>
    <div class="account__chat">
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
            <input required type="text" name="text" placeholder="Type your message...">
        </div>
        <button class="btn" type="submit">
            <img src="{{asset('/img/send.svg')}}" alt="" style="transform: rotate(345deg)">
        </button>
    </form>
@endsection
