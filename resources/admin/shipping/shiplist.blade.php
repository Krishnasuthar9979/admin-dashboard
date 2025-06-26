<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Management</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
                            <th>Employee Name</th>
                            <th>Product Name(from order details)</th>
                            <th>customer name</th>
                            <th>Shipp Address</th>
                            <th>city</th>
                            <th>Area</th>
                            <th>Pincode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shipping as $ship)
                        <tr>
                            <td>{{ $ship->ship_id }}</td>
                            <td>{{ $ship->employee->e_name }}  <!-- || {{ $ship->employee->schedule}}--> </td> 
                            <td>
                                    @php
                                        $related_order_details = $orderdetails->where('od_id', $ship->od_id);
                                    @endphp

                                    @if ($related_order_details->isNotEmpty())
                                        @foreach ($related_order_details as $order_detail)
                                            {{ $order_detail->product->p_name ?? 'N/A' }} <br>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                            </td>
                            <td>
                                 {{ $ship->customer ? $ship->customer->c_name : 'N/A' }}
                            </td> 
                            <td>{{ $ship->ship_address }}</td>
                            <td>{{ $ship->city }}</td>  
                            <td>{{ $ship->area }}</td>
                            <td>{{ $ship->pincode }}</td>
                            <td>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-left: 4px;">
                                <button class="btn btn-sm btn-primary me-1"  onclick="window.location.href='/admin/shipping/shipedit/{{$ship->ship_id}}'" title="Edit">
                                    <i class="bi bi-pencil">
                                    </i>
                                </button>
                            </div>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-right: 4px;">
                                <form action="{{ route('admin.shipping.destroy', $ship->ship_id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete from the list?');" style="display:inline;">
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