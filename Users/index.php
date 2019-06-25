<?php
session_start();
include_once ('../DB/db.php');
if(!isset($_SESSION['username'])){
    header("location:../login/login.php");
}
$con = new DBConnector;

$uname = $_SESSION['username'];
$res =  mysqli_query($con->conn, "SELECT photographers.photographersID,photographers.UserID FROM `photographers` JOIN users ON users.UserID = photographers.UserID WHERE users.username = '$uname'");
if($res->num_rows > 0){
    while($row = $res->fetch_assoc()) {
      $pId = $row['photographersID']; 
      $puid = $row['UserID'];
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
        if($resBooking->num_rows > 0){
            while($row = $resBooking->fetch_assoc()) {
                $bookID = $row['bookID'];
                $photographerID = $row['photographerID'];
                $Bdate = $row['date']; 
                $notifyValue = $row['notification'];   
                if(strtotime($Bdate)<strtotime($dates)){
                    $not++;
                }    
            }
        } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include ('../include/ihead.php'); ?>
<link rel="stylesheet" href="../include/css/index.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<style>
        .red{
            color: #ff0000;
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
        <?php include ('../include/sidemenu.php'); ?>
        
        <!--=================== side menu end====================-->

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <div class="portfolio">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class='card-columns'>
                                <?php 
                                $ssql = "SELECT PhotographID,photographs,Category,PhotographersID,`status` FROM `gallery` WHERE `status` = 0 ORDER BY RAND() LIMIT 30";
                                
                                $sql = mysqli_query($con->conn,$ssql);
                                //print_r($sql);
                                    if($sql->num_rows > 0)
                                    {
                                        while($row = $sql->fetch_assoc()) {
                                        $category = $row['Category'];
                                        $images = $row['photographs'];
                                        $photoID = $row['PhotographersID'];
                                        $photosID = $row['PhotographID'];

                                        $sqlPhotographerDetails = "SELECT users.fname,users.lname,users.UserID FROM `photographers` JOIN users ON users.UserID = photographers.UserID WHERE photographers.PhotographersID = '$photoID'";
                                        $sqlPhotographer = mysqli_query($con->conn,$sqlPhotographerDetails);
                                            if($sqlPhotographer->num_rows > 0)
                                            {
                                                while($rows = $sqlPhotographer->fetch_assoc()) {
                                                $fname = $rows['fname'];
                                                $lname = $rows['lname'];
                                                $UserID = $rows['UserID'];
                                               }
                                            }
                                        echo "
                                        <div class='col-md-12'>
                                            <div class='card' style='width:20rem; '>
                                                <img src='../assets/$images' class='card-img-top'  alt='pro1' width='100%' height='300px' style='padding:10px;' ' />
                                                    <div class='card-body'>
                                                        <a href='reporting.php?photographersID=".$photoID."&photosID=".$photosID."'><i class='fa fa-warning red' style='font-size:24px;'></i></a>
                                                        <a href='portfolio.php?photographersID=".$photoID."&UserphotographersID=".$UserID."'><p class='btn btn-sm btn-primary' style='float: right;'> View ".$fname." profile</p></a>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                        ";
                                                                        
                                        }
                                    }
                                    
                                ?>
                            </div>
                        </div>
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
