@extends('layouts.app')

@section('content')

@include('includes.errors')

            <div class="card">
                <div class="card-header">Edit Products</div>

                <div class="card-body">

                <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                <input class="form-control" type="text"  value="{{$product->name}}" name="name" placeholder="Name of the Product">                
                </div>
                <div class="form-group">
                <input class="form-control" type="text" value="{{$product->price}}" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                <img src="{{asset($product->image)}}" width="100px" height="100px" class="rounded border border-info" alt="">
                </div>
                <div class="form-group">
                <input class="form-control" type="file"  name="image" id="">
                </div>
                <div class="form-group">
                <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Description of the product">{{$product->description}}</textarea>
                </div>

                <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Update Productss</button>
                </div>
                
                
                </form>
                   
                    
                </div>
            </div>

@endsection
