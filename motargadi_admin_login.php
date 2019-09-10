<?php 
	if(isset($_COOKIE['remember']) && $_COOKIE['remember']==1){
		session_start();
		$_SESSION['email'] = $_COOKIE['email'];
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Motorgadi</title>
</head>
<body>
	<h1>Login Form</h1>
	<?php 
		if(isset($_GET['msg']) && $_GET['msg'] ==1){
			echo 'Unathorized Acess';
		}
	 ?>
	<?php 
		if (isset($_POST['btnLogin']))	{
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
			$sql="select * from tbl_admin where email='$email' and password='$password' and status=1";
			$result = $connect->query($sql);
			if($result->num_rows==1){
				//$user = $result->fetch_assoc();
				$login=true;
			} 
			if ($login) {
					$_SESSION['email'] = $email;
					if(isset($_POST['remember'])){
						setcookie('remember',1,time() + 7*24*60*60);
						setcookie('email',$email,time() + 7*24*60*60);
					}
				echo "hey,we are on progress!!";
				}
			else{
				echo "Login Failed";
			}
		}
	}		
	?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		
		<div class="pr">
			<label for = "email">Email</label>
			<input type="email" name ="email" placeholder="Enter your email">
			<?php 
			if(isset($err['email'])){
			echo $err['email'];
			}
			?>
		</div>
		<div class = "pr">
			<label for = "password">Password</label>
			<input type="password" name ="password" placeholder="Enter password">
			<?php 
			if(isset($err['password'])){
				echo $err['password'];
			}
			?>
		</div>
		<input type="checkbox" name="remember" value="remember">Remember me
		<br>
		<input type="submit" name="btnLogin" value="Login">

	</form>
</body>
</html>