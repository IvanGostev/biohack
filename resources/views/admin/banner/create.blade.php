@extends('admin.layouts.app')
@section('content')
    <div class="row">

        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-dark card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header"><div class="card-title">Add banner</div></div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.banner.store')}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input class="form-control" required name="title" type="text">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Text</label>
                            <textarea class="form-control" name="text" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Img</label>
                            <input class="form-control" required name="img" type="file">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Button text</label>
                            <input class="form-control" required name="btn-text" type="text">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Button link</label>
                            <input class="form-control" required name="btn-link" type="text">
                        </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Add</button>
                    </div>
                    <!--end::Footer-->
                </form>
                <!--end::Form-->
            </div>

        </div>

    </div>
@endsection
