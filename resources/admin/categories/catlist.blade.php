<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- categories Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-left: 4px;">
                                <button class="btn btn-sm btn-primary me-1"  onclick="window.location.href='/admin/categories/catedit/{{$category->category_id}}'" title="Edit">
                                    <i class="bi bi-pencil">                                     
                                    </i>
                                </button>
                            </div>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-right: 4px;">
                                <form action="{{ route('admin.categories.destroy', $category->category_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this {{ $category->category_name }} from the list?');" style="display:inline;">
                                @csrf
                                @method('DELETE')   
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i class="bi bi-trash">
                                        </i>
                                    </button>
                                </form>
                            </div>
                            </td>
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