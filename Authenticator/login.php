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
			if ($row['active'] == 0){
				echo "Account has been suspended due to violation on policy! Please contact administrator";
			} else {
			if($row['access_level'] == 1){
				header('location:../admin/home.php');
			} else if ($row['access_level'] == 2){
				header("location: ../users/index.php");
            } else {
                header("location: ../photographers/index.php");
                echo "Please proceed to the photographers module";
            }
        }}
    }
}  
?>

<!DOCTYPE html>
<html lang="en">
	<title>Login</title>
	<?php include ('../include/header.php'); ?>
<body style="background-color: #999999;">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('loginAssets/images/bg-02.jpg');"></div>
				<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
					<form class="login100-form validate-form" action="#" method="POST">
						<span class="login100-form-title p-b-59">
							Login
						</span>
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
	<?php include ('../include/footer.php'); ?>
</body>
</html>