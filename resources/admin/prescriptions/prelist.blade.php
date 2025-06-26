<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prescription Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- prescriptions Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer name</th>
                            <th>left_sphere</th>
                            <th>left_cylinder</th>
                            <th>left_axis</th>
                            <th>right_sphere</th>
                            <th>right_cylinder</th>
                            <th>right_axis</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prescriptions as $prescription)
                        <tr>
                            <td>{{ $prescription->prescription_id }}</td>
                            @if($prescription->c_id)
                            <td>{{ $prescription->customer->c_name }}</td>
                            @else
                            <td> NULL </td>
                            @endif
                            <td>{{ $prescription->left_sphere }}</td>
                            <td>{{ $prescription->left_cylinder }}</td>
                            <td>{{ $prescription->left_axis }}</td>
                            <td>{{ $prescription->right_sphere }}</td>
                            <td>{{ $prescription->right_cylinder }}</td>
                            <td>{{ $prescription->right_axis }}</td>
                            <!-- <td>
                                <button class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil">
                                        <a href="/admin/prescriptions/preedit/{{$prescription->prescription_id}}" style="color:white;">
                                            edit
                                        </a>
                                    </i>
                                </button>
                                <form action="{{ route('admin.prescriptions.destroy', $prescription->prescription_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this prescription from the list?');" style="display:inline;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>