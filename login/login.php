<?php
session_start();
include('../DB/db.php');

$con = new DBConnector;

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['pass'];
	$_SESSION['username'] = $username;
	$res = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");
    while($row=mysqli_fetch_array($res)){
        if(password_verify($password,$row['password']) && $username == $row['username']){
			if($row['active'] == 0){
				echo "Account has been suspended due to violation on policy! Please contact administrator";
			} else{
            if($row['access_level'] == 1){
				header("location:../admin/home.php");
				exit();
			} else if ($row['access_level'] == 2){
				header("location: ../users/index.php");
			} else {
                header("location: ../photographers/index.php");
            }
        }}
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
<!-- <body style="background-color: #999999;"> -->
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('loginAssets/images/fashion1.jpeg');"></div>
				<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="#" method="POST">
					<span class="login100-form-title p-b-59">
						Sign In
					</span>
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Username..." autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="*************" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>

						<a href="signup.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign up
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
