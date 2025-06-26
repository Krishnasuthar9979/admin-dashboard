<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Frames</h2>
        <form action="{{ route('admin.frames.update',$frame->frame_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Frame Type</label>
            <input type="text" name="frame_type" value="{{ $frame-> frame_type}}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Frame Material</label>
            <input type="text" name="frame_material" value="{{ $frame-> frame_material}}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Frame Shape</label>
            <input type="text" name="frame_shape" value="{{ $frame-> frame_shape}}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Frame temple_colour</label>
            <input type="text" name="temple_colour" value="{{ $frame-> temple_colour}}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Frame Model_No</label>
            <input type="text" name="model_no" value="{{ $frame-> model_no}}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Frame</button>
        </form>
        </div>
    </div>
</body>
</html> 