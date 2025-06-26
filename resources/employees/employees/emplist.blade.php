<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- employees Table -->

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Joining Date</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone No</th>
                        <th>Schedule</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->e_id }}</td>
                        <td>{{ $employee->e_name }}</td>
                        <td>{{ $employee->j_date }}</td>
                        <td>{{ $employee->e_email }}</td>
                        <td>{{ $employee->e_password }}</td>
                        <td>{{ $employee-> e_contact}}</td>
                        <td>{{ $employee-> schedule }}</td>
                        <td>{{ $employee-> role }}</td>
                        <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil"> 
                                        <a href="admin/employees/empedit/{{ $employee->e_id }}" style="color:white;">
                                            edit
                                        </a>
                                    </i>
                                </button>
                                <form action="{{ route('admin.employees.destroy', $employee->e_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this {{ $employee->e_name }} employee from list?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')                                     
                                    <button class="btn btn-sm btn-danger" type="submit">
                                     <i class="bi bi-trash"> Delete
                                        </i>
                                    </button>
                                </form> 
                                </button> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
