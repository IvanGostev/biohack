@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header"><h3 class="card-title">Orders</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Count</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Date</th>
                            <th scope="col" style="width: 20px">Delivered</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr class="align-middle">
                                <td>{{$order->id}}</td>
                                <td>
                                    <p>{{$order->title}}</p>
                                </td>
                                <td>
                                    <p>{{$order->count}}</p>
                                </td>
                                <td>
                                    <p>{{$order->from()->title}}</p>
                                </td>
                                <td>
                                    <p>{{$order->to()->title}}</p>
                                </td>
                                <td>
                                    <p>{{$order->created_at}}</p>
                                </td>
                                <td>
                                    <form action="{{route('admin.order.delivery', $order->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-dark">Delivered</button>
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
