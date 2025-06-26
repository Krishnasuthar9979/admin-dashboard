<html>
<head><title>Frames Management</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="framesForm" class="card mb-4" style="display: none;">
        <div class="card-header">
            <h5 class="card-title mb-0">Add Frames</h5>
        </div>
        <div class="card-body">
            <form id="framesForm" action="{{ route('admin.frames.store') }}" method="post"> 
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Frame Type</label>
                        <input type="text" name="frame_type" placeholder="for example, mens or womens or kids" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Frame Material</label>
                        <input type="text" name="frame_material" placeholder="for example, metal" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Frame Shape</label>
                        <input type="text" name="frame_shape" placeholder="for example, rounded or rectangle" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Frame temple_colour</label>
                        <input type="text" name="temple_colour" placeholder="for example, Black" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Frame Model_No</label>
                        <input type="text" name="model_no" placeholder="for example, TH-7026" class="form-control" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('frames')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add New Frame</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>