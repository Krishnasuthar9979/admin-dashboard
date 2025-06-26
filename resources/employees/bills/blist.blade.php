<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Management</title>
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
                            <th>Order Details</th>
                            <th>Customer Name</th>
                            <th>Order_date</th>
                            <th>Delivery_date</th>
                            <th>Total Amount</th>
                            <th>Tax</th>
                            <th>Discount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $bill)
                        <tr>
                            <td>{{ $bill->bill_id }}</td>
                            <td>{{ $bill->order->o_id }}</td>
                            <!-- @foreach ($orderdetails as $order_details) -->
                            <td>{{ $bill->od_id }} || {{$order_details->product->p_name }}</td>
                            <!-- @endforeach -->
                            <td>{{ $bill->customer->c_name }}</td>
                            <td>{{ $bill->order_date }}</td>
                            <td>{{ $bill->delivery_date }}</td>
                            <td>{{ $bill->total_amount }}</td>
                            <td>{{ $bill->tax }}</td>
                            <td>{{ $bill->discount }}</td>
                            <td>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-left: 4px;">
                                    <button class="btn btn-sm btn-primary" type="button"  onclick="window.location.href='/admin/bills/bedit/{{ $bill->bill_id }}'" title="Edit">
                                            <i class="bi bi-pencil">
                                            </i>
                                    </button>
                                </div>
                                <div class="flex justify-content-center" style="margin-bottom: 5px; margin-right: 4px;">
                                    <form action="{{ route('admin.bills.destroy', $bill->bill_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this {{ $bill->bill_id }} id of bill from the list?');" style="display:inline;">
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
                          