<div id="productsForm" class="card mb-4" style="display: none;">
    <div class="card-header">
        <h5 class="card-title mb-0">Add Product</h5>
    </div>
    <div class="card-body">
        <form id="productsForm" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="p_name" id="product_name" onkeyup="checkPrescriptionRequirement()" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" step="0.01" required>
                </div>
                <!-- <div class="col-md-6 mb-3">
                    <label class="form-label">Size</label>
                    <input type="number" class="form-control" name="size" step="0.01" required>
                </div> -->
                <div class="col-md-6 mb-3">
                    <label for="color" class="form-label">Product Color</label>
                    <select id="color" class="form-control" name="color" required>
                        <option value="">Select Color</option>
                        @foreach ($colors as $color => $label)
                        <option value="{{ $color }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="quantity" class="form-label">Stock/Quantity</label>
                    <input type="number" class="form-control" name="qty" required>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="p_img" placeholder="p_img" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Select Category of product</label>
                        <select name="category_id" class="form-control" required>
                            <option value="0">NULL</option>
                            @foreach($categories as $category)
                            <option value="{{$category->category_id}}"> {{$category->category_name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-12 mb-3">
                <label class="form-label">Select subategory of product:</label>
                    <select name="subcategory_id" class="form-control" required>
                    <option value="0">NULL</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->subcategory_id}}">{{$subcategory->subcategory_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mb-3">
                <label class="form-label">Select brand:</label>
                    <select name="brand_id" class="form-control">
                    <option value="0">NULL</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mb-3">
                <label  class="form-label">Select frame:</label>
                    <select name="frame_id" class="form-control">
                    <option value="0">NULL</option>
                        @foreach($frames as $frame)
                            <option value="{{$frame->frame_id}}">{{$frame->frame_type}}   ||   {{$frame->frame_material}}   ||    {{$frame->frame_shape}}   ||   {{$frame->height}}   ||    {{$frame->model_no}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 mb-3">
                    <label  class="form-label">Select Prescription/Details:</label>
                        <select name="prescription_id" id="prescription_id" class="form-control">
                        <option value="0">NULL</option>
                            <!-- @foreach($prescriptions as $prescription)
                                <option value="{{$prescription->prescription_id}}">{{$prescription->prescription_id}}</option>
                            @endforeach -->
                            <option value="">No Prescription</option>
                            <option value="1">Single Vision</option>
                            <option value="2">Bifocal</option>
                            <option value="3">Progressive</option>
                            <option value="4">Reading Glasses</option>
                        </select>
                        <span id="prescription_error" style="color: red; display: none;">Prescription is required for Eyeglass or Prescription Glass</span>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-secondary me-2"
                    onclick="hideForm('products')">Cancel</button>
                <button type="submit" class="btn btn-primary">Save/Add Product</button>
            </div>
        </form>
    </div>
</div>
<script>
function checkPrescriptionRequirement() {
    let productName = document.getElementById('product_name').value.toLowerCase();
    let prescriptionField = document.getElementById('prescription_id');
    let prescriptionError = document.getElementById('prescription_error');

    if (productName.includes('eyeglass') || productName.includes('prescription glass')) {
        prescriptionField.setAttribute('required', 'required');
        prescriptionError.style.display = 'block';
    } else {
        prescriptionField.removeAttribute('required');
        prescriptionError.style.display = 'none';
    }
}
</script>