@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Deliveries</h3></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries as $delivery)
                            <tr class="align-middle">
                                <td>{{$delivery->id}}</td>
                                <td>
                                    <p>{{$delivery->title}}</p>
                                </td>
                                <td>
                                    <a href="{{route('admin.delivery.edit', $delivery->id)}}" type="submit"
                                       class="btn btn-dark">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.delivery.delete', $delivery->id)}}" method="post">
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
