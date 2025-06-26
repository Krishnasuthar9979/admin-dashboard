<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="offersForm" class="card mb-4" style="display: none;">
        <div class="card-header">
            <h5 class="card-title mb-0">Add Offer</h5>
        </div>
        <div class="card-body">
            <form id="offersForm"  action="{{ route('admin.offers.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Discount</label>
                        <input type="text" name="discount_percentage" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>  
                        </select>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('offers')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add Offer</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>