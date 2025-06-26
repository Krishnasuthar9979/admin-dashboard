
<html >
<head><title>Bill Management</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="billsForm" class="card mb-4" style="display: none;"> 
        <div class="card-header">
            <h5 class="card-title mb-0">Add New Bill</h5>
        </div>
        <div class="card-body">
            <form id="billsForm" action="{{ route('admin.bills.store') }}" method="post"> 
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Order Id</label>
                        <select name="o_id" class="form-control" required>
                            <option value="">Select Order Id</option>
                            @foreach($orders as $order)
                            <option value="{{ $order->o_id }}"> {{ $order->o_id }}</option>
                            @endforeach
                        </select>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Order_details</label>
                        <select name="od_id" class="form-control" required>
                            <option value="">Select Order Details</option>
                            @foreach($orderdetails as $order_detail)
                            <option value="{{ $order_detail->od_id }}">Orderdetail Id : {{$order_detail->od_id}} , Product Name : {{ $order_detail->product->p_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Customer Name</label>
                        <select name="c_id" class="form-control" required>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->c_id }}"> {{ $customer->c_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Order Date</label>
                        <input type="date" name="order_date" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Delivery Date</label>
                        <input type="date" name="delivery_date" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Total Amount</label>
                        <input type="text" name="total_amount" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Tax</label>
                        <input type="text" name="tax" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Discount</label>
                        <input type="text" name="discount" class="form-control" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('bills')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add Bill</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


