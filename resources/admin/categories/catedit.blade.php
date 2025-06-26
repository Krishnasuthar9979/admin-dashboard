<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Category</h2>
        <form action="{{ route('admin.categories.update',$category->category_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category Description</label>
            <input type="text" name="description" value="{{ $category->description }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
        </div>
    </div>
</body>
</html> 