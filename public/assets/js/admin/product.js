function deleteProduct(productId) {
    if (confirm("Are you sure you want to delete this product?")) {
        fetch(`/api/deleteProduct.php?id=${productId}`, {
            method: "DELETE",
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    showNotification("Product deleted successfully!", "success");
                    getData();
                } else {
                    showNotification("Failed to delete product: " + data.error, "error");
                }
            })
            .catch((error) => {
                console.error("Error deleting product:", error);
                showNotification("An error occurred while deleting the product.", "error");
            });
    }
}

function toggleFeatured(productId, currentFeatured) {
    const newFeatured = currentFeatured ? 0 : 1;
    
    fetch(`/api/toggleFeatured.php?id=${productId}&featured=${newFeatured}`, {
        method: "POST",
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            if (data.success) {
                const action = newFeatured ? "featured" : "unfeatured";
                showNotification(`Product ${action} successfully!`, "success");
                getData(); // Refresh the table
            } else {
                showNotification("Failed to update featured status: " + data.error, "error");
            }
        })
        .catch((error) => {
            console.error("Error updating featured status:", error);
            showNotification("An error occurred while updating featured status.", "error");
        });
}

function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.admin-notification');
    existingNotifications.forEach(notif => notif.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `admin-notification fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;
    
    // Set colors based on type
    const colorClasses = {
        'success': 'bg-green-500 text-white',
        'error': 'bg-red-500 text-white',
        'warning': 'bg-yellow-500 text-white',
        'info': 'bg-blue-500 text-white'
    };
    
    notification.className += ` ${colorClasses[type] || colorClasses.info}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Slide in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 50);
    
    // Slide out and remove after 3 seconds
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }, 3000);
}

function getCategoryClass(category) {
    const categoryClasses = {
        'vegetable': 'category-vegetable',
        'fruits': 'category-fruits', 
        'meats': 'category-meats',
        'fish': 'category-fish',
        'seafood': 'category-seafood',
        'dairy': 'category-dairy'
    };
    return categoryClasses[category] || 'category-vegetable';
}

const tableBody = document.getElementById("product-list");

const getData = () => {
    const basePath = "/assets/";
    
    // Show loading state
    tableBody.innerHTML = `
        <tr id="loading-row">
            <td colspan="7">
                <div class="loading-spinner"></div>
            </td>
        </tr>
    `;
    
    fetch("/api/getProducts.php")
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            tableBody.innerHTML = "";
            
            // Update total products count
            const totalProductsElement = document.getElementById("total-products");
            if (totalProductsElement) {
                totalProductsElement.textContent = data.length;
            }
            
            if (data.length === 0) {
                // Show empty state
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4-8-4m16 0v10l-8 4-8-4V7"></path>
                                </svg>
                                <h3 class="text-lg font-semibold mb-2">No products found</h3>
                                <p class="text-gray-500">Start by adding your first product to the inventory.</p>
                            </div>
                        </td>
                    </tr>
                `;
                return;
            }
            
            data.forEach((product) => {
                const row = document.createElement("tr");
                const featuredStatus = product.featured ? 1 : 0;
                const featuredText = product.featured ? 'Featured' : 'Not Featured';
                const featuredClass = product.featured ? 'featured' : 'not-featured';
                const categoryClass = getCategoryClass(product.category);
                
                row.innerHTML = `
                    <td class="font-mono text-sm text-gray-600">#${product.id}</td>
                    <td>
                        <div class="font-semibold text-gray-900">${product.name}</div>
                    </td>
                    <td>
                        <span class="price-tag">৳${parseFloat(product.price).toFixed(2)}</span>
                    </td>
                    <td>
                        <span class="category-badge ${categoryClass}">
                            ${product.category}
                        </span>
                    </td>
                    <td>
                        <div class="flex justify-center">
                            <img src="${basePath}${product.image}" 
                                 alt="${product.name}" 
                                 class="product-image"
                                 onerror="this.src='/assets/images/placeholder.png'">
                        </div>
                    </td>
                    <td>
                        <button class="featured-btn ${featuredClass}" 
                                onclick="toggleFeatured(${product.id}, ${featuredStatus})"
                                title="Click to toggle featured status">
                            <svg class="w-3 h-3 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            ${featuredText}
                        </button>
                    </td>
                    <td>
                        <button class="delete-btn" 
                                onclick="deleteProduct(${product.id})"
                                title="Delete this product">
                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete
                        </button>
                    </td>
                `;
                
                row.classList.add("hover:bg-gray-50", "transition-colors", "duration-200");
                tableBody.appendChild(row);
            });
        })
        .catch((error) => {
            console.error("Error fetching products:", error);
            tableBody.innerHTML = `
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <h3 class="text-lg font-semibold mb-2 text-red-600">Error loading products</h3>
                            <p class="text-gray-500">Please try refreshing the page.</p>
                        </div>
                    </td>
                </tr>
            `;
        });
};

getData();
