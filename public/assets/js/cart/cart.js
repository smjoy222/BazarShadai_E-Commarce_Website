/**
 * Cart Management JavaScript
 * Handles all cart-related functionality including add to cart, update quantity, remove items, and UI updates
 */

class CartManager {
    constructor() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        this.cartBadge = document.querySelector('.cart-badge');
        this.routes = this.getRoutes();
        this.init();
    }

    getRoutes() {
        // Get Laravel routes from global variables set in blade templates
        return {
            add: window.cartRoutes?.add || '/cart/add',
            update: window.cartRoutes?.update || '/cart/update', 
            remove: window.cartRoutes?.remove || '/cart/remove',
            count: window.cartRoutes?.count || '/cart/count'
        };
    }

    init() {
        this.bindEventListeners();
        this.initializeCartCount();
    }

    bindEventListeners() {
        // Bind add to cart buttons
        this.bindAddToCartButtons();
        
        // Bind cart page quantity controls
        this.bindQuantityControls();
        
        // Bind remove item buttons
        this.bindRemoveButtons();
    }

    bindAddToCartButtons() {
        // Handle both .add-to-cart-btn (featured products) and .btn-add-cart (category products)
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn:not([data-cart-bound]), .btn-add-cart:not([data-cart-bound])');
        
        addToCartButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleAddToCart(button);
            });
            // Mark button as having event listener bound
            button.setAttribute('data-cart-bound', 'true');
        });
    }

    bindQuantityControls() {
        const quantityButtons = document.querySelectorAll('.quantity-btn:not([data-cart-bound])');
        
        quantityButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleQuantityChange(button);
            });
            // Mark button as having event listener bound
            button.setAttribute('data-cart-bound', 'true');
        });
    }

    bindRemoveButtons() {
        const removeButtons = document.querySelectorAll('.remove-btn:not([data-cart-bound])');
        
        removeButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleRemoveItem(button);
            });
            // Mark button as having event listener bound
            button.setAttribute('data-cart-bound', 'true');
        });
    }

    async handleAddToCart(button) {
        const productId = button.getAttribute('data-product-id');
        const productPrice = button.getAttribute('data-price') || button.getAttribute('data-product-price');
        
        if (!productId || !productPrice) {
            this.showMessage('Invalid product data', 'error');
            return;
        }

        // Disable button during request
        button.disabled = true;
        const originalText = button.textContent;
        button.textContent = 'ADDING...';

        try {
            const response = await this.makeRequest(this.routes.add, {
                product_id: productId,
                price: productPrice,
                quantity: 1
            });

            const data = await response.json();

            if (data.success) {
                this.updateCartCount(data.cart_count);
                this.showMessage(data.message, 'success');
            } else {
                if (data.redirect) {
                    this.showMessage(data.message, 'warning');
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 1500);
                } else {
                    this.showMessage(data.message || 'Failed to add to cart', 'error');
                }
            }
        } catch (error) {
            console.error('Error:', error);
            this.showMessage('An error occurred. Please try again.', 'error');
        } finally {
            // Reset button
            button.textContent = originalText;
            button.disabled = false;
        }
    }

    async handleQuantityChange(button) {
        const action = button.getAttribute('data-action');
        const cartId = button.getAttribute('data-cart-id');
        const quantityElement = document.querySelector(`.quantity-display[data-cart-id="${cartId}"]`);
        
        if (!quantityElement) return;

        let currentQuantity = parseInt(quantityElement.textContent);
        
        if (action === 'increase') {
            currentQuantity++;
        } else if (action === 'decrease' && currentQuantity > 1) {
            currentQuantity--;
        } else {
            return; // Don't allow quantity below 1
        }

        try {
            const response = await this.makeRequest(this.routes.update, {
                cart_id: cartId,
                quantity: currentQuantity
            });

            const data = await response.json();

            if (data.success) {
                // Update quantity display
                quantityElement.textContent = currentQuantity;
                
                // Update item total
                const itemTotalElement = document.querySelector(`.item-total[data-cart-id="${cartId}"]`);
                if (itemTotalElement) {
                    itemTotalElement.textContent = `৳ ${data.item_total.toLocaleString()}`;
                }
                
                // Update cart totals
                this.updateCartTotals(data.total);
                
                // Update navbar cart count
                this.updateCartCount(data.cart_count);
            } else {
                this.showMessage('Failed to update quantity', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            this.showMessage('Failed to update cart. Please try again.', 'error');
        }
    }

    async handleRemoveItem(button) {
        const cartId = button.getAttribute('data-cart-id');
        
        if (!confirm('Are you sure you want to remove this item from your cart?')) {
            return;
        }

        try {
            const response = await this.makeRequest(this.routes.remove, {
                cart_id: cartId
            });

            const data = await response.json();

            if (data.success) {
                // Remove item from DOM
                const cartItem = document.querySelector(`.cart-item[data-cart-id="${cartId}"]`);
                if (cartItem) {
                    cartItem.remove();
                }
                
                // Update cart totals
                this.updateCartTotals(data.total);
                
                // Update navbar cart count
                this.updateCartCount(data.cart_count);
                
                // Check if cart is empty and reload page if necessary
                if (data.cart_count === 0) {
                    location.reload();
                }
            } else {
                this.showMessage('Failed to remove item', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            this.showMessage('Failed to remove item. Please try again.', 'error');
        }
    }

    async makeRequest(url, data) {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': this.csrfToken
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        return response;
    }

    updateCartCount(count) {
        if (this.cartBadge) {
            this.cartBadge.textContent = count || 0;
        }
    }

    updateCartTotals(total) {
        const deliveryFee = 50;
        
        // Update subtotal
        const subtotalElement = document.querySelector('.cart-subtotal');
        if (subtotalElement) {
            subtotalElement.textContent = `৳ ${total.toLocaleString()}`;
        }
        
        // Update total (including delivery fee)
        const totalElement = document.querySelector('.cart-total');
        if (totalElement) {
            totalElement.textContent = `৳ ${(total + deliveryFee).toLocaleString()}`;
        }
    }

    showMessage(message, type = 'info') {
        // Remove existing messages
        const existingMessages = document.querySelectorAll('.cart-message');
        existingMessages.forEach(msg => msg.remove());

        // Create message element
        const messageEl = document.createElement('div');
        messageEl.className = `cart-message fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all duration-300`;
        
        // Set colors based on type
        const colorClasses = {
            'success': 'bg-green-500 text-white',
            'error': 'bg-red-500 text-white',
            'warning': 'bg-yellow-500 text-white',
            'info': 'bg-blue-500 text-white'
        };
        
        messageEl.className += ` ${colorClasses[type] || colorClasses.info}`;
        messageEl.textContent = message;
        
        // Set initial position (off-screen to the right)
        messageEl.style.transform = 'translateX(calc(100% + 20px))';
        messageEl.style.opacity = '0';
        
        document.body.appendChild(messageEl);
        
        // Slide in animation
        setTimeout(() => {
            messageEl.style.transform = 'translateX(0)';
            messageEl.style.opacity = '1';
        }, 50);
        
        // Slide out and remove after 3 seconds
        setTimeout(() => {
            messageEl.style.transform = 'translateX(calc(100% + 20px))';
            messageEl.style.opacity = '0';
            setTimeout(() => {
                if (messageEl.parentNode) {
                    messageEl.parentNode.removeChild(messageEl);
                }
            }, 300);
        }, 3000);
    }

    async initializeCartCount() {
        try {
            const response = await fetch(this.routes.count);
            const data = await response.json();
            this.updateCartCount(data.cart_count);
        } catch (error) {
            console.log('Could not fetch cart count:', error);
            this.updateCartCount(0);
        }
    }

    // Method to reinitialize cart when new products are loaded dynamically
    reinitialize() {
        this.bindEventListeners();
    }

    // Static method to create global instance
    static createGlobalInstance() {
        if (!window.cartManager) {
            window.cartManager = new CartManager();
        }
        return window.cartManager;
    }
}

// Initialize cart manager when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    CartManager.createGlobalInstance();
});

// Export for use in other modules if needed
if (typeof module !== 'undefined' && module.exports) {
    module.exports = CartManager;
}
