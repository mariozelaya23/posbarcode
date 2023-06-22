<?php

  include_once 'connectdb.php';
  session_start();

  include_once "header.php";

  // 1) When user click on updatepassword button then we get out the values from user into php variables.

  if(isset($_POST['btn_updatepassword'])){
    $oldpassword_txt = $_POST['txt_oldpassword'];
    $newpassword_txt = $_POST['txt_newpassword'];
    $cnewpassword_txt = $_POST['txt_cnewpassword'];

    //echo $oldpassword_txt."-".$newpassword_txt."-".$cnewpassword_txt;

    // 2) Using of select Query we will get out database records according to useremail.
    // storing session email in a variable
    $email = $_SESSION['useremail'];

    $select = $pdo->prepare("SELECT * FROM tbl_user WHERE useremail = '$email'");
    $select->execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    // echo $row['useremail'];
    // echo $row['username'];

    //creating session variables to be use with sweetalerts
    $_SESSION['status'] = 'Password changed successfully'; //message
    $_SESSION['status_code'] = 'success'; //bootstrap class message, this can be success, warning, etc


  }


  
  // 3) We will compare the user inputs values to database values.
  // 4) If values will match then we will run update query.

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">

            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Old Password" name="txt_oldpassword">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="New Password" name="txt_newpassword">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Confirm New Password" name="txt_cnewpassword">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info" name="btn_updatepassword">Update Password</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    include_once "footer.php";

?>

<?php

  if(isset($_SESSION['status']) && $_SESSION['status']!='')
  {

?><!-- Closing first php -->

  <script>

    Swal.fire({
      icon: '<?php echo $_SESSION['status_code'];?>',
      title: '<?php echo $_SESSION['status'];?>'
    })

  </script>

<?php

unset($_SESSION['status']);
  }

?><!-- Closing second php -->