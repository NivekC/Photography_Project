<?php

session_start();
include('../DB/db.php');
if(!isset($_SESSION['username']))
{
    header("location:../login/login.php");
}
$Puserid = $_GET['userID'];


$con = new DBConnector;
    $username = $_SESSION['username'];

$userDetails = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");
while($row=mysqli_fetch_array($userDetails)){
    $ClientID = $row['UserID'];
  }
 $sql1 = mysqli_query($con->conn, "SELECT * FROM `photographers` WHERE UserID = '$Puserid'");



    while($row=mysqli_fetch_array($sql1)){
      $Photoid = $row['photographersID'];
    }

if(isset($_POST['book'])){

    $date = $_POST['date'];
    $venue = $_POST['venue'];
    $category = $_POST['category'];

    $booking = "INSERT INTO `booking`(`date`, `venue`, `category`, `photographerID`, `UserID`) VALUES ('$date','$venue','$category','$Photoid','$Puserid')";
    echo $booking;
    $sqlBook = mysqli_query($con->conn, "INSERT INTO `booking`(`date`, `venue`, `category`, `photographerID`, `UserID`) VALUES ('$date','$venue','$category','$Photoid','$ClientID')") or die("Error!".mysqli_error($con->conn));
    if($sqlBook)
    {
        header("location: index.php");
    }
    else
    {
                echo '<script language="javascript">';
                echo 'alert("Please Check your inputs once more")';
                echo '</script>';
    }
}
        $username = $_SESSION['username'];
        $sqls = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");
        while($row=mysqli_fetch_array($sqls)){
            $lesuserID = $row['UserID'];

        }
        $dates = date("Y/m/d");
        $resBooking =  mysqli_query($con->conn, "SELECT * FROM `booking` WHERE UserID = '$lesuserID' and notification = 1") or die("Error!: ".mysqli_error($con->conn));
        
        
        $not=0;
        if($resBooking->num_rows > 0)
        {
            while($row = $resBooking->fetch_assoc()) {
                $bookID = $row['bookID'];
                $photographerID = $row['photographerID'];
                $Bdate = $row['date']; 
                $notifyValue = $row['notification'];   
              if(strtotime($Bdate)<strtotime($dates))
                {
                    $not++;
                }    
            }
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
     <style>
         .notification {
  background-color: grey;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: 0px;
  right: 0px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}
     </style>
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
                            Gallery
                        </a>
                    </li>
                    <li >
                        <a href="photographers.php">
                            Photographers
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            contact
                        </a>
                    </li>
                    <li>
                        <a class="notification" class="active"  href="rating.php">
                            <span>Ratings</span>
                            <span class="badge"><?php if(isset($not)){if($not>=1&&$notifyValue==1){echo $not;}} ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="../authenticator/logout.php">
                            logout
                        </a>
                    </li>
                </ul>
            </div>
            <!--main menu end -->

   

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
 						Booking
 					</span>


          

          <div class="wrap-input100 validate-input" data-validate="Date is required">
 						<span class="label-input100">Date</span>
 						<input class="input100" type="date" name="date" min="2019-06-26" >
 						<span class="focus-input100"></span>
 					</div>

          <div class="wrap-input100 validate-input" data-validate="Areas around Nairobi only">
 						<span class="label-input100">Venue</span>
 						<input class="input100" type="text" name="venue"  >
 						<span class="focus-input100"></span>
 					</div>

          <div class="wrap-input100 validate-input" data-validate="Category is required">
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
