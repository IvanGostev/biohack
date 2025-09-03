@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-dark card-outline mb-4">
                <div class="card-header"><div class="card-title">Edit delivery</div></div>
                <form action="{{route('admin.delivery.update', $delivery->id)}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{$delivery->title}}" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
