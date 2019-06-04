<?php
session_start();
include('../DB/db.php');
if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}

if(isset($_POST['update'])){
    header("Refresh:0");
}

        $con = new DBConnector;
        $username = $_SESSION['username'];
        $sqls = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");
        //print_r($sqls);
        while($row=mysqli_fetch_array($sqls)){
            $lesuserID = $row['UserID'];
        }
        $dates = date("Y/m/d");
        $resBooking =  mysqli_query($con->conn, "SELECT * FROM `booking` WHERE UserID = '$lesuserID' and notification = 1") or die("Error!: ".mysqli_error($con->conn));

       // print_r($resBooking);
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
        

        
       
        
?>
<?php


if(isset($_POST['saveReview']))
{
    $pId = $_POST['lephotographersID'];
    $ratingNo = $_POST['ratings'];
    $comments = $_POST['comment'];
    $BID = $_POST['bookid'];
    $rate = "INSERT INTO `rating`(`ratingStars`, `comments`, `photographID`) VALUES ('$ratingNo','$comments','$pId')";
    
    $resRating =  mysqli_query($con->conn, "INSERT INTO `rating`(`ratingStars`, `comments`, `photographID`) VALUES ('$ratingNo','$comments','$pId')") or die("Error!: ".mysqli_error($con->conn));
    $resNotification = mysqli_query($con->conn, "UPDATE `booking` SET `notification` = 0 WHERE `booking`.`bookID` = '$BID'");
    if($resRating && $resNotification)
    {
        header("location: index.php");
    }
}
if(isset($_POST['cancel']))
{
    
    $bookingID = $_POST['bookingID'];
    $lePhotoID = $_POST['lePhotoID'];
    $cancelRating = mysqli_query($con->conn,"UPDATE `booking` SET `notification`= 0 WHERE `photographerID`= '$lePhotoID' and `bookID`= '$bookingID'");
    if($cancelRating)
    {
        header("Refresh:0");
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
    #content{
        margin-top: 80px;
      }/*
      .crds{
        margin-left:10px;
        margin-right:10px;
      }*/
      .card-container {
        display: grid;
        padding: 1rem;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        grid-gap: 1rem;*/
       margin-right:10px;
    }
    .mainBody{
        width: 50px;
    }
.card {
   /* position:absolute;*/
    margin-top: 250px;
    top:50%;
    left:10%;
    transform:translate(-50%,-50%);
    width:300px;
    min-height:400px;
    background:#fff;
    box-shadow:0 20px 50px rgba(0,0,0,.1);
    border-radius:10px;
    transition:0.5s;
    float:right;
    margin-right:50px;
}
.card:hover {
    box-shadow:0 30px 70px rgba(0,0,0,.2);
}
.card .box {
    position:absolute;
    top:50%;
    left:0;
    transform:translateY(-50%);
    text-align:center;
    padding:20px;
    box-sizing:border-box;
    width:100%;
}
.card .box .img {
    width:120px;
    height:120px;
    margin:0 auto;
    border-radius:50%;
    overflow:hidden;
}
.card .box .img img {
    width:100%;
    height:100%;
}
.card .box h2 {
    font-size:20px;
    color:#262626;
    margin:20px auto;
}
.card .box h2 span {
    font-size:14px;
    background:#e91e63;
    color:#fff;
    display:inline-block;
    padding:4px 10px;
    border-radius:15px;
}
.card .box p {
    color:#262626;
}
.card .box span {
    display:inline-flex;
}
.card .box ul {
    margin:0;
    padding:0;
}
.card .box ul li {
    list-style:none;
    float:left;
}
.card .box ul li a {
    display:block;
    color:#aaa;
    margin:0 10px;
    font-size:20px;
    transition:0.5s;
    text-align:center;
}
.card .box ul li:hover a {
    color:#e91e63;
    transform:rotateY(360deg);
    }
.container
{
    margin-top: -600px;
    margin-left: 250px;
    width: 100%;
    margin-bottom: 50px;
}
.img-fluid{
        width: 1150px;
        height: 600px;
       /* border: 2px solid black;*/
        border-radius: 5px;
        padding: 8px;
        margin-top: 20px;
      }
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

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <!--=================== filter portfolio start====================
            <form action="#" method="POST">
                <input type="text" name="txt" vale="rate">
              <button type="button" class="btn btn-sm btn-danger" name="cancel"  style="float: right;">Cancel</button>
            </form>-->
            
<?php 

$con = new DBConnector;
$username = $_SESSION['username'];
$sqls = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");
//print_r($sqls);
while($row=mysqli_fetch_array($sqls)){
    $lesuserID = $row['UserID'];
}

$dates = date("Y/m/d");
$rDee = "SELECT * FROM `booking` WHERE UserID = '$lesuserID' and notification = 1";

$resBooking =  mysqli_query($con->conn, "SELECT * FROM `booking` WHERE UserID = '$lesuserID' and notification = 1") or die("Error!: ".mysqli_error($con->conn));

if($resBooking->num_rows > 0)
{
    while($row = $resBooking->fetch_assoc()) {
        $bookID = $row['bookID'];
        $photographerID = $row['photographerID'];
        $Bdate = $row['date']; 
        $notifyValue = $row['notification'];   
       
        if(isset($notifyValue)){
            $res =  mysqli_query($con->conn, "SELECT photographers.photographersID,photographers.UserID FROM `photographers` JOIN users ON users.UserID = photographers.UserID WHERE photographersID = '$photographerID'");
        if($res->num_rows > 0)
        {
            while($rows = $res->fetch_assoc()) {
            $pUserId = $rows['UserID'];
            $pId = $rows['photographersID'];
            $sql1 = mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID = '$pUserId'"); 
            while($row=mysqli_fetch_array($sql1)){
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $username = $row['username'];
                $contact = $row['contact'];
                $prof_pic = $row['prof_pic'];
                
                
                    echo '
                    <section>
                    <div class="card">
                        <div class="box">
                            <div class="img">
                                <img class="card-img-top img" src="../assets/'. $prof_pic .'" width="200" height="400" alt="Card image cap">
                            </div>
                                <hr>
                                <h4 class ="card-title">'.$fname.' '.$lname.'</h4>
                                <div class="contents">
                                    <p class="card-text">Phone number: '.$contact.'</p>
                                    <p class="card-text">Email:  '.$email .'</p>
                                    <button type="button"  class="btn btn-sm btn-success" style="float: left;" data-toggle="modal" data-target="' . "#" .$pUserId.'" >Rate</button>
                                    <form action="rating.php" method="POST">
                                        <input type="hidden" name="bookingID" value="'.$bookID.'">
                                        <input type="hidden" name="lePhotoID" value="'.$pId.'">
                                        <button  class="btn btn-sm btn-danger" name="cancel"  style="float: right;" onclick="confirm(`Do you want to cancel the ratings ?`);">Cancel</button>
                                    </form>
                                </div>
                        </div> 
                    </div>
                    </section>

                    <div class="container">
                        <div class="modal fade" id="'. $pUserId.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="margin-left: 350px;" id="exampleModalLongTitle">Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group" id="rating-ability-wrapper">
                                            <form action="rating.php" method="post">
                                                    <input type="hidden" name="lephotographersID" value="'.$pId.'">
                                                    <label class="control-label" for="rating">
                                                    <span class="field-label-header">How would you rate your photographer</span><br>
                                                    <span class="field-label-info"></span>
                                                    <input type="hidden" id="selected_rating" name="selected_rating" value="" required="required">
                                                    </label>
                                                    <h2 class="bold rating-header" style="">
                                                    <span class="selected-rating">0</span><small> / 5</small>
                                                    </h2>
                                                    <input type="hidden" name="ratings" id="ratings">
                                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                    <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </button>
                                                <div class="form-group">
                                                    <input type="hidden" name="bookid" value="'.$bookID.'" >
                                                    <label for="comment">Comment*</label>
                                                    <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-info" name="saveReview" id="saveReview">Save Review</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <a href="book.php?userID=<?php echo $userID?>" ><button type="button" class="btn btn-primary" >Book</button></a>
                            </div>
                        </div>
                    </div>
                    ';
                    }   
                }
            }    
        }
    }
} else {
    echo "No ratings avalable";
}
?>          

             
            </div>
            <!--=================== filter portfolio end====================-->
        </div>
        <!--=================== content body end ====================-->
    </div>
</div>


<script>
	jQuery(document).ready(function($){
	    
        $(".btnrating").on('click',(function(e) {
        
        var previous_value = $("#selected_rating").val();
        
        var selected_value = $(this).attr("data-attr");
        $("#selected_rating").val(selected_value);
        $("#ratings").val(selected_value);
        
        $(".selected-rating").empty();
        $(".selected-rating").html(selected_value);
        $("#ratings").html(selected_value);
        
        for (i = 1; i <= selected_value; ++i) {
        $("#rating-star-"+i).toggleClass('btn-warning');
        $("#rating-star-"+i).toggleClass('btn-default');
        }
        
        for (ix = 1; ix <= previous_value; ++ix) {
        $("#rating-star-"+ix).toggleClass('btn-warning');
        $("#rating-star-"+ix).toggleClass('btn-default');
        }
        
        }));
        
            
    });
    
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

