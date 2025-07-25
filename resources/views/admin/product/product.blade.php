@extends('admin.base')

@push('styles')
<title>Admin Products</title>
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
  
  .add-product-btn {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
  }
  
  .add-product-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 15px -3px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
  }
  
  .products-table {
    width: 100%;
    border-collapse: collapse;
  }
  
  .products-table th {
    background: #f8fafc;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    color: #4a5568;
    border-bottom: 2px solid #e2e8f0;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 0.05em;
  }
  
  .products-table td {
    padding: 1rem;
    border-bottom: 1px solid #e2e8f0;
    vertical-align: middle;
  }
  
  .products-table tr:hover {
    background-color: #f7fafc;
    transition: background-color 0.2s ease;
  }
  
  .product-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .category-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  
  .category-vegetable { background: #f0fff4; color: #22543d; }
  .category-fruits { background: #fef5e7; color: #c05621; }
  .category-meats { background: #fed7d7; color: #822727; }
  .category-fish { background: #e6fffa; color: #234e52; }
  .category-seafood { background: #ebf8ff; color: #2a4365; }
  .category-dairy { background: #fefcbf; color: #744210; }
  
  .price-tag {
    font-weight: 700;
    color: #2d3748;
    font-size: 1.125rem;
  }
  
  .featured-btn {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  
  .featured-btn.featured {
    background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
    color: white;
    box-shadow: 0 2px 4px rgba(72, 187, 120, 0.3);
  }
  
  .featured-btn.not-featured {
    background: #e2e8f0;
    color: #4a5568;
  }
  
  .featured-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
  
  .delete-btn {
    background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  
  .delete-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(245, 101, 101, 0.4);
  }
  
  .loading-spinner {
    border: 3px solid #f3f3f3;
    border-top: 3px solid #667eea;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    animation: spin 1s linear infinite;
    margin: 2rem auto;
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  .empty-state {
    text-align: center;
    padding: 3rem 2rem;
    color: #718096;
  }
  
  .empty-state svg {
    width: 64px;
    height: 64px;
    margin: 0 auto 1rem;
    color: #cbd5e0;
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
          <h2 class="text-lg font-semibold text-gray-700 mb-1">Products Overview</h2>
          <p class="text-gray-500 text-sm">Manage your product inventory</p>
        </div>
        <div class="text-right">
          <div class="text-2xl font-bold text-indigo-600" id="total-products">-</div>
          <div class="text-sm text-gray-500">Total Products</div>
        </div>
      </div>
    </div>

    <!-- Main Table Container -->
    <div class="table-container">
      <div class="table-header">
        <div class="flex items-center justify-between">
          <h1 class="table-title">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7"></path>
            </svg>
            Products Management
          </h1>
        </div>
      </div>

      <table class="products-table" id="product-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="product-list">
          <!-- Loading state -->
          <tr id="loading-row">
            <td colspan="7">
              <div class="loading-spinner"></div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <script src="{{ asset('assets/js/admin/product.js') }}"></script>
  </div>
</div>
@endsection