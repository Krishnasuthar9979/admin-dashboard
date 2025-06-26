<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- products Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Subcategory Name</th>
                            <th>Brand Name</th>
                            <th>Frame type</th>
                            <th>Prescription id</th>                          
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->p_id }}</td>
                            <td>{{ $product->p_name }} </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->color }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>
                                @if($product->p_img)
                                 <img src="{{ url('storage/products/')}}/{{ $product->p_img}}" alt="{{ $product->p_name }}" width="90" height="90">
                                @else
                                <td>No image</td>
                                @endif
                            </td>
                            @if($product->category_id)
                            <td>{{ $product->category->category_name}}</td>
                            @else
                                <td>NULL</td>
                            @endif
                            @if($product->subcategory_id)
                            <td>{{ $product->subcategory->subcategory_name }}</td>
                            @else
                                <td>NULL</td>   
                            @endif
                            @if($product->brand_id)
                            <td>{{ $product->brand->brand_name }}</td>
                            @else
                               <td> NULL </td>
                            @endif

                            @if($product->frame_id)
                            <td>{{ $product->frame->frame_type }} {{$product->frame->frame_shape}}</td>
                            @else
                                <td>NULL</td>
                            @endif

                            @if($product->prescription_id)
                            <td>{{ $product->prescription_id }}</td>
                            @else
                                <td>NULL</td>
                            @endif

                            <td>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-left:4px;">
                                <button class="btn btn-sm btn-primary me-1"  onclick="window.location.href='/admin/products/pedit/{{$product->p_id}}'" title="Edit">
                                        <i class="bi bi-pencil">
                                        </i>
                                </button>
                            </div>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-right:4px;">
                            <form action="{{ route('admin.products.destroy', $product->p_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product {{  $product->p_name }} from the list?');" style="display:inline;">
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