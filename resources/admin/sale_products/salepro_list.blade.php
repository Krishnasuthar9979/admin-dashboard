<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale product Management</title>
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
                            <th>Product Name</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total_amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saleproducts as $saleproduct)
                        <tr>
                            <td>{{ $saleproduct->sale_product_id }}</td>
                           
                            <td>{{ $saleproduct->date}}</td>
                            <td>{{ $saleproduct->price }}</td>
                            <td>{{ $saleproduct->qty }}</td>
                            <td>{{ $saleproduct->total_amount }}</td>
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
