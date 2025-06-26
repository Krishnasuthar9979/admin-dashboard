<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Status Of Order</h2>
        <form action="{{ route('admin.orders.update',$order->o_id)}}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label class="form-label">Order Status</label>
            <select class="form-select" name="o_status" required>
                <!-- <option value="">Select Position</option> -->
                <option value="Pending" {{ $order->o_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Delievered" {{ $order->o_status == 'Delievered' ? 'selected' : '' }}>Delievered</option>
                <option value="Confirm" {{ $order->o_status == 'Confirm' ? 'selected' : '' }}>Confirm</option>
            </select>        
        </div>  
        <div class="mb-3">
            <label class="form-label">Order date</label>
            <input type="date" name="o_date" id="o_date" value="{{ $order->o_date }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Order amount</label>
            <input type="number" name="o_amt" value="{{ $order->o_amt }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Customer name</label>
            <input type="text" name="c_id" value="{{ $order->customer->c_id }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Customer Prescription</label>
            <input type="number" name="prescription_id" value="{{ $order->prescription_id}}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
        </div>
    </div>
</body>
</html> 