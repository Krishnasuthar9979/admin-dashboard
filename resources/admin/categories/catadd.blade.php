<html>
<head><title>Categories Management</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="categoriesForm" class="card mb-4" style="display: none;">
        <div class="card-header">
            <h5 class="card-title mb-0">Add Categories</h5>
        </div>
        <div class="card-body">
            <form id="categoriesForm" action="{{ route('admin.categories.store') }}" method="post"> 
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Category Name</label>
                        <input type="text" name="category_name" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('categories')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add New Category</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>