
<html >
<head><title>Prescription Management</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="prescriptionsForm" class="card mb-4" style="display: none;"> 
        <div class="card-header">
            <h5 class="card-title mb-0">Add Prescription</h5>
        </div>
        <div class="card-body">
            <form id="prescriptionsForm" action="{{ route('admin.prescriptions.store') }}" method="post"> 
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Left_sphere</label>
                        <input type="text" name="l_s" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Left_cylinder</label>
                        <input type="text" name="l_c" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Left_axis</label>
                        <input type="text" name="l_a" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Right_sphere</label>
                        <input type="text" name="r_s" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Right_cylinder</label>
                        <input type="text" name="r_c" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Right_axis</label>
                        <input type="text" name="r_a" class="form-control" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('prescriptions')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add New Prescription</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


