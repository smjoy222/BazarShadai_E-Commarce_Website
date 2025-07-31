@extends('index')
@push('style')
<title>Checkout - BazarShadai</title>
<script src="https://js.stripe.com/v3/"></script>
@endpush

@section('main-content')
<div class="container max-w-6xl mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Checkout</h1>
        <p class="text-gray-600 mt-2">Complete your order</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Order Summary -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
            
            <div class="space-y-4 mb-6">
                @foreach($cartItems as $item)
                <div class="flex items-center justify-between border-b pb-4">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('assets/images/placeholder.png') }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-lg">
                        <div>
                            <h3 class="font-medium">{{ $item->product->name }}</h3>
                            <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold">৳ {{ number_format($item->product->price * $item->quantity) }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="border-t pt-4 space-y-2">
                <div class="flex justify-between">
                    <span>Subtotal:</span>
                    <span>৳ {{ number_format($subtotal) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Delivery Fee:</span>
                    <span>৳ {{ number_format($deliveryFee) }}</span>
                </div>
                <div class="flex justify-between text-lg font-bold border-t pt-2">
                    <span>Total:</span>
                    <span class="text-green-600">৳ {{ number_format($total) }}</span>
                </div>
            </div>
        </div>

        <!-- Payment Form -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Payment Details</h2>
            
            <form id="payment-form">
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Card Information
                    </label>
                    <div id="card-element" class="p-3 border border-gray-300 rounded-lg">
                        <!-- Stripe Elements will create form elements here -->
                    </div>
                    <div id="card-errors" class="text-red-600 text-sm mt-2" role="alert"></div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Billing Information
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        <input type="email" id="email" name="email" placeholder="Email" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent md:col-span-2" required>
                        <input type="text" id="address" name="address" placeholder="Address" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent md:col-span-2" required>
                        <input type="text" id="city" name="city" placeholder="City" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        <input type="text" id="phone" name="phone" placeholder="Phone" class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                    </div>
                </div>

                <button type="submit" id="submit-button" class="w-full bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700 transition duration-300 font-medium disabled:opacity-50 disabled:cursor-not-allowed">
                    <span id="button-text">Pay ৳ {{ number_format($total) }}</span>
                    <span id="spinner" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div id="success-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Payment Successful!</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">Your order has been placed successfully!</p>
                <p class="text-sm font-medium text-gray-700 mt-2">Order Number: <span id="order-number" class="text-green-600"></span></p>
                <p class="text-sm text-gray-500 mt-2">You will receive a confirmation email shortly.</p>
            </div>
            <div class="items-center px-4 py-3 space-y-2">
                <a href="{{ route('user.orders') }}" class="block w-full px-4 py-2 bg-blue-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 text-center">
                    View My Orders
                </a>
                <button id="ok-button" class="px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300">
                    Continue Shopping
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Initialize Stripe
const stripe = Stripe('{{ $stripeKey }}');
const elements = stripe.elements();

// Custom styling
const style = {
    base: {
        color: '#424770',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#9e2146',
        iconColor: '#9e2146'
    }
};

// Create card element
const card = elements.create('card', {style: style});
card.mount('#card-element');

// Handle real-time validation errors from the card Element
card.on('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
        displayError.textContent = error.message;
    } else {
        displayError.textContent = '';
    }
});

// Handle form submission
const form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const submitButton = document.getElementById('submit-button');
    const buttonText = document.getElementById('button-text');
    const spinner = document.getElementById('spinner');

    // Disable submit button and show loading
    submitButton.disabled = true;
    buttonText.classList.add('hidden');
    spinner.classList.remove('hidden');

    try {
        // Create payment intent
        const response = await fetch('/create-payment-intent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });

        const {client_secret} = await response.json();

        // Confirm payment
        const {error, paymentIntent} = await stripe.confirmCardPayment(client_secret, {
            payment_method: {
                card: card,
                billing_details: {
                    name: 'Customer Name'
                }
            }
        });

        if (error) {
            // Show error to customer
            document.getElementById('card-errors').textContent = error.message;
        } else {
            // Payment succeeded - collect billing information
            const billingData = {
                payment_intent_id: paymentIntent.id,
                first_name: document.getElementById('first_name').value,
                last_name: document.getElementById('last_name').value,
                email: document.getElementById('email').value,
                address: document.getElementById('address').value,
                city: document.getElementById('city').value,
                phone: document.getElementById('phone').value
            };

            console.log('Sending billing data:', billingData);

            const processResponse = await fetch('/process-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(billingData)
            });

            console.log('Response status:', processResponse.status);
            console.log('Response headers:', processResponse.headers);
            
            const responseText = await processResponse.text();
            console.log('Raw response:', responseText);
            
            let result;
            try {
                result = JSON.parse(responseText);
            } catch (parseError) {
                console.error('JSON parse error:', parseError);
                console.error('Response was:', responseText);
                document.getElementById('card-errors').textContent = 'Server returned invalid response. Please try again.';
                return;
            }
            
            if (result.success) {
                // Update modal with order details
                console.log('Payment successful:', result);
                document.getElementById('order-number').textContent = result.order_number;
                document.getElementById('success-modal').classList.remove('hidden');
            } else {
                console.error('Payment failed:', result);
                document.getElementById('card-errors').textContent = result.message;
            }
        }
    } catch (error) {
        console.error('Payment error:', error);
        document.getElementById('card-errors').textContent = 'An unexpected error occurred: ' + error.message;
    }

    // Re-enable submit button
    submitButton.disabled = false;
    buttonText.classList.remove('hidden');
    spinner.classList.add('hidden');
});

// Handle success modal
document.getElementById('ok-button').addEventListener('click', function() {
    window.location.href = '{{ route("home") }}';
});
</script>
@endsection
