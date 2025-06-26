<div class="container-fluid" style="justify-content: center; align-items: center; text-align: center;">
    <h2 class="mb-4">Low Stock Products</h2>
    <div style="justify-content: center; align-items: center; text-align: center;">
    <p style="color:blue;">Products with low stock (less than or equal to 2 units).</p>
    <p style="color:green;">Click on the edit button to edit the product details.</p>
    @if(count($lowStockProducts) > 0)
    <div class="table-responsive" style="justify-content: center; align-items: center; text-align: center;">
        <table class="table table-bordered table-hover" style="justify-content: center;">
            <thead class="table-danger">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity Left</th>
                    <th>Price</th>
                    <th>Category</th> <!-- Optional -->
                    <th>Action</th> <!-- Optional: Edit, Order, etc. -->
                </tr>
            </thead>
            <tbody>
                @foreach($lowStockProducts as $product)
                <tr>
                    <td>
                    <img src="{{ url('storage/products/')}}/{{ $product->p_img}}" alt="{{ $product->p_name }}" width="90" height="90">
                    </td>
                    <td>{{ $product->p_name }}</td>
                    <td>
                        @if($product->qty <= 2)
                            <span class="badge bg-danger">{{ $product->qty }}</span>
                        @else
                            <span class=" bg-warning text-dark">{{ $product->qty }}</span>
                        @endif
                    </td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td>{{ optional($product->category)->category_name ?? 'N/A' }}</td> <!-- Optional, if relation exists -->
                    <td>
                        <a href="{{ route('admin.products.edit', $product->p_id) }}" class="btn btn-primary btn-sm">Edit</a>
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
        <div class="alert alert-success" style="justify-content: center; align-items: center; text-align: center;">
            🟢 No low stock products currently!
        </div>
    @endif
    </div>
     <div class="d-flex justify-content-center mt-6 mb-4 " style="justify-content: center; align-items: center; text-align: center;">
     {{ $lowStockProducts->links('pagination::bootstrap-5') }}
     </div>
    <div class="d-flex justify-content-center mt-4 mb-4" style="justify-content: center; align-items: center; text-align: center;">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
