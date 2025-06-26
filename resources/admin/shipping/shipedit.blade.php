<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Delivery</h2>
        <form action="{{ route('admin.shipping.update',$shipping->ship_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Employee Name</label>
            <select name="e_id" class="form-control" required>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->e_id }}" {{ $employee->e_id == $shipping->e_id ? 'selected' : '' }}> {{ $employee->e_name }}</option>
                            <option value="{{ $employee->e_id }}"> {{ $employee->e_name }}</option>
                            @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Employee Name</label>
            <select name="c_id" class="form-control" required>
                            @foreach($customers as $customer)
                            <option value="{{ $customer->c_id }}" {{ $customer->c_id == $shipping->c_id ? 'selected' : '' }}> {{ $customer->c_name }}</option>
                            <option value="{{ $customer->c_id }}"> {{ $customer->c_name }}</option>
                            @endforeach
            </select>
        </div>
        <select name="od_id" class="form-control" required>
    @foreach($orderdetails as $order_detail)
        <option value="{{ $order_detail->od_id }}" 
            {{ $order_detail->od_id == $shipping->od_id ? 'selected' : '' }}>
            {{ optional($order_detail->products)->p_name ?? 'Product Not Found' }}  
        </option>
    @endforeach
</select>

        <div class="mb-3">
        <label class="form-label">Enter Shipp Address</label>
        <input type="text" name="ship_address" value="{{ $shipping->ship_address }}" class="form-control" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Enter City</label>
        <input type="text" name="city" value="{{ $shipping->city }}" class="form-control" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Enter Area</label>
        <input type="text" name="area" value="{{ $shipping->area }}" class="form-control" required>
        </div>
        <div class="mb-3">
        <label class="form-label">Enter Pincode</label>
        <input type="text" name="pincode" value="{{ $shipping->pincode }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Delivery</button>
        </form>
        </div>
    </div>
</body>
</html> 