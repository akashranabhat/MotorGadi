<?php 
  if(isset($_COOKIE['remember']) && $_COOKIE['remember']==1){
    session_start();
    $_SESSION['email'] = $_COOKIE['email'];
    header('location:dashboard.php');
  }
 ?>
 
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <?php 
    if(isset($_GET['msg']) && $_GET['msg'] ==1){
      echo 'Unathorized Acess';
    }
   ?>
  <?php 
    if (isset($_POST['btnLogin']))  {
      // print_r($_POST);
      $err = [];
      if(isset($_POST['email']) && !empty($_POST['email'])){
        $email= $_POST['email'];
      }
      else {
        $err['email'] = 'Enter Email';
      }
      if(isset($_POST['password']) && !empty($_POST['password'])){
        $password=md5($_POST['password']);
      }
      else {
        $err['password']  = 'Enter Password';
      }
      
      if (count($err) == 0) {
      $login=false;
      $connect = new mysqli('localhost','root','','db_motorgadi');
      if($connect->connect_errno !=0){
        die('database connection error');
      }
      $sql="select * from tbl_user where email='$email' and password='$password' and status=1";
      $result = $connect->query($sql);
      if($result->num_rows==1){
        $login=true;
      } 
      if ($login) {
        
        session_start();
          $_SESSION['email'] = $email;
          
          if(isset($_POST['remember'])){
            setcookie('remember',1,time() + 7*24*60*60);
            setcookie('email',$email,time() + 7*24*60*60);
          }
          
        header("location:dashboard.php");
        }
      else{
        $err['failed']='Login Failed,Re-Enter Valid Username and Password';
      }
    }
  }   
  ?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

          <div class="card-body p-0 ">
            <!-- Nested Row within Card Body -->
            <div class="row justify-content-center ">
              <div class="col-lg-6">
                <div class="p-5 card o-hidden border-0 shadow-lg my-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                    <span class="text-danger">
                    <?php 
                      if(isset($err['failed'])){
                      echo $err['failed'];
                      }
                    ?>
                    <?php 
                      if(isset($_GET['message']) && $_GET['message']==1){
                        echo "Login to Continue";
                      }
                    ?>

                  </span>
                  </div>
                  <!-- FORM Start -->


                  <form class="user" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                        aria-describedby="emailHelp" placeholder="Enter Email Address...">
                        <span class="text-danger"><?php 
                            if(isset($err['email'])){
                            echo $err['email'];
                            }
                        ?>
                      </span>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
                        placeholder="Password">
                      <span class="text-danger">
                      <?php 
                      if(isset($err['password'])){
                        echo $err['password'];
                      }
                      ?>
                    </span>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button name="btnLogin" class="btn btn-primary btn-user btn-block">Login</button>
                      
                    <!-- <a href="dashboard.php" class="btn btn-primary btn-user btn-block">
                      
                    </a> -->
                    
                  </form>
                  <!-- FORM End -->
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
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