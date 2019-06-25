<?php
session_start();
include('../DB/db.php');

$con = new DBConnector;

if(isset($_POST['signup'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['pass'];
	$Cpassword = $_POST['repeat-pass'];
	$contact = $_POST['contact'];
	$category = $_POST['category'];

	if($password == $Cpassword ){
		$_SESSION['username'] = $username;
		$pass = password_hash($password,PASSWORD_DEFAULT);
		echo $pass;
		if($category=="User"){

			$target_dir = '../assets/upload/';
			$total_files = count($_FILES['fileToUpload']['name']);
			
			for($key = 0; $key < $total_files; $key++) {
				
				// Check if file is selected
				
				$original_filename = $_FILES['fileToUpload']['name'][$key];
				$target = $target_dir . basename($original_filename);
				$tmp  = $_FILES['fileToUpload']['tmp_name'][$key];
				$sql = mysqli_query($con->conn, "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `email`, `contact`,`prof_pic` ,`access_level`, `active`) VALUES ('$fname','$lname','$username','$pass','$email','$contact','$target',2,1)");
				echo "its a success";
				$sql = mysqli_query($con->conn,$sql);
				$uploadIMG = move_uploaded_file($tmp, $target);
				if($sql === true && $uploadIMG === true){
					echo "Twaz Successfull";
					header("location:../Authenticator/login.php");
			}
		}
		} else {

			$target_dir = '../assets/upload/';
			$total_files = count($_FILES['fileToUpload']['name']);
			 
			for($key = 0; $key < $total_files; $key++) {
				
				// Check if file is selected
				
				$original_filename = $_FILES['fileToUpload']['name'][$key];
				$target = $target_dir . basename($original_filename);
				$tmp  = $_FILES['fileToUpload']['tmp_name'][$key];
				$sql = mysqli_query($con->conn, "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `email`, `contact`,`prof_pic`, `access_level`, `active`) VALUES ('$fname','$lname','$username','$pass','$email','$contact','$target',3,1)");
				$sql1 = mysqli_query($con->conn, "SELECT UserID FROM `users` WHERE username = '$username'");
				while($row=mysqli_fetch_array($sql1)){
					$UserID = $row['UserID'];
				}
				$sql = mysqli_query($con->conn,$sql);
				$uploadIMG = move_uploaded_file($tmp, $target);
				if($sql === true && $uploadIMG === true){
					echo "Twaz Successfull";
					header('location:index.php');
				
				}
				
			}
				
		}
	}
	
}
	   
?>
<!DOCTYPE html>
<html lang="en">
	<title>Sign Up</title>
	<?php include ('../include/header.php'); ?>
<body style="background-color: #999999;">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('loginAssets/images/bg-02.jpg');"></div>
				<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
					<form class="login100-form validate-form" action="#" method="POST">
						<span class="login100-form-title p-b-59">
							Sign In
						</span>

						<div class="wrap-input100 validate-input" data-validate="Name is required">
							<span class="label-input100">First Name</span>
							<input class="input100" type="text" name="fname" placeholder="First Name" autocomplete="off">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Name is required">
							<span class="label-input100">Last Name</span>
							<input class="input100" type="text" name="lname" placeholder="Last Name..." autocomplete="off">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" >
							<span class="label-input100">Email</span>
							<input class="input100" type="text" name="email" placeholder="Email addess..."autocomplete="off">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Username is required">
							<span class="label-input100">Username</span>
							<input class="input100" type="text" name="username" placeholder="Username..."autocomplete="off">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="pass" placeholder="*************">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
							<span class="label-input100">Repeat Password</span>
							<input class="input100" type="password" name="repeat-pass" placeholder="*************">
							<span class="focus-input100"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="Contact is required">
							<span class="label-input100">Contact</span>
							<input class="input100" type="text" name="contact" placeholder="07..." autocomplete="off">
							<span class="focus-input100"></span>
						</div>
							<span class="label-input100">I am a:</span>
							<input style="width: 20px;height: 1.5em;"class="label-input100" type="radio" name="category" Value="User" required>User
							<input style="width: 20px;height: 1.5em;"class="label-input100" type="radio" name="category" Value="Photographer" required>Photographer <br><br>

						<div class="flex-m w-full p-b-33">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
									<label class="label-checkbox100" for="ckb1">
										<span class="txt1">
											I agree to the
											<a href="#" class="txt2 hov1">Terms of User</a>
										</span>
									</label>
							</div>
						</div>
						<div class="flex-m w-full p-b-33">
							<div class="contact100-form-checkbox">
								<div class="custom-file">
								<span class="focus-input100"></span>
									<input type="file" class="custom-file-input" name="fileToUpload[]" id="inputGroupFile01"
									aria-describedby="inputGroupFileAddon01" >
									<label class="custom-file-label" for="inputGroupFile01">Upload Profile</label>
									<span class="focus-input100"></span>
								</div>
							</div>
						</div>
						
						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" name="signup">
									Sign Up
								</button>
							</div>
						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign In
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include ('../include/footer.php'); ?>
</body>
</html>