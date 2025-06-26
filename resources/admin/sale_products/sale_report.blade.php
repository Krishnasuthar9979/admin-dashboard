<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <h2 class="mb-3 text-center">Sales Report</h2>
        <br>
        <form action="{{ url('/admin/sale_products/sale_search') }}" method="GET">
            @csrf
            @method('GET')
            <input type="text"  name="search" style="width:50%; margin-left:400px;" placeholder="Search..." value="{{ request('search') }}">
            <button type="submit" style="margin-left:auto; width:auto;" class="btn btn-success">Search</button>
        </form>
        <br>
        <table class="table table-bordered" id="salesTable">
            <thead class="table-success">
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
                @php $totalRevenue = 0; @endphp
                @foreach($saleproducts as $saleproduct)
                @php $lineTotal = $saleproduct->qty * $saleproduct->price; $totalRevenue += $lineTotal; @endphp
                <tr>
                    <td>{{ $saleproduct->sale_product_id }}</td>
                    <td>{{ $saleproduct->p_name }} </td>
                    <td>{{ $saleproduct->c_name }}</td>
                    <td>{{ $saleproduct->date}}</td>
                    <td>{{ $saleproduct->price }}</td>
                    <td>{{ $saleproduct->qty }}</td>
                    <td>{{ $saleproduct->total_amount }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">Total Revenue</th>
                    <th id="totalRevenue">₹{{ number_format($totalRevenue, 2) }}</th>
                </tr>
            </tfoot>
        </table>
        <br>
        <div class="mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="margin-top:10px;">Back</a>
            <form action="{{ url('/admin/sale_products/exportPDF') }}" method="get" style="display:inline;">
                @csrf
                <button type="submit" style="width: auto; margin-left:900px;" class="btn btn-danger">Export to PDF</button>
            </form>
        </div>
    </div>
</body>

</html>