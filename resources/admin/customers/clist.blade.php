<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- customers Table -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <!-- <th>Password</th> -->
                            <th>Gender</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->c_id }}</td>
                            <td>{{ $customer->c_name }}</td>
                            <td>{{ $customer->c_email }}</td>
                            <!-- <td>{{ $customer->c_password }}</td> -->
                            <td>{{ $customer-> c_gender}}</td>
                            <td>{{ $customer-> c_mobileno }}</td>
                            <td>{{ $customer-> c_address }}</td>
                            <!-- <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil">
                                        <a href="/admin/customers/cedit/{{ $customer->c_id }}" style="color:white;">
                                            edit
                                        </a>
                                    </i>
                                </button>
                                <form action="{{ route('admin.customers.destroy', $customer->c_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this {{ $customer->c_name }} customer from list?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i class="bi bi-trash"> Delete
                                        </i>
                                    </button>
                                </form>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>