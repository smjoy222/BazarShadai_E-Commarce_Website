<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\CardException;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function createPaymentIntent(Request $request)
    {
        try {
            $user = Auth::guard('web')->user();
            
            // Get cart items and calculate total
            $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
            
            if ($cartItems->isEmpty()) {
                return response()->json(['error' => 'Cart is empty'], 400);
            }

            $subtotal = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });
            
            $deliveryFee = 50; // Fixed delivery fee
            $total = $subtotal + $deliveryFee;
            
            // Convert to cents (Stripe expects amounts in cents)
            $amount = $total * 100;

            // Create payment intent
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'bdt',
                'description' => 'BazarShadai Order - ' . $user->name,
                'receipt_email' => $user->email,
                'metadata' => [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_email' => $user->email,
                    'order_type' => 'online_purchase'
                ]
            ]);

            return response()->json([
                'client_secret' => $paymentIntent->client_secret,
                'amount' => $total
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function processPayment(Request $request)
    {
        // Add debugging
        \Log::info('ProcessPayment called', [
            'method' => $request->method(),
            'content_type' => $request->header('Content-Type'),
            'all_data' => $request->all(),
            'input' => $request->input(),
            'json' => $request->json()->all() ?? 'No JSON data'
        ]);

        try {
            $user = Auth::guard('web')->user();
            $paymentIntentId = $request->payment_intent_id;

            // Validate billing information
            $validator = \Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'address' => 'required|string|max:500',
                'city' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed: ' . $validator->errors()->first()
                ], 422);
            }

            // Retrieve the payment intent from Stripe
            try {
                $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid payment intent: ' . $e->getMessage()
                ], 400);
            }

            // Update payment intent with billing information
            try {
                $paymentIntent = PaymentIntent::update($paymentIntentId, [
                    'description' => 'BazarShadai Order - ' . $request->first_name . ' ' . $request->last_name,
                    'receipt_email' => $request->email,
                    'metadata' => [
                        'user_id' => $user->id,
                        'customer_name' => $request->first_name . ' ' . $request->last_name,
                        'customer_email' => $request->email,
                        'customer_phone' => $request->phone,
                        'customer_address' => $request->address . ', ' . $request->city,
                        'order_type' => 'online_purchase'
                    ]
                ]);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Stripe API error: ' . $e->getMessage()
                ], 400);
            }

            if ($paymentIntent->status === 'succeeded') {
                // Get cart items for order
                $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
                
                $subtotal = $cartItems->sum(function ($item) {
                    return $item->product->price * $item->quantity;
                });
                
                $deliveryFee = 50;
                $total = $subtotal + $deliveryFee;

                // Create order record
                $order = Order::create([
                    'user_id' => $user->id,
                    'order_number' => 'ORD-' . strtoupper(uniqid()),
                    'payment_intent_id' => $paymentIntentId,
                    'payment_status' => 'completed',
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'subtotal' => $subtotal,
                    'delivery_fee' => $deliveryFee,
                    'total' => $total
                ]);

                // Create order items
                foreach ($cartItems as $cartItem) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $cartItem->product_id,
                        'quantity' => $cartItem->quantity,
                        'price' => $cartItem->product->price,
                        'total' => $cartItem->product->price * $cartItem->quantity
                    ]);
                }

                // Clear the cart after successful payment
                Cart::where('user_id', $user->id)->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'Payment successful! Your order has been placed.',
                    'order_number' => $order->order_number
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment failed. Please try again.'
                ], 400);
            }

        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Stripe error: ' . $e->getMessage()
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function checkout()
    {
        $user = Auth::guard('web')->user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Your cart is empty!');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        
        $deliveryFee = 50;
        $total = $subtotal + $deliveryFee;
        $stripeKey = env('STRIPE_KEY');

        return view('user.checkout', compact('cartItems', 'subtotal', 'deliveryFee', 'total', 'stripeKey'));
    }

    public function orderHistory()
    {
        $user = Auth::guard('web')->user();
        $orders = Order::where('user_id', $user->id)
            ->with(['orderItems.product'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.orders', compact('orders'));
    }
}
