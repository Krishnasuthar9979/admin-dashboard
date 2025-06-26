<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit SubCategory</h2>
        <form action="{{ route('admin.subcategories.update',$sub_category->subcategory_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Subcategory Name</label>
            <input type="text" name="subcate_name" value="{{ $sub_category->subcategory_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">category Name</label>
            <select name="cate_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->category_id }}" {{ $category->category_id == $sub_category->category_id ? 'selected' : '' }}> {{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" value="{{ $sub_category->description }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update subcategory</button>
        </form>
        </div>
    </div>
</body>
</html> 