<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderdetails Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- subcategories Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderdetails as $orderDetails)
                        <tr>
                            <td>{{ $orderDetails->od_id }}</td>
                            <td>{{ $orderDetails->order->o_id }}</td>
                            <td>{{ $orderDetails->product->p_name}}</td>        
                            <td>{{ $orderDetails->price}}</td>
                            <td>{{ $orderDetails->qty }}</td>
                            <td>
                                <!-- <button class="btn btn-sm btn-primary me-1">
                                    <i class="bi bi-pencil">
                                        <a href="/admin/orders/oedit/{{$orderDetails->od_id}}" style="color:white;">
                                            edit
                                        </a>
                                    </i>
                                </button> -->
                                <form action="{{ route('admin.orderdetails.destroy', $orderDetails->od_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this orderdetails from the list?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        <i class="bi bi-trash"> Delete
                                        </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>                
