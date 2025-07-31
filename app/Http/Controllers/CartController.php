<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'redirect' => route('login.form'),
                'message' => 'Please login to add items to cart'
            ]);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        $user = Auth::guard('web')->user();
        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;
        $price = $request->price;

        // Check if product already exists in user's cart
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            // Update quantity if product already in cart
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            // Add new item to cart
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $price
            ]);
        }

        // Get updated cart count
        $cartCount = $user->cart_count;

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart successfully!',
            'cart_count' => $cartCount
        ]);
    }

    // View cart page
    public function viewCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login.form');
        }

        $user = Auth::guard('web')->user();
        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return view('user.cart', compact('cartItems', 'total'));
    }

    // Update cart item quantity
    public function updateQuantity(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized']);
        }

        $request->validate([
            'cart_id' => 'required|exists:cart,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('id', $request->cart_id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found']);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        $user = Auth::guard('web')->user();
        $cartCount = $user->cart_count;

        $total = Cart::where('user_id', Auth::id())->with('product')->get()->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully',
            'cart_count' => $cartCount,
            'item_total' => $cartItem->quantity * $cartItem->price,
            'total' => $total
        ]);
    }

    // Remove item from cart
    public function removeFromCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized']);
        }

        $request->validate([
            'cart_id' => 'required|exists:cart,id'
        ]);

        $cartItem = Cart::where('id', $request->cart_id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Cart item not found']);
        }

        $cartItem->delete();

        $user = Auth::guard('web')->user();
        $cartCount = $user->cart_count;

        $total = Cart::where('user_id', Auth::id())->with('product')->get()->sum(function ($item) {
            return $item->quantity * $item->price;
        });

        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart',
            'cart_count' => $cartCount,
            'total' => $total
        ]);
    }

    // Get cart count for AJAX requests
    public function getCartCount()
    {
        if (!Auth::check()) {
            return response()->json(['cart_count' => 0]);
        }

        $user = Auth::guard('web')->user();
        return response()->json(['cart_count' => $user->cart_count]);
    }
}
