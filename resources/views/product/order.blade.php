<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Order {{ $product->name }}</h1>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Step 1: Product Information and Quantity Selection -->
        <div class="mb-3">
            <h4>Product Information</h4>
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Price:</strong> tk.{{ $product->price }}</p>
            <p><strong>Available Quantity:</strong> {{ $product->quantity }}</p>

            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->quantity }}" class="form-control" required>
        </div>

        <!-- Step 2: Order Summary -->
        <div class="mb-3">
            <h4>Order Summary</h4>
            <p><strong>Total Price:</strong> tk.<span id="total-price">{{ $product->price }}</span></p>
        </div>

        <!-- Step 3: Consumer Information -->
        <div class="mb-3">
            <h4>Consumer Information</h4>
            <label for="name" class="form-label">Full Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>

            <label for="address" class="form-label">Shipping Address:</label>
            <input type="text" name="address" id="address" class="form-control" required>

            <label for="email" class="form-label">Email Address:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <!-- Step 4: Payment Information -->
        <div class="mb-3">
            <h4>Payment Information</h4>
            <label for="payment-method" class="form-label">Payment Method:</label>
            <select name="payment_method" id="payment-method" class="form-select" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
            </select>

            <label for="payment_details" class="form-label mt-2">Payment Details:</label>
            <input type="text" name="payment_details" id="payment_details" class="form-control" required>
        </div>

        <!-- Place Order Button -->
        <form action="{{ route('order.store', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>

        <!-- Back to Product List Link -->
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Dynamically update the total price when the quantity changes
        document.getElementById('quantity').addEventListener('input', function() {
            var quantity = parseInt(this.value);
            var pricePerUnit = {{ $product->price }};
            var totalPrice = quantity * pricePerUnit;

            document.getElementById('total-price').textContent = totalPrice.toFixed(2);
        });
    </script>
</body>
</html>
