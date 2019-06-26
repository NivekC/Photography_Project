<?php

session_start();
include_once ('../DB/db.php');
if(!isset($_SESSION['username'])){
    header("location:../login/login.php");
}
$con = new DBConnector;
$PhotographID = $_GET['photographersID'];
$UserPhotographID = $_GET['UserphotographersID'];

$sql = mysqli_query($con->conn, "SELECT * FROM `photographers`  WHERE photographersID = '$PhotographID'");
while($row=mysqli_fetch_array($sql)){
  
    $bio = $row['Description'];
}    



$sql1 = mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID = '$UserPhotographID'");
//print_r($sql1);
while($rows=mysqli_fetch_array($sql1)){
    $fname = $rows['fname'];
    $lname = $rows['lname'];
    $email = $rows['email'];
    $username = $rows['username'];
    $contact = $rows['contact'];
    $prof_pic = $rows['prof_pic'];

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

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <div>
                <div class="img_card">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-7 content_section">
                            <!--=================== contact info and form start====================-->
                            <div class="content_box">
                                <div class="content_box_inner">
                                    <div>
                                        <h3>
                                            <?php echo $fname ." ".$lname ?>
                                        </h3>

                                        <img src="<?php echo $prof_pic?>" width="250px" height="250px" alt="Picture not Available">

                                        <ul class="nosyely_list pt50">
                                            <li>
                                                <div class="img_box_two">
                                                    <img src="../assets/img/icons/scheme.png" alt="info list">
                                                    <div class="content align-items-center">
                                                        <p><h5>
                                                        <?php echo $email?>
                                                          </h5>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_box_two">
                                                    <img src="../assets/img/icons/smartphone.png" alt="info list">
                                                    <div class="content align-items-center">
                                                        <p>
                                                            <h5>
                                                                <?php echo $contact?>
                                                            </h5>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul><br>
                                        <h5>
                                            
                                            <?php echo "<h4><b>Biography</b><h4>"; echo $bio?>
                                        </h5><br>
                                        <?php
                                            $sqlServices = mysqli_query($con->conn, "SELECT * FROM `services`  WHERE photographerID = '$PhotographID'");
                                            while($row=mysqli_fetch_array($sqlServices)){
                                            
                                                $category = $row['category'];
                                                $description = $row['description'];
                                                $minCash = $row['minCash'];
                                                $maxCash = $row['maxCash'];

                                            echo "<h5><b>".$category."</b></h5>";
                                            echo "<h5>".$description."</h5>";
                                            echo "<h5><b>".$maxCash."ksh  -  ".$minCash."ksh</b></h5>";

                                            }
                                        ?>

                                        <?php
                                        $sqlImages = mysqli_query($con->conn, "SELECT * FROM `gallery`  WHERE photographersID = '$PhotographID'");
                                        while($row=mysqli_fetch_array($sqlImages)){
                                          
                                            $pictures = $row['photographs'];
                                    
                                        echo "
                                        <div class='col-md-12'>
                                            <div class='card' style='width:20rem; '>
                                                <img src='$pictures' class='card-img-top'  alt='pro1' width='100%' height='300px' style='padding:10px;' ' />
                                                    <div class='card-body'>
                                                       
                                        
                                                    </div>
                                            </div>
                                        </div>
                                        
                                        ";
                                        }?>

                
                                    </div>
                                </div>
                            </div>
                            <!--=================== contact info and form end====================-->
                        </div>
                        <div class="col-md-6 col-5 img_section" style="background-image: url('../assets/img/bg/service_bg.png');"></div>
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
