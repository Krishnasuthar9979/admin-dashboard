<div class="container-fluid">
    <h2 class="mb-4" style="text-align: center;">Out of Stock Products</h2>
    <div style="justify-content: center; align-items: center; text-align: center;">
    <p style="color:blue;">Products with low stock (less than or equal to 2 units).</p>
    <p style="color:green;">Click on the edit button to edit the product details.</p>
    @if(count($outOfStockProducts) > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-danger">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Stock/Quantity</th>
                    <th>Category</th> <!-- Optional -->
                    <th>Action</th> <!-- Edit, Restock -->
                </tr>
            </thead>
            <tbody>
                @foreach($outOfStockProducts as $product)
                <tr>
                    <td>
                    <img src="{{ url('storage/products/')}}/{{ $product->p_img}}" alt="{{ $product->p_name }}" width="90" height="90">
                    </td>
                    <td>{{ $product->p_name }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ optional($product->category)->category_name ?? 'N/A' }}</td> <!-- Agar relation hai to -->
                    <td>
                        <a href="{{ route('admin.products.edit', $product->p_id) }}" class="btn btn-sm btn-primary">Edit/Restock</a>
                        <form action="{{ route('admin.products.destroy', $product->p_id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-success">
            🟢 All products are in stock!
        </div>
    @endif  
    <div class="d-flex justify-content-center mt-6 mb-4 " style="justify-content: center; align-items: center; text-align: center;">
     {{ $outOfStockProducts->links('pagination::bootstrap-5') }}
     </div>
    <div class="d-flex justify-content-center mt-4 mb-4" style="justify-content: center; align-items: center; text-align: center;">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
    </div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</div>
