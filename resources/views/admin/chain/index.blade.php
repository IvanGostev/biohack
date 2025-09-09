@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header">

                    <a href="{{route('admin.chain.create', $product->id)}}" class="w-100 btn btn-dark">Add</a>
                    <br>
                    <br>
                    <h3 class="card-title">Chains for #{{$product->id}}</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col" style="">From</th>
                            <th scope="col" style="">To</th>
                            <th scope="col" style="">Delivery</th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($chains as $chain)
                            <tr class="align-middle">
                                <td>{{$chain->id}}</td>
                                <td>
                                    <p>{{$chain->from()->title}}</p>
                                </td>
                                <td>
                                    <p>{{$chain->to()->title}}</p>
                                </td>
                                <td>
                                    <p>{{$chain->delivery()->title}}</p>
                                </td>
                                <td>
                                    <form action="{{route('admin.chain.delete', $chain->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-dark">Delete</button>
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
