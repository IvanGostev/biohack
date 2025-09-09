@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Triggers</h3></div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered" role="table">
                        <thead>
                        <tr>
                            <th style="width: 10px" scope="col">#</th>
                            <th scope="col">Action</th>
                            <th scope="col">Text</th>
                            <th scope="col" style="width: 20px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($triggers as $trigger)
                            <tr class="align-middle">
                                <td>{{$trigger->id}}</td>
                                <td>
                                    <p>{{$trigger->action}}</p>
                                </td>
                                <td>
                                    <p>{{$trigger->text}}</p>
                                </td>
                                <td>
                                    <form action="{{route('admin.trigger.delete', $trigger->id)}}" method="post">
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
