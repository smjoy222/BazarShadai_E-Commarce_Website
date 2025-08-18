<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
{
  public function showProduct($category)
  {
    $products = Product::where('category', $category)->get();
    $productCount = $products->count();

    return view('product.product', compact('products', 'category', 'productCount'));
  }

  public function details($id)
  {
    $product = Product::findOrFail($id);
    return view('product.details', compact('product'));
  }
}
