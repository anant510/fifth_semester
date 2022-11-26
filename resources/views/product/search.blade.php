@extends('links.main')
@section('main-content')
<br>
<div class="container">
<form action="{{ route('product.search')}}" method="post">
    @csrf
    <div class="row">
        <div class="class col-md-3"></div>  
        <div class="class col-md-1">   <label for="exampleInputEmail1"><h3><b>Search</b></h3></label></div>
        <div class="class col-md-4">
           
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Search here..">
                </div>
               
     
        </div>
        <div class="class col-md-4">
        <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
</div>

<br>
<div class="container">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="row">
        <div class="class col-md-2">
            <h3><a href="{{ route('product.index')}}">Index</a></h3>
        </div>
        <div class="col-md-2">
            <h3><a href="{{ route('product.create') }}">Create Page</a></h3>
        </div>
        <div class="col-md-6 ">
            <table class="table table-stripped table-bordered table-responsive">
                <thead style="background-color: green; color:white"> 
                    <tr>
                    <th scope="col">#</th>
                  
                    <th scope="col">Name</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                    <th>Image</th>
                    </tr>
                </thead>
                <?php
                $value = 0;
                $id = ++$value;
                ?>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                    <th scope="row">{{ $id }}</th>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->qty }}</td>
                    <td>{{ $data->price }}</td>
                    <td>
                        <a href="{{ route('product.edit',$data->id) }}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;
                        <!-- delete modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$data->id}}">
                           Deelete
                        </button>

                    </td>
                    <td><img width="80" height="80" src="{{ URL::to('/') }}/images/{{ $data->image }}" alt=""></td>
                    </tr>
                    <!-- modal link -->
                        @include('product.modal')
                    <!-- end modal links     -->
                            
                    @endforeach
                 
                </tbody>
              
            </table>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>


<!-- delete modal starts here.. -->




@endsection

