@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                   <table class="table table-hover">
                       <thead>
                           <th>Name</th>
                           <th>Image</th>
                           <th>Price</th>
                           <th>Edit</th>
                           <th>Delete</th>
                       </thead>
                       <tbody>
                        @foreach($products as $product)
                           <tr>
                               <td>{{$product->name}}</td>
                               <td><img src="{{asset($product->image)}}" width="40px" height="40px" alt=""></td>
                               <td>{{$product->price}}</td>
                               <td><a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-sm btn-info">Edit</a></td>
                               <td><a href="{{route('product.delete', ['id'=> $product->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                {{$products->links()}}    
                </div>
            </div>

@endsection
