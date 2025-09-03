@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header"><h3 class="card-title">Messages</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col" style="width: 10px">Who</th>
                            <th scope="col">Text</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr class="align-middle">
                                <td>{{$message->id}}</td>
                                <td>
                                    <p>{{$message->whom == 'user' ? 'support' : 'user'}}</p>
                                </td>
                                <td>
                                    <p>{{$message->text}}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    <tfooter>
                        <form action="{{route('admin.user.message')}}" enctype="multipart/form-data" method="post" >
                            @csrf
                            <input type="text" name="user_id" value="{{$user->id}}" hidden class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Text</label>
                                    <input type="text" name="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                    </tfooter>
                </div>
            </div>
        </div>

    </div>
@endsection
