<?php
session_start();
include_once('../DB/db.php');
if(!isset($_SESSION['username']))
{
    header("location:../login/login.php");
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
    <title>Amani Photography</title>
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
                    <li class="active">
                        <a href="index.php">
                            Gallery
                        </a>
                    </li>
                  
                    <li>
                        <a href="services.php">
                            Services
                        </a>
                    </li>
                    <li>
                        <a href="portfolio.php">
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
                            Photos
                        </a>
                    </li>
                    <li>
                        <a href="photographers.php">
                            Photographers
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

            <!--filter menu -->
            <div class="side_menu_section">
                <h4 class="side_title">filter by:</h4>
                <ul  id="filtr-container"  class="filter_nav">
                    <li  data-filter="*" class="active"><a href="javascript:void(0)" >all</a></li>
                    <li data-filter=".branding"> <a href="javascript:void(0)">branding</a></li>
                    <li data-filter=".design"><a href="javascript:void(0)">design</a></li>
                    <li data-filter=".photography"><a href="javascript:void(0)">photography</a></li>
                    <li data-filter=".architecture"><a href="javascript:void(0)">Wedding</a></li>
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

                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <div class="portfolio">
                <div class="container-fluid">
                    <!--=================== masaonry portfolio start====================-->
                    <div class="grid img-container justify-content-center no-gutters">
                        <div class="grid-sizer col-sm-12 col-md-6 col-lg-3"></div>
                        <div class="grid-item branding  col-sm-12 col-md-6 col-lg-3">
                            <a href="../assets/img/image1.jpg" title="project name 1">
                                <div class="project_box_one">
                                    <img src="../assets/img/image1.jpg" alt="" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item  branding architecture  col-sm-12 col-md-6">
                            <a href="../assets/img/portfolio/home-port2.png" title="project name 2">
                                <div class="project_box_one">
                                    <img src="../assets/img/amani_wed.jpg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item  design col-sm-12 col-md-6 col-lg-3">
                            <a href="../assets/img/portfolio/home-port3.png" title="project name 5">
                                <div class="project_box_one">
                                    <img src="../assets/img/boat.jpg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item  photography design col-sm-12 col-md-6 col-lg-3">
                            <a href="../assets/img/portfolio/home-port4.png" title="project name 5">
                                <div class="project_box_one">
                                    <img src="../assets/img/lady.jpg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item  branding photography  col-sm-12 col-md-6 col-lg-3">
                            <a href="../assets/img/portfolio/home-port5.png" title="project name 5">
                                <div class="project_box_one">
                                    <img src="../assets/img/mama.jpg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item   architecture design col-sm-12 col-md-6 col-lg-3">
                            <a href="../assets/img/portfolio/home-port6.png" title="project name 5">
                                <div class="project_box_one">
                                    <img src="../assets/img/karurawed.jpg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item  photography architecture col-sm-12 col-md-6 col-lg-3">
                            <a href="../assets/img/portfolio/home-port7.png" title="project name 5">
                                <div class="project_box_one">
                                    <img src="../assets/img/wedding mama.jpeg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item  branding design  col-sm-12 col-md-6 col-lg-3">
                            <a href="../assets/img/portfolio/home-port8.png" title="project name 5">
                                <div class="project_box_one">
                                    <img src="../assets/img/town.jpg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="grid-item architecture  col-sm-12 col-md-6 col-lg-6">
                            <a href="../assets/img/portfolio/home-port9.png" title="project name 4">
                                <div class="project_box_one">
                                    <img src="../assets/img/wed2.jpg" alt="pro1" />
                                    <div class="product_info">
                                        <div class="product_info_text">
                                            <div class="product_info_text_inner">
                                                <i class="ion ion-plus"></i>
                                                <h4>project name</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--=================== masaonry portfolio end====================-->
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