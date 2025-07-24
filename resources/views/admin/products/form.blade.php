@extends('layouts.admin')

@section('title', isset($product) ? 'Edit Product' : 'Add New Product')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            {{ isset($product) ? 'Edit Product' : 'Add New Product' }}
        </h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6">
            <form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 gap-6">
                    <!-- Product Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Name *
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name', $product->name ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                               required>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Category *
                        </label>
                        <select name="category" 
                                id="category" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                required>
                            <option value="">Select Category</option>
                            <option value="vegetables" {{ old('category', $product->category ?? '') === 'vegetables' ? 'selected' : '' }}>Vegetables</option>
                            <option value="fruits" {{ old('category', $product->category ?? '') === 'fruits' ? 'selected' : '' }}>Fruits</option>
                            <option value="meats" {{ old('category', $product->category ?? '') === 'meats' ? 'selected' : '' }}>Meats</option>
                            <option value="fish" {{ old('category', $product->category ?? '') === 'fish' ? 'selected' : '' }}>Fish</option>
                            <option value="seafood" {{ old('category', $product->category ?? '') === 'seafood' ? 'selected' : '' }}>Seafood</option>
                            <option value="dairy" {{ old('category', $product->category ?? '') === 'dairy' ? 'selected' : '' }}>Dairy</option>
                        </select>
                    </div>

                    <!-- Price and Stock -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                Price ($) *
                            </label>
                            <input type="number" 
                                   name="price" 
                                   id="price" 
                                   step="0.01"
                                   min="0"
                                   value="{{ old('price', $product->price ?? '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                   required>
                        </div>

                        <div>
                            <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-2">
                                Stock Quantity *
                            </label>
                            <input type="number" 
                                   name="stock_quantity" 
                                   id="stock_quantity" 
                                   min="0"
                                   value="{{ old('stock_quantity', $product->stock_quantity ?? '') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                                   required>
                        </div>
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Product Image {{ isset($product) ? '' : '*' }}
                        </label>
                        @if(isset($product) && $product->image)
                            <div class="mb-3">
                                <img src="{{ $product->image }}" alt="Current image" class="h-32 w-32 object-cover rounded-lg">
                                <p class="text-sm text-gray-500 mt-1">Current image</p>
                            </div>
                        @endif
                        <input type="file" 
                               name="image" 
                               id="image" 
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                               {{ isset($product) ? '' : 'required' }}>
                        <p class="text-sm text-gray-500 mt-1">
                            Accepted formats: JPG, PNG, GIF. Max size: 2MB.
                        </p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   value="1"
                                   {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-green-600 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700">Product is active</span>
                        </label>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-3 mt-8">
                    <a href="{{ route('admin.products.index') }}" 
                       class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition duration-200">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-md transition duration-200">
                        {{ isset($product) ? 'Update Product' : 'Create Product' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
