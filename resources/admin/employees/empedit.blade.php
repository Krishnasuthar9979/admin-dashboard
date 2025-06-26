<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Employees</h2>
        <form action="{{ route('admin.employees.update',$employee->e_id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" value="{{ $employee->e_name }}" name="e_name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Joining date</label>
            <input type="date" name="j_date" value="{{ $employee->j_date->format('Y-m-d') }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="e_email" value="{{ $employee->e_email }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="text" name="e_password" id="e_password" value="{{ $employee->e_password }}"  class="form-control"  required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact No</label>
            <input type="tel" name="e_contact" id="e_contact"  value="{{ $employee->e_contact }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Schedule</label>
            <input type="text" name="schedule"  value="{{ $employee->schedule }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Position/Role</label>
            <select class="form-select" name="role" required>
                <!-- <option value="">Select Position</option> -->
                <option value="Manager" {{ $employee->role == 'manager' ? 'selected' : '' }}>Manager</option>
                <option value="Sales" {{ $employee->role == 'sales' ? 'selected' : '' }}>Sales</option>
                <option value="Product Delivery" {{ $employee->role == 'Product Delivery' ? 'selected' : '' }}>Product Delivery</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
        </div>
    </div>
</body>
</html> 