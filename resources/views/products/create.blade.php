@extends('layouts.app')

@section('content')

@include('includes.errors')

            <div class="card">
                <div class="card-header">Create Products</div>

                <div class="card-body">

                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                <input class="form-control" type="text" name="name" placeholder="Name of the Product">                
                </div>
                <div class="form-group">
                <input class="form-control" type="text" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                <input class="form-control" type="file" name="image" id="">
                </div>
                <div class="form-group">
                <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Description of the product"></textarea>
                </div>

                <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Add Productss</button>
                </div>
                
                
                </form>
                   
                    
                </div>
            </div>

@endsection
