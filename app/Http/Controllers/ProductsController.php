<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
        ->latest()
        ->paginate(12);
    
        return view('viewProducts', compact('products'));
    } 

    public function createProduct()
    {
        $categories = Category::get();

        return view('create', compact('categories'));
    }

    public function add(ProductRequest $request)
    { 
        $product = Product::create($request->validated());
        
        return response()->json(['status' => 'success']);  
    }

    public function edit(Product $product)
    { 
        $categories = Category::all();
        $product->load('category');

        return view('viewEdit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    { 
        try {
            $product->update($request->validated());
            
            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Update failed'
            ], 500);
        }
    }

    public function delete(Product $product)
    { 
        DB::transaction(function () use ($product) {
            $product->delete();
        });

        return response()->json(['status' => 'success']);
    }

    public function display(Product $product)
    { 
        $product->get();
    
        return view('viewItem', compact('product'));     
    }
}
