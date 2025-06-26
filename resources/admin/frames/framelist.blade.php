<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frames Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- frames Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>frame_type</th>
                            <th>frame_material</th>
                            <th>frame_shape</th>
                            <th>temple_colour</th>
                            <th>model_no</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($frames as $frame)
                        <tr>
                            <td>{{ $frame->frame_id }}</td>
                            <td>{{ $frame->frame_type }}</td>
                            <td>{{ $frame->frame_material }}</td>
                            <td>{{ $frame->frame_shape }}</td>
                            <td>{{ $frame->temple_colour}}</td>
                            <td>{{ $frame->model_no }}</td>
                            <td>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-left: 4px;">
                                <button class="btn btn-sm btn-primary me-1"  onclick="window.location.href='/admin/frames/frameedit/{{$frame->frame_id}}'" title="Edit">
                                    <i class="bi bi-pencil">
                                    </i>
                                </button>
                            </div>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-right: 4px;">
                               <form action="{{ route('admin.frames.destroy', $frame->frame_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the {{ $frame->frame_type }} frame from the list?');" style="display:inline;">
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
