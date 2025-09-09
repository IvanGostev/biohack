@extends('admin.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">

        <div class="col-md-12">
            <!--begin::Quick Example-->
            <div class="card card-dark card-outline mb-4">
                <!--begin::Header-->
                <div class="card-header">
                    <div class="card-title">Add chain</div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form action="{{route('admin.chain.store', $product->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">From</label>
                            <select  class="form-select" id="validationCustom04" required name="from">
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">To</label>
                            <select  class="form-select" id="validationCustom04" required name="to">
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Delivery</label>
                            <select  class="form-select" id="validationCustom04" required name="delivery_id">
                                @foreach($deliveries as $delivery)
                                    <option value="{{$delivery->id}}">{{$delivery->title}}</option>
                                @endforeach
                            </select>
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
