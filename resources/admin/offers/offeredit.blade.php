<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Offers</h2>

        <form action="{{ route('admin.offers.update',$offer->offer_id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ $offer->title }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" value="{{$offer->description}}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Discount</label>
            <input type="text" name="discount_percentage" value="{{ $offer->discount_percentage}}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" value="{{$offer->start_date->format('Y-m-d') }}"  class="form-control"  required>
        </div>
        <div class="mb-3">
            <label class="form-label">End Date</label>
            <input type="date" name="end_date" id="end_date"  value="{{ $offer->end_date->format('Y-m-d') }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="Manager" {{ $offer->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="Sales" {{ $offer->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Offer</button>
        </form>
        </div>
    </div>
</body>
</html> 