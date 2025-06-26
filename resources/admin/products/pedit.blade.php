<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="container mt-5">
        <div class="container py-4">
            <h2> Edit Product</h2>
            <form action="{{ route('admin.products.update',$product->p_id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="p_name" value="{{ $product->p_name }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Size</label>
                    <input type="text" name="size" value="{{ $product->size }}" class="form-control" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Color</label>
                    <select id="color" class="form-control" name="color" required>
                        @foreach ($colors as $color => $label)
                        <option value="{{ $color }}" {{  $product->color==$color ? 'selected' : '' }}> {{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="text" name="qty" value="{{ $product->qty }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="p_img">Image</label>
                    @if($product->p_img)
                    <img src="{{asset('storage/products/'.$product->p_img ) }}" alt="{{ $product->p_name }}" width="50" height="50"> <br>
                    <small>Current file: {{ $product->p_img }}</small><br>
                    <input type="file" value="{{ $product->p_img }}" name="p_img" class="form-control">
                    @endif
                    <!-- Hidden input to keep the old image if no new image is uploaded -->
                    <input type="hidden" name="old_p_img" value="{{ $product->p_img }}">
                    <br>
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" {{ $category->category_id==$product->category_id ? 'selected' : '' }}> {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subcategory Name</label>
                        <select name="subcategory_id" class="form-control">
                            <option value="">Select Subcategory</option>
                            @foreach($subcategories as $sub_category)
                            <option value="{{ $sub_category->subcategory_id }}" {{$sub_category->subcategory_id==$product->subcategory_id ?'selected':'' }}> {{ $sub_category->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select brand:</label>
                        <select name="brand_id" class="form-control">
                            <option value="">NULL</option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->brand_id }}" {{ $brand->brand_id==$product->brand_id ? 'selected' : '' }}> {{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select frame:</label>
                        <select name="frame_id" class="form-control">
                            <option value="NULL">NULL</option>
                            @foreach($frames as $frame)
                            <option value="{{ $frame->frame_id }}" {{ $frame->frame_id == $product->frame_id ? 'selected' : '' }}> {{ $frame->frame_type}} || {{ $frame->frame_material }} || {{ $frame->frame_shape }} || {{ $frame->height }} || {{ $frame->model_no }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Prescription:</label>
                        <select name="prescription_id" class="form-control">
                            <option value="0">NULL</option>
                            @foreach($prescriptions as $prescription)
                            <option value="{{ $prescription->prescription_id }}" {{ $prescription->prescription_id == $product->prescription_id ? 'selected' : '' }}>{{ $prescription->prescription_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update product</button>
            </form>
        </div>
    </div>
</body>
</html>