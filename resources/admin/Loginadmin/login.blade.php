<!DOCTYPE html>
<html>
  <head>
    <title>login form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      }
      form {
      border: 5px solid #f1f1f1;
      margin-top: 50px;
      }
      input[type=text], input[type=password] {
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      button {
      background-color:rgb(14, 20, 26);
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grabbing;
      width: 100%;
      }
      h1 {
      text-align:center;
      font-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: left;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      }
      span.psw {
      float: right;
      padding-top: 0;
      padding-right: 15px;
      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;
      }
    }
    </style>
  </head>
  <body>
    <center>

    @if($errors->any())
            @foreach ($errors->all() as $error)
                <center><h3 style="color:red; background-color:antiquewhite">Enter valid name or password, {{ $error }}</h3></center>
            @endforeach
    @endif
    @if($errors->has('login_error'))
    <div class="alert alert-danger">{{ $errors->first('login_error') }}</div>
    @endif
    <form action="{{ url('admin/Loginadmin/login') }}" method="post">
       @csrf
      <h1>Admin Login Form</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="a_name"><strong>Admin name</strong></label>
        <input type="text" placeholder="Enter Username" autocomplete="a_name" name="a_name" required>
        <label for="a_password"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" autocomplete="a_password" name="a_password" required>
      </div>
      <button type="submit" >Login</button>
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        <input type="checkbox"  checked="checked" name="remember"> Remember me
        </label>
        <!-- <span class="psw"><a href="changepass"> Forgot password?</a></span> -->
      </div>
    </form>
    </center>
  </body>
</html>
