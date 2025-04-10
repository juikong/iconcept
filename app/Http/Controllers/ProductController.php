<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return response()->json($products);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        if (Product::where('title', $request->title)->exists()) {
            return response()->json(['error' => 'Title already exists'], 400);
        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->thumbnail) {
            $product->thumbnail = $request->thumbnail;
        }
        $product->save();
        return response()->json($product);
    }
 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->thumbnail) {
            $product->thumbnail = $request->thumbnail;
        }
        $product->save();
        return response()->json($product);
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    /**
     * Search for a product by title.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'LIKE', "%{$query}%")->get();
        return response()->json($products);
    }
}
