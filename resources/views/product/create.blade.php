<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }
        .error-list {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Create Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Product</button>
            </div>
        </form>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Product List</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
