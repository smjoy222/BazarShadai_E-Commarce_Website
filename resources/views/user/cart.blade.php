@extends('index')
@push('style')
<title>Shopping Cart - BazarShadai</title>
@endpush
@section('main-content')

<!-- Cart Page -->
<section class="py-12 bg-gray-50 min-h-screen">
  <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Page Header -->
    <div class="text-center mb-8">
      <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
        Shopping <span class="text-green-600">Cart</span>
      </h1>
      <div class="w-24 h-1 bg-green-600 mx-auto"></div>
    </div>

    @if($cartItems->isEmpty())
      <!-- Empty Cart -->
      <div class="text-center py-16">
        <div class="w-32 h-32 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
          <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293c-.188.188-.293.442-.293.707V17h14v-1.293c0-.265-.105-.519-.293-.707L16 13" />
          </svg>
        </div>
        <h3 class="text-2xl font-semibold text-gray-700 mb-2">Your cart is empty</h3>
        <p class="text-gray-500 mb-6">Add some fresh products to get started!</p>
        <a href="{{ route('home') }}" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 font-medium transition duration-300">
          Continue Shopping
        </a>
      </div>
    @else
      <!-- Cart Items -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Cart Items List -->
        <div class="lg:col-span-2 space-y-4">
          @foreach($cartItems as $item)
            <div class="cart-item bg-white rounded-2xl shadow-md p-6 flex items-center space-x-4" data-cart-id="{{ $item->id }}">
              
              <!-- Product Image -->
              <div class="w-20 h-20 bg-gray-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <img src="{{ asset('assets/images/' . $item->product->category . '/' . $item->product->image) }}" 
                     alt="{{ $item->product->name }}" 
                     class="w-16 h-16 object-contain">
              </div>

              <!-- Product Details -->
              <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name }}</h3>
                <p class="text-green-600 font-bold text-xl">৳ {{ number_format($item->price, 0) }}</p>
              </div>

              <!-- Quantity Controls -->
              <div class="flex items-center space-x-3">
                <button class="quantity-btn minus-btn w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition duration-200" 
                        data-action="decrease" data-cart-id="{{ $item->id }}">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                  </svg>
                </button>
                
                <span class="quantity-display w-12 text-center font-semibold text-gray-800" data-cart-id="{{ $item->id }}">
                  {{ $item->quantity }}
                </span>
                
                <button class="quantity-btn plus-btn w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition duration-200" 
                        data-action="increase" data-cart-id="{{ $item->id }}">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                </button>
              </div>

              <!-- Item Total -->
              <div class="text-right flex-shrink-0">
                <p class="text-lg font-bold text-green-600 item-total" data-cart-id="{{ $item->id }}">
                  ৳ {{ number_format($item->quantity * $item->price, 0) }}
                </p>
                <button class="remove-btn text-red-500 hover:text-red-700 text-sm mt-1 transition duration-200" 
                        data-cart-id="{{ $item->id }}">
                  Remove
                </button>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
          <div class="bg-white rounded-2xl shadow-md p-6 sticky top-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Order Summary</h3>
            
            <div class="space-y-3 mb-6">
              <div class="flex justify-between">
                <span class="text-gray-600">Subtotal:</span>
                <span class="font-semibold cart-subtotal">৳ {{ number_format($total, 0) }}</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Delivery Fee:</span>
                <span class="font-semibold">৳ 50</span>
              </div>
              <div class="border-t pt-3">
                <div class="flex justify-between">
                  <span class="text-lg font-semibold text-gray-800">Total:</span>
                  <span class="text-lg font-bold text-green-600 cart-total">৳ {{ number_format($total + 50, 0) }}</span>
                </div>
              </div>
            </div>

            <button class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 font-medium transition duration-300 mb-3">
              Proceed to Checkout
            </button>
            
            <a href="{{ route('home') }}" class="block w-full text-center bg-gray-100 text-gray-700 py-3 rounded-lg hover:bg-gray-200 font-medium transition duration-300">
              Continue Shopping
            </a>
          </div>
        </div>
      </div>
    @endif
  </div>
</section>

@push('scripts')
<script>
// Cart page specific functionality is handled by CartManager in cart.js
// This just ensures the cart manager is initialized for the cart page
document.addEventListener('DOMContentLoaded', function() {
    if (window.cartManager) {
        window.cartManager.reinitialize();
    }
});
</script>
@endpush

@endsection
