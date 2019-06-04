<?php
session_start();
include('../DB/db.php');
if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}


		$con = new DBConnector;     
        $username = $_SESSION['username'];
        $sql1 = mysqli_query($con->conn, "SELECT UserID FROM `users` WHERE username = '$username'");
        

        while($row=mysqli_fetch_array($sql1)){
            $userID = $row['UserID'];
        }
        $sql = mysqli_query($con->conn, "SELECT * FROM `photographers` WHERE UserID = '$userID'");
        while($row=mysqli_fetch_array($sql)){
           
            $photographerID = $row['photographersID'];
			$bio = $row['Description'];

        }
        $sqlRating = mysqli_query($con->conn, "SELECT * FROM `rating` WHERE UserID = '$userID'");
        $bo = "";
        
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
                    <li class="active">
                        <a href="about.php">
                            About Me
                        </a>
                    </li>
                    <li>
                        <a href="services.php">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="booking.php">
                            Bookings
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="contact.php">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="../authenticator/logout.php">
                            logout
                        </a>
                    </li>
                </ul>
            </div>
            <!--main menu end -->            <!--filter menu -->

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

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <div>
                <div class="img_card">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-7 content_section">
                            <div class="content_box">
                                <div class="content_box_inner">
                                    <div>
                                        
                                        <h3>
                                            Just a few words about Me
                                        </h3>
                                        <p><?php
                                        if(empty($bio))
                                        {
                                            echo "<h4>Visit the <a href='profile.php'>profile</a> to add a your Bio</a></h4>";
                                        }else {
                                            echo $bio;
                                            
                                        }
                                        ?>
                                        <!--=================== counter start====================-->
                                        <div class="pt50">
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-md-4">
                                                    <div class="counter_box">
                                                        <div class="divider"></div>
                                                        <span class="counter">4</span>
                                                        <h5>Years of experience</h5>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="counter_box">
                                                        <div class="divider"></div>
                                                        <span class="counter">30</span>
                                                        <h5>happy clients</h5>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="counter_box">
                                                        <div class="divider"></div>
                                                        <span class="counter">102</span>
                                                        <h5>projects completed</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--=================== counter end====================-->
                                    </div>
                                    <!--===================testimonial start====================-->
                                    <div class="testimonial_carousel mt50">

                                        <div class="testimonial_box">
                                            <p>
                                                We strive to offer good and pleasant services to all customers
                                            <div class="testimonial_author">
                                                <img src="../assets/img/user.png" alt="author">
                                                <h5>maria smith</h5>
                                                <p>project manager <span>company</span></p>
                                            </div>
                                        </div>

                                        <div class="testimonial_box">
                                            <p>
                                                Amani photography offered me great service during my wedding. I'd recommend them to anyone since I believe in their work
                                            </p>
                                            <div class="testimonial_author">
                                                <img src="../assets/img/clown.jpg" alt="author">
                                                <h5>Ngugi Isaac</h5>
                                                <p>Client <span></span></p>
                                            </div>
                                        </div>

                                        <div class="testimonial_box">
                                            <p>

                                            </p>
                                            <div class="testimonial_author">
                                                <img src="../assets/img/user.png" alt="author">
                                                <h5>maria smith</h5>
                                                <p>Client <span>company</span></p>
                                            </div>
                                        </div>

                                        <div class="testimonial_box">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus.
                                            </p>
                                            <div class="testimonial_author">
                                                <img src="../assets/img/user.png" alt="author">
                                                <h5>maria smith</h5>
                                                <p>project manager <span>company</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--===================testimonial end====================-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-5 img_section" style="background-image: url('../assets/img/bg/about.png');"></div>
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
