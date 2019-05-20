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
  $username = $row['username'];
  $Userid = $row['UserID'];

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
                         <a href="about.php">
                             About Us
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
             <div class="side_menu_section">
                 <h4 class="side_title">filter by:</h4>
                 <ul  id="filtr-container"  class="filter_nav">
                     <li  data-filter="*" class="active"><a href="javascript:void(0)" >all</a></li>
                     <li data-filter=".branding"> <a href="javascript:void(0)">branding</a></li>
                     <li data-filter=".design"><a href="javascript:void(0)">design</a></li>
                     <li data-filter=".photography"><a href="javascript:void(0)">photography</a></li>
                     <li data-filter=".architecture"><a href="javascript:void(0)">architecture</a></li>
                 </ul>
             </div>
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
                     <div class="copy_right">
                         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                         <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                         <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                     </div>
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
 						Booking
 					</span>


          <div class="wrap-input100 validate-input" data-validate="Username is required">
 						<span class="label-input100">Username</span>
 						<input class="input100" type="text" name="username"  readonly value="<?php echo $username ?>">
 						<span class="focus-input100"></span>
 					</div>

          <div class="wrap-input100 validate-input" data-validate="Username is required">
 						<span class="label-input100">Date</span>
 						<input class="input100" type="text" name="date"  >
 						<span class="focus-input100"></span>
 					</div>

          <div class="wrap-input100 validate-input" data-validate="Areas around Nairobi only">
 						<span class="label-input100">Venue</span>
 						<input class="input100" type="text" name="venue"  >
 						<span class="focus-input100"></span>
 					</div>

          <div class="wrap-input100 validate-input" data-validate="Username is required">
 						<span class="label-input100">Category</span>
 						<input class="input100" type="text" name="category"  >
 						<span class="focus-input100"></span>
 					</div>



 					<div class="container-login100-form-btn">
 						<div class="wrap-login100-form-btn">
 							<div class="login100-form-bgbtn"></div>
 							<button class="login100-form-btn" name="book">
 								Book
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
     $date = $_POST['date'];
     $venue = $_POST['venue'];
     $category = $_POST['category'];
     $sql2 = mysqli_query($con->conn, "UPDATE `booking` SET `date`='$date',`venue`='$venue',`category`='$category' WHERE username = '$username'");
     
     $stmt->execute();


 }
 ?>
