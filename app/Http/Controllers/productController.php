<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
      $product = Product::all();
      return view('product', compact('product'));
    }

    public function showProduct($slug)
    {
      $product = Product::where('product_slug', $slug)
              ->firstOrFail();


      return view('product', compact('product'));
    }
    
    public function edit(Product $product)
    {
      return view('product.edit', compact('product'));
        
    }

    public function update(Request $request, Product $product)
    {
      $request->validate([
          'product_title' => 'required',
          'product_slug'    => 'required',
          'product_image' => 'required',
      ]);
      $product->update($request->all());

      return redirect('/product');
    }

    public function destroy(Product $product)
    {
      $product->delete();

      return redirect('/product');
    }
}