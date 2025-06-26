<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Purchase Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-4">
        <h2 class="mb-3 text-center">Purchase Report</h2>
        <br>
         <form action="{{ url('/admin/purchase_products/purchase_search') }}" method="GET">
            @csrf
            <input type="text"  name="search" style="width:50%;margin-left:400px;" placeholder="Search..." value="{{ request('search') }}">
            <button type="submit" name="search" style="margin-left:auto; width:auto;" class="btn btn-success">Search</button>
        </form> 
        <br>
        <table class="table table-bordered" id="purchasesTable">
            <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Supplier Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
            </thead>
            <tbody>
                @php $totalRevenue = 0; @endphp
                @foreach ($purchase_products as $purchase_product)
                @php $lineTotal = $purchase_product->qty * $purchase_product->price; $totalRevenue += $lineTotal; @endphp
                        <tr>
                            <td>{{ $purchase_product->supplier_pid }}</td>
                            <td>{{ $purchase_product->p_name }} </td>
                            <td>{{ $purchase_product->s_name }}</td>
                            <td>{{ $purchase_product->qty }}</td>
                            <td>{{ $purchase_product->price }}</td>
                        <tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Revenue</th>
                    <th id="totalRevenue">₹{{ number_format($totalRevenue, 2) }}</th>
                    <th></th>
                </tr>
            </tfoot>

        </table>
        <br>

        <br>
        <div class="mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="margin-top:10px;">Back</a>
        </div>
    </div>
</body>

</html>