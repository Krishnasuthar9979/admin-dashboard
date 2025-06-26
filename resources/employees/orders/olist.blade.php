<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Management</title>
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
                            <th>Order_ID</th>
                            <th>Order Date</th>
                            <th>Order Amount</th>
                            <th>Customer name</th>
                            <th>Customer Prescription</th>
                            <th>Status</th>
                            <th>CreatedAt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->o_id }}</td>
                            <td>{{ $order->o_date }} </td>
                            <td>{{ $order->o_amt }}</td>
                            <td>{{ $order->customer->c_name }}</td>
                            <td>{{ $order->prescription_id }}</td>
                            <td>{{ $order->o_status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                           
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