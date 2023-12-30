<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productShow()
    {
        $products = Product::all();
        // dd($products);
        if ($products) {
            return response()->json($products);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Product Found'
            ]);
        }
    }
    public function productCreate(Request $request)
    {
        dd($request->image);
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric|',
            'description' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ]);
        // return redirect()->back();
    }
    public function productDelete($id)
    {
        $product = Product::find($id);
        // dd($product);

    }
}
