@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header"><h3 class="card-title">Users</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 20px">Chat</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($usersActive as $user)
                            <tr class="align-middle" >
                                <td>{{$user->id}}</td>
                                <td style="background-color: #7fdbda80;">
                                    <p >{{$user->name}}</p>
                                </td>
                                <td>

                                    <a href="{{route('admin.user.chat', $user->id)}}" type="submit"
                                       class="btn btn-dark">Chat</a>

                                </td>
                            </tr>
                        @endforeach
                        @foreach($users as $user)
                            <tr class="align-middle">
                                <td>{{$user->id}}</td>
                                <td>
                                    <p>{{$user->name}}</p>
                                </td>
                                <td>

                                    <a href="{{route('admin.user.chat', $user->id)}}" type="submit"
                                       class="btn btn-dark">Chat</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
