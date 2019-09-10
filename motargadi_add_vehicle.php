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
					$password= $_POST['password'];
				}
				else {
					$err['password'] = 'Enter password';
					}
				if (count($err) == 0) {
				$connect = new mysqli('localhost','root','','db_motorgadi');
					if($connect->connect_errno !=0){
						die('database connection error');
					}
					$sql="insert into tbl_user(name,email,phone,address,username,password) values ('$name','$email','$phone','address','$username' ,MD5('$password'))";
					$connect->query($sql);
					if($connect->affected_rows == 1 && $connect->insert_id >0){
						echo "Insert Sucess";
					}else{
						echo "Insert Failed";
					}
				}
			}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Motorgadi</title>
</head>
<body>
		<h1>Add Vehicle</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

			<label for="model">Model</label>
			<input type="text" name="model"><br>
			<?php 
			if(isset($err['model'])){
			echo $err['model'];
			}
			?>

			<label for="price">Price</label>
			<input type="number" name="price"><br>
			<?php 
			if(isset($err['price'])){
			echo $err['price'];
			}
			?>

			<label for="image">Image</label>
			<input type="file" name="email"><br>
			<?php 
			if(isset($err['email'])){
			echo $err['email'];
			}
			?>

			<label for="mileage">Mileage</label>
			<input type="number" name="mileage"><br>
			<?php 
			if(isset($err['mileage'])){
			echo $err['mileage'];
			}
			?>

			<label for="no_of_seats">Number of Seats</label>
			<input type="number" name="no_of_seats"><br>
			<?php 
			if(isset($err['no_of_seats'])){
			echo $err['no_of_seats'];
			}
			?>

			<label for="air_bag">Number of Air Bag</label>
			<input type="number" name="air_bag"><br>
			<?php 
			if(isset($err['air_bag'])){
			echo $err['air_bag'];
			}
			?>
			<label for="ground_clearance">Ground Clearence</label>
			<input type="number" name="ground_clearance"><br>
			<?php 
			if(isset($err['ground_clearance'])){
			echo $err['ground_clearance'];
			}
			?>

			<label for="height">Height</label>
			<input type="number" name="height"><br>
			<?php 
			if(isset($err['height'])){
			echo $err['height'];
			}
			?>

			<label for="weidth">Weidth</label>
			<input type="number" name="weidth"><br>
			<?php 
			if(isset($err['weidth'])){
			echo $err['weidth'];
			}
			?>
			<label for="length">Length</label>
			<input type="text" name="length"><br>
			<?php 
			if(isset($err['length'])){
			echo $err['length'];
			}
			?>

			<label for="weight">Weight</label>
			<input type="text" name="weight"><br>
			<?php 
			if(isset($err['weight'])){
			echo $err['weight'];
			}
			?>

			<label for="gear_type">Gear Type</label>
			<input type="radio" name="status" value="1" > Automatic
			<input type="radio" name="status" value="0" checked="" >Manual
			<br>
			
			<label for="power">Power</label>
			<input type="number" name="power"><br>
			<?php 
			if(isset($err['power'])){
			echo $err['power'];
			}
			?>

			<label for="color">Availabel colour</label>
			<input type="text" name="color"><br>
			<?php 
			if(isset($err['color'])){
			echo $err['color'];
			}
			?>

			<label for="additional">Additional Features</label>
			<input type="text" name="additional"><br>
			<?php 
			if(isset($err['additional'])){
			echo $err['additional'];
			}
			?>

			<label for="reverse_sensing">Reverse Sensing</label>
			<input type="radio" name="reverse_sensing" value="1" > Yes
			<input type="radio" name="reverse_sensing" value="0" checked="" > No
			<br>

			<label for="abs">ABS</label>
			<input type="radio" name="abs" value="1" > Yes
			<input type="radio" name="abs" value="0" checked="" > No
			<br>
			
			<label for="adj_comfort">Adjustable Comfort</label>
			<input type="radio" name="adj_comfort" value="1" > Yes
			<input type="radio" name="adj_comfort" value="0" checked="" > No
			<br>
			
			<label for="a/c">Air Conditioning<																																																																																																																																																																																																																																/label>
			<input type="radio" name="a/c" value="1" > Yes
			<input type="radio" name="a/c" value="0" checked="" > No
			<br>
			
			<label for="shatter_res">Shatter Resistance</label>
			<input type="radio" name="shatter_res" value="1" > Yes
			<input type="radio" name="shatter_res" value="0" checked="" > No
			<br>
			
			<label for="status">Status</label>
			<input type="radio" name="status" value="1" > Yes
			<input type="radio" name="status" value="0" checked="" > No
			<br>
			
			<label for="status">Status</label>
			<input type="radio" name="status" value="1" > Active
			<input type="radio" name="status" value="0" checked="" > De Active
			<br>
			<br>
			
			<input type="submit" name="submit" value="uplode">

		</form>
	</body>
</html>