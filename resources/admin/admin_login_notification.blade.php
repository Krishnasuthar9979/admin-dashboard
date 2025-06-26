<!-- resources/views/emails/admin_login_notification.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login Notification</title>
</head>
<body>
    <div class="d-flex justify-content-center mt-4 mb-5"><h1>Admin Login Successful</h1></div>
    <div class="d-flex justify-content-center mt-4 mb-5"><h2>Optical Shop Management System</h2>
    <p>The admin of optical shop management software system ( <bold> {{ $admin->a_name }} </bold>)  has logged in successfully.</p>
    <p>Login Time: {{ now() }}</p>
    <p>IP Address: {{ request()->ip() }}</p>
    <p>Browser: {{ request()->header('User-Agent') }}</p>
    <p>Admin ID: {{ $admin->a_id }}</p>
    </div>
</body>
</html>