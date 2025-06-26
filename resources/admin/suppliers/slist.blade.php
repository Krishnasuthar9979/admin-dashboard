<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- suppliers Table -->

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier-> s_id }}</td>
                        <td>{{ $supplier-> s_name }}</td>
                        <td>{{ $supplier-> s_address }}</td>
                        <td>{{ $supplier-> s_contact}}</td>
                        <td>{{ $supplier-> s_email }}</td>
                        <td>{{ $supplier-> s_gstno }}</td>
                        <!-- <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil"> 
                                        <a href="/admin/suppliers/sedit/{{ $supplier->s_id }}" style="color:white;">
                                            edit
                                        </a>
                                    </i>
                                </button>
                                <form action="{{ route('admin.suppliers.destroy', $supplier->s_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this {{ $supplier->s_name }} supplier from list?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')                                     
                                    <button class="btn btn-sm btn-danger" type="submit">
                                     <i class="bi bi-trash"> Delete
                                        </i>
                                    </button>
                                </form> 
                                </button> 
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
