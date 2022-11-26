@extends('links.main')
@section('main-content')
<br>
<div class="container">
    <div class="row">
        <div class="class col-md-4">
            <h3><a href="{{ route('product.index')}}">Back</a></h3>
        </div>
        <div class="class col-md-4">
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Image:</label>
                <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name:</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Qty:</label>
                <input type="text" name="qty" class="form-control" id="exampleInputPassword1" placeholder="quantity">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Price:</label>
                <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <div class="class col-md-4"></div>
    </div>
</div>