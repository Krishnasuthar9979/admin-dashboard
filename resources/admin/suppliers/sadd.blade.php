<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="suppliersForm" class="card mb-4" style="display: none;">
        <div class="card-header">
            <h5 class="card-title mb-0">Add Supplier</h5>
        </div>
        <div class="card-body">
            <form id="supplierForm" action="{{ route('admin.suppliers.store') }}" onsubmit="handleSubmit(event, 'suppliers')">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="s_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="s_address" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact No</label>
                        <input type="tel" class="form-control" name="s_contact" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="s_email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gst_No</label>
                        <input type="text" class="form-control" name="s_gstno" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('suppliers')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Supplier</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
