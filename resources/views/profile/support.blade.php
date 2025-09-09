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
                <p style="padding-bottom: 5px; font-weight: 600; font-size: 14px">{{$message->whom == 'user' ? 'Support' : auth()->user()->name}}</p>
                <div class="main" style="display: flex; gap: 10px;">

                    <img
                        @if($message->whom == 'user')
                            src="{{asset('img/back2.png')}}"
                        @else
                            src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : '/img/user.png' }}"
                        @endif
                        alt="" style="width: 40px; height: 40px; border-radius: 100px">
                    <p style="    border-radius: 12px;
    display: inline-block;
    background-color: #7fdbda33;
    padding: 12px;
    font-size: 16px;" class="text">{{$message->text}}</p>
                </div>

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
