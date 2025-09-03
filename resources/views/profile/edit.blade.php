@extends('layouts.profile')
@section('content')
        <h1 class="account__title">Edit Profile</h1>
        <form class="account__profile" method="post" action="{{route('profile.update')}}" enctype='multipart/form-data'>
            @csrf
            @method('patch')
            <div class="box">
                <p>Avatar</p>
                <div>
                    <input type="file" name="avatar">
                </div>
            </div>
            <div class="box">
                <p>Name</p>
                <div>
                    <input type="text" name="name" value="{{auth()->user()->name}}">
                </div>
            </div>
            <div class="box">
                <button type="submit">Update</button>
            </div>
        </form>
@endsection
