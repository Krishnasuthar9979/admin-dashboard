<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="container mt-5">
        <div class="container py-4">
            <h2> Edit Bill</h2>
            <form action="{{ route('admin.bills.update',$bills->bill_id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Order ID</label>
                   
                    <select name="o_id" class="form-control" required>
                        @foreach($orders as $order)
                        <option value="{{ $order->o_id }}"  {{ $order->o_id == $bills->o_id ? 'selected' : '' }}> {{ $order->o_id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Order Details</label>
                    <select name="od_id" class="form-control" required>
                        @foreach($orderdetails as $order_detail)
                        <option value="{{ $order_detail->od_id }}">Orderdetail Id : {{ $bills->od_id }}  </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Customer Name</label>
                    <select name="c_id" class="form-control" required>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->c_id }}"> {{ $customer->c_name }}</option>
                        @endforeach
                </div><br>
                <div class="mb-3">
                    <label class="form-label">Order_date</label>
                    <input type="date" value="{{ $bills->order_date}}" name="order_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Delivery_date</label>
                    <input type="date" value="{{ $bills->delivery_date}}" name="delivery_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Amount</label>
                    <input type="text" value="{{ $bills->total_amount}}" name="total_amount" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tax</label>
                    <input type="text" value="{{ $bills->tax}}" name="tax" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Discount</label>
                    <input type="text" value="{{ $bills->discount}}" name="discount" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Bill</button>
            </form>
        </div>
    </div>
</body>

</html>