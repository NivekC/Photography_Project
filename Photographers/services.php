<?php
session_start();
include_once('../DB/db.php');
if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}

$con = new DBConnector;
$uname = $_SESSION['username'];
$res =  mysqli_query($con->conn, "SELECT photographers.photographersID FROM `photographers` JOIN users ON users.UserID = photographers.UserID WHERE users.username = '$uname'");
if($res->num_rows > 0)
{
    while($row = $res->fetch_assoc()) {
      $pId = $row['photographersID'];           
    }
}
if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $description = $_POST['description'];
    $minCash = $_POST['minCash'];
    $maxCash = $_POST['maxCash'];

  
    echo $minCash;
    echo $maxCash;
    

        $ssql = "INSERT INTO `services`(`category`, `description`, `photographerID`,`minCash`,`maxCash` VALUES ('$category','$description','$pId','$minCash','$maxCash')";
        echo $ssql;
        $sql = mysqli_query($con->conn,$ssql);
        if($sql === true){
           echo "Twaz Successfull";
            header('location:services.php');
        }
        
        
    }

    
    $ssql01 = "SELECT * FROM `services` WHERE photographerID = '$pId'";
    $sql02 = mysqli_query($con->conn,$ssql01);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/modal/modal.css">
    <style>
        #mdlbtn{
            height: 300px; 
            background-color: white;
            color: black;
            border: 2px solid #555555;
        }
        #mdlbtn:hover{
            background-color: #555555;
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

    <!--=================== menu Button show in small screens ====================-->
    <a class="menu-btn" href="javascript:void(0)">
        <i class="ion ion-grid"></i>
    </a>
    <!--=================== menu Button end====================-->

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
                        <a href="about.php">
                            About Me
                        </a>
                    </li>
                    <li class="active">
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

            <!--filter menu -->


            <div class="side_menu_section">


            <!--filter menu end -->


            <!--social and copyright -->

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
            
<!--=================== image card start here  (has two section left and right )====================-->
                <div class="img_card">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-7 content_section">
                        
                            <div class="content_box">
                                <div class="content_box_inner">
                                    <div class="row justify-content-center">
<!--=================== services boxes start here  ====================-->
                                <div class="col-md-6 col-12">
                                <div class="img_box_one text-left">
                                    <div class="content">
                                    <button id="mdlbtn" style="width:250px;" class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'" style="width:auto; text-align: center"><span>
                                    <h5>Add Service</h5><img src="https://img.icons8.com/ios/50/000000/plus-math-filled.png"></span></button>
                                            <div id="id01" class="modal">
  
                                                    <form class="modal-content animate md-form" action="services.php" method="POST">
                                                      <div class="imgcontainer">
                                                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                                        <h1>Add Session</h1>
                                                      </div>
                                                  
                                                      <div class="container">
                                                        <label for="uname"><b>Category</b></label>
                                                        <input type="text" placeholder="Enter category" name="category" required>
                                                  
                                                        <div class="form-group shadow-textarea">
                                                          <label for="exampleFormControlTextarea6"><b> Enter the description of the service</b></label>
                                                          <textarea class="form-control z-depth-1" name="description" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
                                                        </div>
                                                        <label for="price"><b>State the price range for the service</b></label>
                                                        <div class="col-lg-6">
                                                            <input type="text"name="minCash"  placeholder="Min Cash in KSH" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 ">
                                                            <input type="text" name="maxCash" placeholder="Max Cash in KSH" class="form-control">
                                                        </div>
                                                          
                                                        
                                                      </div>
                                                  
                                                      <div class="container" style="background-color:#f1f1f1">
                                                        <button class="btn btn-sm btn-danger" style=" width: auto;padding: 10px 18px;" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                                        <button class="btn btn-primary" name="submit"  style="text-align: center;float:right;width: auto;padding: 10px 18px; " type="submit">Save</button>
                                                      </div>
                                                    </form>
                                                  </div>
                                        
                                    </div>
                                    </div>
                                </div>

                                        
                                            <div class="img_box_one text-left">     
                                                <div class="content">
                                                <?php 
                                                    if($sql02->num_rows > 0)
                                                    {
                                                        while($row = $sql02->fetch_assoc()) {
                                                        $category = $row['category'];
                                                        $description = $row['description'];
                                                        echo "<h5>$category</h5>";
                                                        echo "<p>$description</p>"; 
                                                        
                                                        echo "<br>";
                                                        }
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                       
                                        <!--=================== services boxes end here  ====================-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-5 img_section" style="background-image: url('../assets/img/bg/service_bg.png');"></div>
                    </div>
                </div>
<!--=================== image card end here ====================-->
            </div>
        </div>
        <!--=================== content body end ====================-->
    </div>
</div>

<script>
        // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
</script>

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
