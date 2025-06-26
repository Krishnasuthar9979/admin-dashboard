<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<body>
    @if (session()->has('alert'))
        <div class="alert {{ session()->get('alert-type') }}" role="alert" style="text-align:center; font-size:24px; padding:10px; margin-left :auto;">
            {{ session()->get('alert') }}
        </div>
    @endif
    <div class="container mt-5">
        <div class="container py-4">
        <h2> Edit Profile</h2>
        <form action="{{ route('admin.adminedit.update',$admin->a_id)}}" method="post" >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" value="{{ $admin->a_name }}" name="a_name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="a_email" value="{{ $admin->a_email }}"  class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="a_password" id="a_password" value="{{ $admin->a_password }}"  class="form-control"  required>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone No</label>
            <input type="tel" name="a_mobileno" id="a_mobileno"  value="{{ $admin->a_mobileno }}"  class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
        </div>
    </div>
</body>
</html> 
