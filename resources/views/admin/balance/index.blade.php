@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header"><h3 class="card-title">Balance</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Sum</th>
                            <th scope="col">Status</th>
                            <th scope="col">Exact replenishment time or account number</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr class="align-middle">
                                <td>{{$message->id}}</td>
                                <td >{{$message->type}}</td>
                                <td>{{$message->sum}}</td>
                                <td>{{$message->status}}</td>
                                <td>{{$message->text}}</td>
                                <td>{{$message->created_at}}</td>
                                <td>
                                    <form method="post" action="{{route('admin.balance.action', ['message' => $message->id, 'action' => 'approved'])}}">
                                        @csrf
                                        <button href="" type="submit"
                                                class="btn btn-dark">Approve</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="{{route('admin.balance.action', ['message' => $message->id, 'action' => 'rejected'])}}">
                                    @csrf
                                        <button  type="submit"
                                       class="btn btn-dark">Reject</button>
                                    </form>
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
