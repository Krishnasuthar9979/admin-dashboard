
<html >
<head><title>Subcategories Management</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="subcategoriesForm" class="card mb-4" style="display: none;"> 
        <div class="card-header">
            <h5 class="card-title mb-0">Add Subcategories</h5>
        </div>
        <div class="card-body">
            <form id="subcategoriesForm" action="{{ route('admin.subcategories.store') }}" method="post"> 
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Subcategory Name</label>
                        <input type="text" name="subcate_name" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Category Name</label>
                        <select name="category_id" class="form-control" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->category_id }}"> {{ $category->category_name }}</option>
                            @endforeach
                        </select>
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
                        onclick="hideForm('subcategories')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add New Subcategory</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


