@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Info</h3></div>
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
                        @foreach($infos as $info)
                            <tr class="align-middle">
                                <td>{{$info->id}}</td>
                                <td>
                                    <p>{{$info->title}}</p>
                                </td>
                                <td>
                                    <a href="{{route('admin.info.edit', $info->id)}}"
                                       class="btn btn-dark">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.info.delete', $info->id)}}" method="post">
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
