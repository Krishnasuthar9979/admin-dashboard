<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compain Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>Contact person</th>
                            <th>Contact Email</th>
                            <th>Customer Query</th>
                            <th>img_front</th>      
                            <th>img_back</th>
                            <th>accept_reject</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($complains as $complain)
                        <tr>
                            <td>{{ $complain->com_id }}</td>
                            <td>{{ $complain->com_date }}</td>
                            <td>{{ $complain->o_id }}</td>
                            <td>{{ $complain->contact_person }}</td>
                            <td>{{ $complain->contact_email }}</td>
                            <td>{{ $complain->c_query }}</td>
                            <td>
                                @if($complain->img_front)
                                <img src="{{ url('storage/compains/')}}/{{ $complain->img_front}}" alt="{{ $complain->img_front }}" width="90" height="90">
                                @else
                                No image
                                @endif
                            </td>
                            <td>
                                @if($complain->img_back)
                                <img src="{{ url('storage/compains/')}}/{{ $complain->img_back}}" alt="{{ $complain->img_back }}" width="90" height="90">
                                @else
                                No image
                                @endif
                            </td>
                            <td>{{ $complain->accept_reject }}</td>
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
