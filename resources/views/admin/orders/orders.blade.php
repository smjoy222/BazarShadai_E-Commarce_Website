@extends('admin.base')

@push('styles')
<title>Admin Orders</title>
<style>
  .table-container {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-bottom: 2rem;
  }
  
  .table-header {
    background: linear-gradient(135deg, #26a334 0%, #72e63c 100%);
    color: white;
    padding: 1.5rem;
    border-bottom: 3px solid #5a67d8;
  }
  
  .table-title {
    font-size: 1.875rem;
    font-weight: 700;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }
  
  .orders-table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .orders-table th {
    background: #f8fafc;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    color: #4a5568;
    border-bottom: 2px solid #e2e8f0;
  }
  
  .orders-table td {
    padding: 1rem;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: top;
  }
  
  .orders-table tr:hover {
    background-color: #f7fafc;
  }
  
  .status-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
  }
  
  .status-completed {
    background-color: #d4edda;
    color: #155724;
  }
  
  .status-pending {
    background-color: #fff3cd;
    color: #856404;
  }
  
  .order-items {
    max-height: 100px;
    overflow-y: auto;
    font-size: 0.875rem;
  }
  
  .stats-card {
    background: white;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    border-left: 4px solid #667eea;
    margin-bottom: 2rem;
  }
</style>
@endpush

@section('content')
<div>
  @include('admin.navbar.navbar')
  <div class="p-6 bg-gradient-to-br from-gray-50 to-gray-100 min-h-[calc(100vh_-_72px)]">
    
    <!-- Stats Card -->
    <div class="stats-card">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-lg font-semibold text-gray-700 mb-1">Orders Overview</h2>
          <p class="text-gray-500 text-sm">Manage completed orders from customers</p>
        </div>
        <div class="text-right">
          <div class="text-2xl font-bold text-indigo-600" id="total-orders">{{ $orders->total() }}</div>
          <div class="text-sm text-gray-500">Total Orders</div>
        </div>
      </div>
    </div>

    <!-- Main Table Container -->
    <div class="table-container">
      <div class="table-header">
        <div class="flex items-center justify-between">
          <h1 class="table-title">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            Orders Management
          </h1>
        </div>
      </div>

      @if($orders->count() > 0)
        <table class="orders-table">
          <thead>
            <tr>
              <th>Order #</th>
              <th>Customer</th>
              <th>Date</th>
              <th>Items</th>
              <th>Total</th>
              <th>Status</th>
              <th>Contact</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td>
                  <div class="font-semibold text-blue-600">{{ $order->order_number }}</div>
                  <div class="text-sm text-gray-500">{{ $order->payment_intent_id ? 'Stripe ID: ' . substr($order->payment_intent_id, 0, 15) . '...' : 'No Payment ID' }}</div>
                </td>
                <td>
                  <div class="font-semibold">{{ $order->full_name }}</div>
                  <div class="text-sm text-gray-600">{{ $order->email }}</div>
                  <div class="text-sm text-gray-500">User ID: {{ $order->user_id }}</div>
                </td>
                <td>
                  <div class="font-semibold">{{ $order->created_at->format('M j, Y') }}</div>
                  <div class="text-sm text-gray-500">{{ $order->created_at->format('h:i A') }}</div>
                </td>
                <td>
                  <div class="order-items">
                    @foreach($order->orderItems as $item)
                      <div class="mb-1">
                        <span class="font-medium">{{ $item->product->name }}</span>
                        <span class="text-gray-500">({{ $item->quantity }}x)</span>
                      </div>
                    @endforeach
                  </div>
                </td>
                <td>
                  <div class="font-bold text-green-600 text-lg">৳{{ number_format($order->total) }}</div>
                  <div class="text-sm text-gray-500">
                    <div>Subtotal: ৳{{ number_format($order->subtotal) }}</div>
                    <div>Delivery: ৳{{ number_format($order->delivery_fee) }}</div>
                  </div>
                </td>
                <td>
                  <span class="status-badge status-completed">
                    {{ ucfirst($order->payment_status) }}
                  </span>
                </td>
                <td>
                  <div class="text-sm">
                    <div class="font-semibold">{{ $order->phone }}</div>
                    <div class="text-gray-600">{{ $order->email }}</div>
                  </div>
                </td>
                <td>
                  <div class="text-sm text-gray-600 max-w-xs">
                    {{ $order->address }}, {{ $order->city }}
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <!-- Pagination -->
        @if($orders->hasPages())
          <div class="px-6 py-4 bg-gray-50">
            {{ $orders->links() }}
          </div>
        @endif

      @else
        <!-- No Orders State -->
        <div class="p-12 text-center">
          <div class="w-24 h-24 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-700 mb-2">No Orders Yet</h3>
          <p class="text-gray-500 mb-6">Orders will appear here when customers complete their payments.</p>
          <a href="{{ route('admin-dashboard') }}" class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Dashboard
          </a>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
