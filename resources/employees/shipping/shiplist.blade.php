<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Employee Name</th>
                            <th>Product Name(from order details)</th>
                            <th>Shipp Address</th>
                            <th>city</th>
                            <th>Area</th>
                            <th>Pincode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shipping as $ship)
                        <tr>
                            <td>{{ $ship->ship_id }}</td>
                            <td>{{ $ship->employee->e_name }}</td>
                            <td>
                            @foreach ($orderdetails as $order_detail)
                                    @if ($order_detail->p_id)
                                        {{ $order_detail->product->p_name }}
                                    @else
                                         NULL 
                                @endif
                            @endforeach
                            </td>
                            <td>{{ $ship->ship_address }}</td>
                            <td>{{ $ship->city }}</td>  
                            <td>{{ $ship->area }}</td>
                            <td>{{ $ship->pincode }}</td>                  
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