<?php

  include_once"ui/connectdb.php";

  session_start();

  //if the user click the login button
  //using post to send the login request
  if(isset($_POST['btn_login'])){

    //storing txt filds into variables
    $useremail = $_POST['txt_email'];
    $userpass = $_POST['txt_pass'];

    //testing passing of email and password
    //echo $useremail." ".$userpass;

    //geting user login data from the database
    $select = $pdo->prepare("SELECT * FROM tbl_user WHERE useremail='$useremail' AND userpassword='$userpass'");
    //execute the query
    $select->execute();

    //fetching ALL the data in the $row variable
    $row = $select->fetch(PDO::FETCH_ASSOC);

    //$row is an array containing the user data so if the user is incorrect it will throw an error to avoid the error we put the form validation inside this if statement using is_array()
    if(is_array($row)){

      //comparing if the user and password are equal to values in the database
      //Login to Admin Dashboard
      if($row['useremail'] == $useremail && $row['userpassword'] == $userpass && $row['role'] == 'Admin'){

      echo $success = "You are logged as Admin";

      //redirecting the user to the Admin dashboard
      header("refresh: 1; ui/dashboard.php");
      
      }else{

        //comparing if the user and password are equal to values in the database
        //Login to User Dashboard
        if($row['useremail'] == $useremail && $row['userpassword'] == $userpass && $row['role'] == 'User'){

          echo $success = "You are logged in as User";

          //redirecting the user to the User dashboard
          header("refresh: 1; ui/user.php");
        }

      }

    }else{

      echo $error = "Incorrect email or password";
    }

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>POS BARCODE | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>POS</b>BARCODE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="txt_email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="txt_pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            <a href="forgot-password.html">I forgot my password</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="btn_login">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
      </p>
      <p class="mb-0">

      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
