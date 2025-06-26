<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!-- Offers Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Discount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $offer)
                        <tr>
                            <td>{{ $offer->offer_id }}</td>
                            <td>{{ $offer->title }}</td>
                            <td>{{ $offer->description }}</td>
                            <td>{{ $offer->discount_percentage }}%</td>
                            <td>{{ $offer->start_date }}</td>
                            <td>{{ $offer->end_date }}</td>
                            <td>{{ ucfirst($offer->status) }}</td>
                            <td>
                            <div class="flex justify-content-center" style="margin-bottom: 5px; margin-left: 1px;">
                                <button class="btn btn-sm btn-primary me-1"  onclick="window.location.href='/admin/offers/offeredit/{{$offer->offer_id}}'" title="Edit">
                                    <i class="bi bi-pencil"> 
                                    </i>
                                </button>
                            </div>
                                <!-- <button class="btn btn-sm btn-danger" type="submit" onclick="confirm('Are you sure you want to delete this {{ $offer->title }} offer from list?')";>
                                    <form action="{{ route('admin.offers.destroy',$offer->offer_id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <i class="bi bi-trash">delete</i>
                                    </form>
                                </button> -->
                                <div class="flex justify-content-center" style="margin-bottom: 5px; margin-left:auto;">
                                <button class="btn btn-sm btn-danger" type="submit" onclick="confirm('Are you sure you want to delete this {{ $offer->title }} offer from list?')";>
                                    <!-- <form method="post">
                                        @csrf
                                        @method('DELETE') -->
                                        <a href="offers/destroy/{{$offer->offer_id}}/" style="color:white;"><i class="bi bi-trash"></i></a> 
                                    <!-- </form>  -->
                                </button> 
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