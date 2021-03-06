<?php
session_start();
include('../DB/db.php');
if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}

        $con = new DBConnector; 
        $username = $_SESSION['username'];    
        $sql = mysqli_query($con->conn, "SELECT photographers.photographersID,photographers.UserID FROM `photographers` JOIN users ON users.UserID = photographers.UserID WHERE users.username = '$username'");
        while($row=mysqli_fetch_array($sql)){
            $PhotographersID = $row['photographersID'];

        }
        $query = "SELECT * FROM `booking` WHERE photographerID = '$PhotographersID'";
       
        $sql1 = mysqli_query($con->conn, "SELECT * FROM `booking` WHERE photographerID = '$PhotographersID'") or die("Error! ".mysqli_error($con->conn));
    
        while($row=mysqli_fetch_array($sql1)){
            $UserID = $row['UserID'];
            $date = $row['date'];
			$venue = $row['venue'];
			$category = $row['category'];
        }

        if(isset($UserID)){
        $res =  mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID =  '$UserID'");
        if($res->num_rows > 0)
        {
            while($row = $res->fetch_assoc()) {
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
                $username = $row['username'];
                $contact = $row['contact'];  
                $prof_pic = $row['prof_pic'];         
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style>
    #content{
        margin-top: 80px;
      }/*
      .crds{
        margin-left:10px;
        margin-right:10px;
      }*/
      .card-container {
        /*display: grid;
        padding: 1rem;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        grid-gap: 1rem;*/
       /* margin-right:10px;*/
    }
.card {
   /* position:absolute;*/
   margin-top: 250px;
    top:50%;
    left:15%;
    transform:translate(-50%,-50%);
    width:300px;
    min-height:400px;
    background:#fff;
    box-shadow:0 20px 50px rgba(0,0,0,.1);
    border-radius:10px;
    transition:0.5s;
    float:left;
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
    width: 1000px;
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
                            <a href="about.php">
                                About Me
                            </a>
                        </li>
                        <li>
                            <a href="services.php">
                                Services
                            </a>
                        </li>
                        <li class="active">
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
            <!--=================== filter portfolio start====================-->
<?php 
if(isset($UserID)){
    echo '
<section>
<div class="card">
    <div class="box">
        <div class="img">

            <img class="card-img-top img" src="'.$prof_pic.'" width="300" height="400" alt="Card image cap">
          </div>
            <hr>
            <h4 class ="card-title">'.$fname." ". $lname.'</h4>
            <div class="contents">
               <p class="card-text">Phone number: '.$contact.'</p>
              <p class="card-text">Email:  '.$email.'</p>
              <button type="button"  class="btn btn-sm btn-success" data-toggle="modal" data-target="'."#" . $UserID.'"  >Details</button>
            </div>
             
       </div>
     </div> 
  </section>
    
  
<div class="modal fade" id="'.$UserID.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="center-block col-sm-12" style = "position:center;.">
            <img src="'.$prof_pic.'" width="200" class="details img-responsive">
          </div>
          <div class="col-sm-12">
          <h4>'.$fname." ". $lname.'</h4>
          <p>Date booked: '.$date.'</p>
          <p>Venue: '. $venue.'</p>
          <p>Category: '.$category.'</p>
          <hr>
            <p>Email:  '.$email.'<a href="emailBooking.php?userID='.$UserID.'"><button class="btn btn-sm btn-primary">contact</button></a></p>
            <p>Phone number:  '. $contact.'<a href="smsBooking.php?userID='. $UserID.'"><button class="btn btn-sm btn-primary">contact</button></p>
           </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
    </div>
  </div>
</div>
</div>


  ';
} else {
    echo "Sorry No bookings available";
}
?>       
             
            </div>
            <!--=================== filter portfolio end====================-->
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
