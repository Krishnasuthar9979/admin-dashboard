<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Supplier</h2>
        <form action="{{ route('admin.suppliers.update',$supplier->s_id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" value="{{ $supplier->s_name }}" name="s_name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="s_address" value="{{ $supplier->s_address}}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact No</label>
            <input type="tel" name="s_contact" id="s_contact"  value="{{ $supplier->s_contact }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="s_email" value="{{ $supplier->s_email }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gst_No</label>
            <input type="text" name="s_gstno"  value="{{ $supplier->s_gstno }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Supplier</button>
        </form>
        </div>
    </div>
</body>
</html> 