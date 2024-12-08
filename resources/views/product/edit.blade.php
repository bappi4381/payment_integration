<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- PUT method to indicate an update -->

            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" id="description">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="max-width: 100px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
