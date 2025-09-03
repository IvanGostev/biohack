@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header"><h3 class="card-title">Products</h3></div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr class="align-middle">
                                <td>{{$product->id}}</td>
                                <td>
                                    <p>{{$product->title}}</p>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-dark" href="{{route('admin.review.index', $product->id)}}">Reviews</a>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-dark" href="{{route('admin.question.index', $product->id)}}">Questions</a>
                                </td>
                                <td>
                                    <a type="submit" class="btn btn-dark" href="{{route('admin.product.edit', $product->id)}}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.product.delete', $product->id)}}" method="post">
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
