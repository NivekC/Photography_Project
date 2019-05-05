<?php
session_start();
include('../DB/db.php');

		$con = new DBConnector;

		if(isset($_POST['signup']))
		{
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
					//$sql = mysqli_query($con->conn, "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `email`, `contact`, `access_level`) VALUES ('$fname','$lname','$username','$pass','$email','$contact',2)");
					//echo "its a success";
					//header("location:login.php");
				}else{
					//$sql = mysqli_query($con->conn, "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `email`, `contact`, `access_level`) VALUES ('$fname','$lname','$username','$pass','$email','$contact',3)");
					//$sql1 = mysqli_query($con->conn, "SELECT UserID FROM `users` WHERE username = '$username'");
					while($row=mysqli_fetch_array($sql1)){
						$UserID = $row['UserID'];
						}
					//$res = mysqli_query($con->conn, "INSERT INTO `photographers`(`UserID`) VALUES ('$UserID')");
					echo "its a success";
				}
			}
		}
	   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>signup</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="loginAssets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="loginAssets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="loginAssets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginAssets/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginAssets/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
		<div class="login100-more" style="background-image: url('loginAssets/images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="#" method="POST">
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="fname" placeholder="First Name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
							<span class="label-input100">Last Name</span>
							<input class="input100" type="text" name="lname" placeholder="Last Name...">
							<span class="focus-input100"></span>
						</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username...">
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
							<input class="input100" type="text" name="contact" placeholder="07...">
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
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
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
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="loginAssets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="loginAssets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="loginAssets/vendor/bootstrap/js/popper.js"></script>
	<script src="loginAssets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="loginAssets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="loginAssets/vendor/daterangepicker/moment.min.js"></script>
	<script src="loginAssets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="loginAssets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="loginAssets/js/main.js"></script>

</body>
</html>