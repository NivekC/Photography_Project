<?php
    session_start();
    include('../DB/db.php');
    if(!isset($_SESSION['username']))
    {
        header("location:../authenticator/login.php");
    }

    if(isset($_GET['photographersID']) && $_GET['photosID']){
        $photographerID = $_GET['photographersID'];
        $photosID = $_GET['photosID'];
    }
    
    $con = new DBConnector; 
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
              if($Bdate<$dates)
                {
                    $not++;
                }    
            }
        }

    if(isset($_POST['report'])){
        $photographerID = $_POST['photographerID'];
        $PhotographID = $_POST['PhotographID'];
        $title = $_POST['title'];
        $reason = $_POST['reason'];
        $sqlReport = mysqli_query($con->conn,"INSERT INTO `reports`(`title`, `description`,`photographerID`, `photographsID`) VALUES ('$title','$reason','$photographerID','$PhotographID')");
        
        if($sqlReport){
            header('location:index.php');
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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    

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
                                <form action="reporting.php" method="POST">
                                    <div class="mt75 row justify-content-center">
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <label for="form" style="font-size:25px;"> <strong>Report</strong></label>
                                                    <input type="hidden" name="photographerID" value="<?php echo $photographerID?>" >
                                                    <input type="hidden" name="PhotographID" value="<?php echo $photosID?>" >
                                                    <input type="text" name="title" placeholder="Title" class="form-control">
                                                    <label for="comment">Write briefly on cause of report</label>
                                                        <textarea  placeholder="Reason" name="reason" class="form-control" cols="4" rows="4" required></textarea>
                                                    <button type="Submit" name="report" class="btn btn-primary">Send</button>                                                                
                                                </div>
                                            </div>
                                     
                                                
                                        </div>
                                </form>
                                        
                                        
                                       
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
<!--map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuahgsm_qfH1F3iywCKzZNMdgsCfnjuUA"></script>
<!-- Custom js -->
<script src="../assets/js/main.js"></script>
</body>
</html>


