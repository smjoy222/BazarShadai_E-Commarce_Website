<!-- Product {{ $loopIteration }} - {{ $product->name }} -->

<div class="product-card bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
  <div class="p-6">
    <div class="bg-gray-100 rounded-xl h-48 flex items-center justify-center mb-4 relative">
      <span
        class="absolute top-2 left-2 {{ $product->badge['color'] }} text-white text-xs px-2 py-1 rounded-full">{{ $product->badge['text'] }}</span>
      <img src="{{ asset('assets/' . $product->image) }}" alt="{{ $product->name }}" class="h-32 w-32 object-contain">
    </div>
    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $product->name }}</h3>
    <div class="flex items-center justify-between mb-3">
      <span class="text-2xl font-bold text-green-600">৳ {{ number_format($product->price, 0) }}
        <span class="text-sm text-gray-500">{{ $product->price_unit }}</span>
      </span>
    </div>
    <div class="flex items-center mb-4">
      <div class="flex text-yellow-400">
        <span>{{ $product->star_rating }}</span>
      </div>
      <span class="text-sm text-gray-500 ml-2">({{ $product->rating }}.{{ rand(0, 9) }})</span>
    </div>
    <div class="flex space-x-2">
      <button
        class="flex-1 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 font-medium transition duration-300">
        BUY NOW
      </button>
      <button
        class="add-to-cart-btn flex-1 border border-green-600 text-green-600 py-2 px-4 rounded-lg hover:bg-green-50 font-medium transition duration-300"
        data-product-id="{{ $product->id }}" data-product-name="{{ $product->name }}"
        data-price="{{ $product->price }}">
        ADD TO CART
      </button>
    </div>
  </div>

</div>