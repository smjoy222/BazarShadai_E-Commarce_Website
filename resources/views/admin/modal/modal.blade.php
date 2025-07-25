<div class="absolute inset-0 bg-black/40 backdrop-blur-sm w-full min-h-screen text-white flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300" id="add-product-modal">
  <div class="bg-gradient-to-br from-green-400/30 via-green-500/40 to-green-600/30 
              backdrop-blur-md rounded-2xl shadow-2xl p-8 w-full max-w-md border border-white/20">
    <h2 class="text-2xl font-bold mb-6 text-center">Add Product</h2>
    <form class="space-y-5">
      <div>
        <label for="productName" class="block mb-1 text-sm font-medium text-white">Product Name</label>
        <input type="text" id="productName"
          class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/30 focus:border-white focus:outline-none placeholder-white/70"
          placeholder="Enter product name">
      </div>
      <div>
        <label for="productPrice" class="block mb-1 text-sm font-medium text-white">Product Price</label>
        <input type="number" id="productPrice"
          class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/30 focus:border-white focus:outline-none placeholder-white/70"
          placeholder="Enter product price">
      </div>
      <div>
        <label for="category" class="block mb-1 text-sm font-medium text-white">Category</label>
        <select name="category" id="category"
          class="w-full px-4 py-2 rounded-lg border border-white/30 text-white focus:border-white focus:outline-none bg-zinc-800">
          <option value="" disabled selected>Select Category</option>
          <option value="vegetable">Vegetable</option>
          <option value="fruits">Fruits</option>
          <option value="meats">Meats</option>
          <option value="fishs">Fish</option>
          <option value="sea-food">Sea Food</option>
          <option value="dairy">Dairy</option>
        </select>
      </div>
      <div>
        <label for="productImage" class="block mb-1 text-sm font-medium text-white">Product Image</label>
        <input type="file" id="productImage" allow="image/*" accept="image/*"
          class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/30 focus:border-white focus:outline-none text-white">
      </div>
    </form>
    <div class="flex justify-end mt-6 gap-4">
      <button class="bg-white/10 border border-white/30 text-white px-5 py-2 rounded-lg hover:bg-white/20 transition duration-200" id="submit-btn" type="submit">Submit</button>
      <button id="close-btn"
        class="bg-white/10 border border-white/30 text-white px-5 py-2 rounded-lg hover:bg-white/20 transition duration-200">
        Close
      </button>
    </div>
  </div>
</div>