<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_products' => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'low_stock' => Product::where('stock_quantity', '<', 10)->count(),
            'out_of_stock' => Product::where('stock_quantity', 0)->count(),
        ];

        $recent_products = Product::latest()->limit(5)->get();
        $low_stock_products = Product::where('stock_quantity', '<', 10)->get();

        return view('admin.dashboard.dashboard', compact('stats', 'recent_products', 'low_stock_products'));
    }

    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:vegetables,fruits,meats,fish,seafood,dairy',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = Storage::url($imagePath);
        }

        $validated['is_active'] = $request->has('is_active');

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:vegetables,fruits,meats,fish,seafood,dairy',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $product->image));
            }
            
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = Storage::url($imagePath);
        }

        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // Delete image if exists
        if ($product->image && Storage::disk('public')->exists(str_replace('/storage/', '', $product->image))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    // Legacy methods for existing admin views
    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.product', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'rating' => 'required|integer|min:1|max:5',
            'image' => 'required|string|max:255'
        ]);

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'rating' => $request->rating,
            'image' => $request->image
        ]);

        return redirect()->route('admin-product')->with('success', 'Product added successfully!');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin-product')->with('success', 'Product deleted successfully!');
    }

    // API method to get products as JSON
    public function apiProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
