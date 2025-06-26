<html>
<head><title>Brands Management</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="brandsForm" class="card mb-4" style="display: none;">
        <div class="card-header">
            <h5 class="card-title mb-0">Add Brands</h5>
        </div>
        <div class="card-body">
            <form id="brandsForm" action="{{ route('admin.brands.store') }}" method="post"> 
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('brands')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add New Brand</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>