@extends('links.main')
@section('main-content')
<br>
<div class="container">
    <div class="row">
        <div class="class col-md-4">
            <h3><a href="{{ route('product.index')}}">Back</a></h3>
        </div>
        <div class="class col-md-4">
        <form action="{{ route('product.update',$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Image:</label>
                @if($data->image)
                <br><br>
                <img width="100" height="80" src="{{ URL::to('/') }}/images/{{ $data->image }}" alt="">
                <br><br>
                <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                @else
                <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name:</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Qty:</label>
                <input type="text" name="qty" class="form-control" id="exampleInputPassword1" placeholder="quantity" value="{{ $data->qty }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price:</label>
                <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="price" value="{{ $data->price }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="class col-md-4"></div>
    </div>
</div>