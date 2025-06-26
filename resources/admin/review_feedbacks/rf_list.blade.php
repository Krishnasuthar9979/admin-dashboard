<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback or review Management</title>
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
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Rating</th>
                            <th>Review_comment</th>
                            <th>Review_date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rfs as $rf)
                        <tr>
                            <td>{{ $rf->review_id  }}</td>
                            <td>{{ $rf->customer->c_name }}</td>
                            <td>{{ $rf->product->p_name }}</td>
                            <td>{{ $rf->rating }}</td>
                            <td>{{ $rf->review_comment }}</td>
                            <td>{{ $rf->review_date }}</td>
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
