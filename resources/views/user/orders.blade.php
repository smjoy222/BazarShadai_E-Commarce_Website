@extends('index')
@push('style')
    <title>Order History - BazarShadai</title>
@endpush

@section('main-content')
    <div class="container max-w-6xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Order History</h1>
            <p class="text-gray-600 mt-2">View your past orders and delivery details</p>
        </div>

        @if($orders->isEmpty())
            <!-- No Orders -->
            <div class="text-center py-16">
                <div class="w-32 h-32 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-700 mb-2">No orders yet</h3>
                <p class="text-gray-500 mb-6">Start shopping to see your order history here!</p>
                <a href="{{ route('home') }}"
                    class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 font-medium transition duration-300">
                    Start Shopping
                </a>
            </div>
        @else
            <!-- Orders List -->
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Order Header -->
                        <div class="bg-gray-50 px-6 py-4 border-b">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600">Order Number</p>
                                    <p class="font-semibold text-gray-800">{{ $order->order_number }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Order Date</p>
                                    <p class="font-semibold text-gray-800">{{ $order->created_at->format('M j, Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Total Amount</p>
                                    <p class="font-semibold text-green-600">৳ {{ number_format($order->total) }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Payment Status</p>
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                                                                                                                                            {{ $order->payment_status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Order Details -->
                        <div class="px-6 py-4">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Billing Information -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Billing Information</h3>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <p class="font-medium text-gray-800">{{ $order->full_name }}</p>
                                        <p class="text-gray-600">{{ $order->email }}</p>
                                        <p class="text-gray-600">{{ $order->phone }}</p>
                                        <p class="text-gray-600 mt-2">{{ $order->address }}</p>
                                        <p class="text-gray-600">{{ $order->city }}</p>
                                    </div>
                                </div>

                                <!-- Order Items -->
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Order Items</h3>
                                    <div class="space-y-3">
                                        @foreach($order->orderItems as $item)
                                            <div class="flex items-center justify-between bg-gray-50 rounded-lg p-3">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                                        <img src="{{ asset('assets/' . $item->product->image) }}" alt="{{ $item->product->name }}"
                                                            class="w-10 h-10 object-contain">
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-800">{{ $item->product->name }}</p>
                                                        <p class="text-sm text-gray-600">Qty: {{ $item->quantity }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <p class="font-semibold text-gray-800">৳ {{ number_format($item->total) }}</p>
                                                    <p class="text-sm text-gray-600">৳ {{ number_format($item->price) }} each</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Order Summary -->
                            <div class="mt-6 bg-gray-50 rounded-lg p-4">
                                <div class="flex justify-between items-center">
                                    <div class="space-y-1">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Subtotal:</span>
                                            <span class="text-gray-800">৳ {{ number_format($order->subtotal) }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Delivery Fee:</span>
                                            <span class="text-gray-800">৳ {{ number_format($order->delivery_fee) }}</span>
                                        </div>
                                        <div class="flex justify-between font-semibold text-lg border-t pt-2">
                                            <span class="text-gray-800">Total:</span>
                                            <span class="text-green-600">৳ {{ number_format($order->total) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="mt-8">
                    {{ $orders->links() }}
                </div>
            @endif
        @endif
    </div>
@endsection