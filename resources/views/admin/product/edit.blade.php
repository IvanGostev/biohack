@extends('admin.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="row">
        <div class="col-md-12">
            <div class="card card-dark card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Edit product</div>
                </div>
                <form action="{{route('admin.product.update', $product->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">From</label>
                            <select multiple="multiple"  class="form-select" id="validationCustom04" required name="from[]">
                                @foreach($countries as $country)
                                    <option {{in_array($country->id, $fromActive) ? 'selected' : ''}} value="{{$country->id}}">{{$country->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">To</label>
                            <select multiple="multiple"  class="form-select" id="validationCustom04" required name="to[]">
                                @foreach($countries as $country)
                                    <option {{in_array($country->id, $toActive) ? 'selected' : ''}} value="{{$country->id}}">{{$country->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Deliveries</label>
                            <select multiple="multiple"  class="form-select" id="validationCustom04" required name="deliveries[]">
                                @foreach($deliveries as $delivery)
                                    <option {{in_array($delivery->id, $deliveriesActive) ? 'selected' : ''}} value="{{$delivery->id}}">{{$delivery->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input type="text" required name="title" value="{{$product->title}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <textarea type="text" required name="description"  class="form-control">{{$product->description}} </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Weight</label>
                            <input type="text" required name="weight" value="{{$product->weight}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="number" step="0.1" required name="price" value="{{$product->price}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Images <br>
                                PHOTOS SHOULD BE UPLOADED AGAIN</label>
                            <input multiple type="file" required name="images[]" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
