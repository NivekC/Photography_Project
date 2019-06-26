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
$ssql = "SELECT photographs FROM `gallery` WHERE photographersID = $pId;";
$sql = mysqli_query($con->conn,$ssql);

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../folderB/modal.css">

    <style>
        #mdlbtn{
            height: 300px; width: 300px; margin: 5px; 
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
            <div class="portfolio">
                <div class="container-fluid">
                    <!--=================== masaonry portfolio start====================-->
                   
                            <!-- Button trigger modal -->
                            <button id="mdlbtn" style="" class="btn btn-default" onclick="document.getElementById('id01').style.display='block'" style="width:auto; text-align: center"><span>
                            <h5 style="font-size:20px;" >Add Photographs</h5>
                            <i style="font-size:70px;" class="material-icons">add</i></span></button>
                     
                            <!-- Modal -->
                            <div id="id01" class="modal" >
                                <form class="modal-content animate md-form" action="upload.php" method="POST" enctype="multipart/form-data">
                                    <div class="imgcontainer">
                                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                        <h1>Add Photographs</h1>
                                    </div>

                                <div class="container">
                                    <label for="uname"><b>Category</b></label>
                                    <input type="text" placeholder="Enter category" name="category" required>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="fileToUpload[]" id="inputGroupFile01"
                                            aria-describedby="inputGroupFileAddon01" multiple >
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                   
                                <button class="btn btn-primary" name="submit"  style="text-align: center;width: auto;padding: 10px 18px; " type="submit">Save</button>
                            </div>
                            
                                <div class="container" style="background-color:#f1f1f1">
                                <button class="btn btn-danger" style=" width: auto;padding: 10px 18px;" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                
                                </div>
                            </form>
                            </div>
                
                    <!--=================== masaonry portfolio end====================-->
        <?php 
            if($sql->num_rows > 0)
            {
                while($row = $sql->fetch_assoc()) {
                $images = $row['photographs'];
                echo "<a href='$images' title='project name 1'>";
                echo "<img src='../assets/$images'  alt='pro1'  width='300px;' height='300px;' style='margin: 5px;'/> ";
                echo "</a>";
                echo "  ";        
                }
            }
        ?>
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
