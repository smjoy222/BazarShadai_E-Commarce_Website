@extends('index')
@push('style')
<title>{{ $product->name }} - Bazar Shadai</title>
@endpush
@section('main-content')
<section class="py-12 bg-gray-50">
  <div class="container max-w-5xl mx-auto px-4">
    <div class="flex flex-col md:flex-row gap-10">
      <div class="md:w-1/2 flex justify-center items-center">
        <img src="{{ asset('assets/' . $product->image) }}" alt="{{ $product->name }}" class="rounded-xl shadow-lg max-h-96 object-contain">
      </div>
      <div class="md:w-1/2 flex flex-col justify-center">
        <h2 class="text-3xl font-bold mb-4 text-green-700">{{ $product->name }}</h2>
        <div class="mb-2 text-lg text-gray-700">Category: <span class="font-semibold">{{ ucfirst($product->category) }}</span></div>
        <div class="mb-2 text-lg text-gray-700">Price: <span class="font-semibold">৳{{ $product->price }}</span></div>
        <div class="mb-6 text-gray-600">{{ $product->description ?? 'No description available.' }}</div>
        <button 
          class="add-to-cart-btn bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition"
          data-product-id="{{ $product->id }}"
          data-product-name="{{ $product->name }}"
          data-price="{{ $product->price }}"
        >Add to Cart</button>
      </div>
    </div>
  </div>
</section>
@endsection
