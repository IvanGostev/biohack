@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-header">
                    <a href="{{route('admin.question.create', $product->id)}}" class="w-100 btn btn-dark">Add</a>
                    <br>
                    <br>
                    <h3 class="card-title">Questions</h3></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Answer</th>
                            <th scope="col" style="width: 20px"></th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr class="align-middle">
                                <td>{{$question->id}}</td>
                                <td>
                                    <p>{{$question->title}}</p>
                                </td>
                                <td>
                                    <p>{{$question->answer}}</p>
                                </td>
                                <td>
                                    <a href="{{route('admin.question.edit', $question->id)}}"
                                       class="btn btn-dark">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.question.delete', $question->id)}}" method="post">
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
