<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Brand</h2>
        <form action="{{ route('admin.brands.update',$brand->brand_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Brand Name</label>
            <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Brand</button>
        </form>
        </div>
    </div>
</body>
</html> 