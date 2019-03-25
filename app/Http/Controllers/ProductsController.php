<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products' , Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'price' => 'required|digits_between:1,10',
            'image' => 'required',
            'description' => 'required'
        ]);

        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('products', $image_new_name);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'products/'.$image_new_name,
            'description' => $request->description
        ]);

        Session::flash('success', 'Product created');

        return redirect()->route('products');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'price' => 'required|digits_between:1,10',
            'description' => 'required'
        ]);
        
        $product = Product::find($id);

        if($request->hasFile('image')){
            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('products', $image_new_name);

            $product->image = 'products/'.$image_new_name;

            $product->save();
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        Session::flash('success', 'Product Updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        Session::flash('danger', 'Product Deleted');

        return redirect()->back();
    }
}
