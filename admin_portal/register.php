<?php 
 $title='Register';
 // error_reporting(0);
 include('header.php');
 include('include/db.php');
 include('include/function.php');
 
 if(isset($_POST['register'])) {
    extract($_POST);
    
    // Check if username already exists
    $check_user = "SELECT * from admin_login where Adm_Name='".$A_NAME."'";
    $info = $db->query($check_user);
    
    if($info->num_rows > 0) {
        $user_exists = true;
    } else {
        // Insert new user data
        $insert = "INSERT INTO admin_login (Adm_Name, Adm_Password) VALUES ('".$A_NAME."', '".$A_PASSWORD."')";
        if($db->query($insert)) {
            // Redirect to login page
            header("Location: login.php");
            exit();
        } else {
            $register_success = false;
        }
    }
 }
?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Register</div>
      <div class="card-body">
        <form action="" method="post">
          <?php if(isset($register_success) && $register_success == true) { ?>
            <div class="alert alert-success alert-dismissible text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Your account has been created.
            </div>
          <?php } elseif(isset($register_success) && $register_success == false) { ?>
            <div class="alert alert-danger alert-dismissible text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> There was a problem creating your account. Please try again.
            </div>
          <?php } elseif(isset($user_exists) && $user_exists == true) { ?>
            <div class="alert alert-warning alert-dismissible text-center">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Warning!</strong> Username already exists. Please choose a different username.
            </div>
          <?php } ?>
          
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input class="form-control" id="exampleInputEmail1" name="A_NAME" type="text" aria-describedby="emailHelp" placeholder="Enter User name" required>
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="A_PASSWORD" type="password" placeholder="Password" required>
          </div>
          
          <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
        </form>
        
        <div class="text-center">
          <br>
          <a class="d-block small" href="login.php">Already have an account? Login here</a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
