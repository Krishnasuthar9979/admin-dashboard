<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Customers</h2>
        <form action="{{ route('admin.customers.update',$customer->c_id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" value="{{ $customer->c_name }}" name="c_name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="c_email" value="{{ $customer->c_email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="c_password" value="{{ $customer->c_password }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <input type="text" name="c_gender" value="{{ $customer->c_gender }}"  class="form-control"  required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact No</label>
            <input type="tel" name="c_mobileno"  value="{{ $customer->c_mobileno }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="c_address"  value="{{ $customer->c_address }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Customer</button>
        </form>
        </div>
    </div>
</body>
</html> 