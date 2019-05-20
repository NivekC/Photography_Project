<?php
session_start();
include('../DB/db.php');

if(isset($_POST['update'])){
    header("Refresh:0");
}

		$con = new DBConnector;
        $username = $_SESSION['username'];
        $sql1 = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");


        while($row=mysqli_fetch_array($sql1)){
      $userID = $row['UserID'];
      $fname = $row['fname'];
			$lname = $row['lname'];
			$email = $row['email'];
			$username = $row['username'];
			$contact = $row['contact'];

        }
        $sql = mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID = '$userID'");
        while($row=mysqli_fetch_array($sql)){

			$bio = $row['Description'];

        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Cocoon -Portfolio">
    <meta name="keywords" content="Cocoon , Portfolio">
    <meta name="author" content="Pharaohlab">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> Cocoon -Portfolio</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/et-line.css" rel="stylesheet">
    <link href="../assets/css/ionicons.min.css" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="../assets/css/slick.css" rel="stylesheet">
    <!-- Magnific-popup -->
    <link rel="stylesheet" href="../assets/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../login/loginAssets/css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<div class="body-container container-fluid">
    <a class="menu-btn" href="javascript:void(0)">
        <i class="ion ion-grid"></i>
    </a>
    <div class="row justify-content-center">
        <!--=================== side menu ====================-->
        <div class="col-lg-2 col-md-3 col-12 menu_block">

            <!--logo -->
            <div class="logo_box">
                <a href="#">
                    <img src="../assets/img/logo1.jpg" alt="Amani">
                </a>
            </div>
            <!--logo end-->

            <!--main menu -->
            <div class="side_menu_section">
                <ul class="menu_nav">
                    <li>
                        <a href="index.php">
                            Home
                        </a>
                    </li>
                  
                    <li>
                        <a href="services.php">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="portfolio.php">
                            Portfolio
                        </a>
                    </li>
                    <li class="active">
                        <a href="profile.php">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <!--main menu end -->

            <!--filter menu -->

            <!--filter menu end -->


            <!--social and copyright -->
            <div class="side_menu_bottom">
                <div class="side_menu_bottom_inner">
                    <ul class="social_menu">
                        <li>
                            <a href="#"> <i class="ion ion-social-pinterest"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-facebook"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-twitter"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-dribbble"></i> </a>
                        </li>
                    </ul>

                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->

        <!--=================== Update Profile ====================-->


        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
        <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="#" method="POST">
					<span class="login100-form-title p-b-59">
						View Details
					</span>
                    <input type="<?php echo $fname?>">
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">First Name</span>
						<input class="input100"type="text" name="fname" readonly value="<?php echo $fname ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
							<span class="label-input100">Last Name</span>
							<input class="input100" type="text" name="lname"  readonly value="<?php echo $lname ?>">
							<span class="focus-input100"></span>
						</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" value="<?php echo $email ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username"  readonly value="<?php echo $username ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Contact is required">
							<span class="label-input100">Contact</span>
							<input class="input100" type="text" name="contact" value="<?php echo $contact ?>">
							<span class="focus-input100"></span>
                        </div>
                        <div class="form-group shadow-textarea">
                            <label for="exampleFormControlTextarea6">Enter your Bio</label>
                            <textarea class="form-control z-depth-1"  name="bio" id="exampleFormControlTextarea6" rows="3" cols="70" placeholder="Write something here..."></textarea>
                        </div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="update">
								Update
							</button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>

        </div>
        <!--=================== content body end ====================-->
    </div>
</div>


<!-- jquery -->
<script src="../assets/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="../assets/js/slick.min.js"></script>
<!--Portfolio Filter-->
<script src="../assets/js/imgloaded.js"></script>
<script src="../assets/js/isotope.js"></script>
<!-- Magnific-popup -->
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<!--Counter-->
<script src="../assets/js/jquery.counterup.min.js"></script>
<!-- WOW JS -->
<script src="../assets/js/wow.min.js"></script>
<!-- Custom js -->
<script src="../assets/js/main.js"></script>
</body>
</html>

<?php

if(isset($_POST['update']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $bio = $_POST['bio'];
    $sql2 = mysqli_query($con->conn, "UPDATE `users` SET `email`='$email',`contact`='$contact' WHERE username = '$username'");
    $stmt = $con->conn->prepare("UPDATE `photographers` SET `Description`= ? WHERE UserID = ?");
    $stmt->bind_param("ss", $bio, $userID);
    $stmt->execute();


}
?>
