@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">FAQ</h3></div>
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
                        @foreach($faqs as $faq)
                            <tr class="align-middle">
                                <td>{{$faq->id}}</td>
                                <td>
                                    <p>{{$faq->title}}</p>
                                </td>
                                <td>
                                    <a href="{{route('admin.faq.edit', $faq->id)}}"
                                       class="btn btn-dark">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.faq.delete', $faq->id)}}" method="post">
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
