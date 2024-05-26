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
        $product = Product::paginate(20);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);
    
        $product = Product::create($validatedData);

        $data = [
            'status' => 200,
            'message' => 'Product created successfully',
            'product' => $product,
        ];
    
        return response()->json($data, 200);    

    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
   
        $data = [
            'status'=>200,
            'product'=>$product
        ];
        return  response()->json($data,200);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);
    
        $product->update($validatedData);
    
        $data = [
            'status' => 200,
            'message' => 'Product updated successfully',
        ];
    
        return response()->json($data, 200);
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        $data =[
            'status' => 200,
            'message'=>'producte deleted successfully'
        ];

        return response()->json($data, 200);
    }
}
