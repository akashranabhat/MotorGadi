<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<?php

      if (isset($_POST['submit'])){
        $err = [];
        if(isset($_POST['name']) && !empty($_POST['name'])){
          $name= $_POST['name'];
        }
        else {
          $err['name'] = 'Enter name';
          }

        if(isset($_POST['email']) && !empty($_POST['email'])){
          $email= $_POST['email'];
        }
        else {
          $err['email'] = 'Enter email';
          }

        if(isset($_POST['phone']) && !empty($_POST['phone'])){
          $phone= $_POST['phone'];
        }
        else {
          $err['phone'] = 'Enter phone';
          }
        if(isset($_POST['address']) && !empty($_POST['address'])){
          $address= $_POST['address'];
        }
        else {
          $err['address'] = 'Enter address';
          }

        if(isset($_POST['username']) && !empty($_POST['username'])){
          $username= $_POST['username'];
        }
        else {
          $err['username'] = 'Enter username';
          }

        if(isset($_POST['password']) && !empty($_POST['password'])){
          $p= $_POST['password'];
        }
        else {
          $err['password'] = 'Enter password';
          }
        if(isset($_POST['rpassword']) && !empty($_POST['rpassword'])){
          $rp= $_POST['rpassword'];
          if ($p===$rp) {
          $password=$_POST['password'];
        }
        else{
          $err['matchpassword']='Password does not match';
        }
          }
        else {
          $err['rpassword'] = 'Re-Enter password';
          }
       
        if (count($err) == 0) {
        $connect = new mysqli('localhost','root','','db_motorgadi');

          if($connect->connect_errno !=0){
            die('database connection error');
          }
          $sql="insert into tbl_user(name,email,phone,address,username,password) values ('$name','$email','$phone','address','$username' ,MD5('$password'))";
          echo "$sql";
          $connect->query($sql);
         // session_start();
           // $_SESSION['issignup']=0;
          if($connect->affected_rows == 1 && $connect->insert_id >0){
            //$_SESSION['issignup']=1;
            header('location:login.php');
          }else{
            $err['failed']='Signup Failed!,Try Again.';
          }
        }
      }
  ?>
  <div class="container">

     <div class="row justify-content-center ">
              <div class="col-lg-5">
                <div class="p-4 card o-hidden border-0 shadow-lg my-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>

              <form class="user" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <div class="form-group row">
                  <?php 
                      if(isset($err['failed'])){
                      echo $err['failed'];
                      }
                    ?>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleName" placeholder="Name" name="name">
                    <?php 
                      if(isset($err['name'])){
                      echo $err['name'];
                      }
                    ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleUsername" placeholder="Username" name="username">
                    <?php 
                      if(isset($err['username'])){
                      echo $err['username'];
                      }
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
                  <?php 
                      if(isset($err['email'])){
                      echo $err['email'];
                      }
                    ?>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    <?php 
                      if(isset($err['password'])){
                      echo $err['password'];
                      }
                    ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="rpassword">
                    <?php 
                      if(isset($err['rpassword'])){
                      echo $err['rpassword'];
                      }
                    ?>
                    <?php 
                      if(isset($err['matchpassword'])){
                      echo $err['matchpassword'];
                      }
                    ?>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="examplePhone" placeholder="PhoneNumber" name="phone">
                    <?php 
                      if(isset($err['phone'])){
                      echo $err['phone'];
                      }
                    ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleAddress" placeholder="Address" name="address">
                    <?php 
                      if(isset($err['address'])){
                      echo $err['address'];
                      }
                    ?>
                  </div>
                </div>
                <button name="submit" class="btn btn-primary btn-user btn-block">Reigster</button>
                
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
