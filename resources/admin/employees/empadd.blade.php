<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div id="employeesForm" class="card mb-4" style="display: none;">
        <div class="card-header">
            <h5 class="card-title mb-0">Registration of employee</h5>
        </div>
        <div class="card-body">
            @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                Enter valid data: {{$error}}
            </div>
            @endforeach
            @endif
            <form id="employeeForm" action="{{ route('admin.employees.store') }}" onsubmit="handleSubmit(event, 'employees')" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="e_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Joining Date</label>
                        <input type="date" class="form-control" name="j_date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="e_email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="e_password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact No</label>
                        <input type="tel" class="form-control" name="e_contact" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Schedule</label>
                        <input type="text" class="form-control" name="schedule" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Position/Role</label>
                        <select class="form-select" name="role" required>
                            <option value="">Select Position</option>
                            <option value="manager">Manager</option>
                            <!-- <option value="sales">Sales Representative</option> -->
                            <option value="optician">Optician</option>
                            <option value="Delivery">Product Delivery</option>
                        </select>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('employees')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save or Add Employee</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>