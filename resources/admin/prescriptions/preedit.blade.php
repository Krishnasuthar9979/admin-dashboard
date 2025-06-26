<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Prescription</h2>
        <form action="{{ route('admin.prescriptions.update',$prescription->prescription_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">left_sphere</label>
            <input type="text" name="l_s" value="{{ $prescription->left_sphere }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">left_cylinder</label>
            <input type="text" name="l_c" value="{{ $prescription->left_cylinder }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">left_axis</label>
            <input type="text" name="l_a" value="{{ $prescription->left_axis }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">right_sphere</label>
            <input type="text" name="r_s" value="{{ $prescription->right_sphere }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">right_cylinder</label>
            <input type="text" name="r_c" value="{{ $prescription->right_cylinder }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">right_axis</label>
            <input type="text" name="r_a" value="{{ $prescription->right_axis }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update subcategory</button>
        </form>
        </div>
    </div>
</body>
</html> 