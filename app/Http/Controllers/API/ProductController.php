<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $data = [
            'status'=>200,
            'product'=>$product
        ];
        return  response()->json($data,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price'=> 'required',
            'stock'=>'required'
     ]);
     if($validator ->fails() ){
        $data=[
          "status"=>422,
          "message"=> $validator->messages()
        ];
        return response()->json($data,422);
     }
     $product = new Product;
     $product->name = $request->name;
     $product->price = $request->price;
     $product->stock = $request->stock;
     $product->save();

     $data=[
        "status"=>200,
        "message"=> 'Product Creadted succefully'
      ];
      return response()->json($data,200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
