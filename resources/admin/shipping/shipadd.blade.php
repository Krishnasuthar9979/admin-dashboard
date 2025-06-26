<html >
<head><title>Delievry Management</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div id="shippingForm" class="card mb-4" style="display: none;"> 
        <div class="card-header">
            <h5 class="card-title mb-0">Add Shipping/Schedule</h5>
        </div>
        <div class="card-body">
            <form id="shippingForm" action="{{ route('admin.shipping.store') }}" method="post"> 
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Employee Name</label>
                        <!-- <input type="text" name="e_name" class="form-control" required> -->
                        <select name="e_id" class="form-control" required>
                            <option value="">Select employee</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->e_id }}"> {{ $employee->e_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Select Customer Name</label>
                        <select name="c_id" class="form-control" required>
                            <option value="">Select customer</option>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->c_id }}"> {{ $customer->c_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                    <select name="od_id" class="form-control" required>
                        <option value="">Select product(from OrderDetails)</option>
                            @foreach($orderdetails as $order_detail)
                                    <option value="{{ $order_detail->od_id }}"> {{ $order_detail->product->p_name }}</option>
                            @endforeach
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Shipp Address</label>
                        <input type="text" name="ship_address" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter City</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Area </label>
                        <input type="text" name="area" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Enter Pincode </label>
                        <input type="number" name="pincode" class="form-control" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2"
                        onclick="hideForm('shipping')">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="padding:11px;">Add shipping</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


