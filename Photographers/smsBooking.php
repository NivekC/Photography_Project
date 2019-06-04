<?php
session_start();
include_once('../DB/db.php');

if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}

//photographers details
$con = new DBConnector;     
$username = $_SESSION['username'];
$sql1 = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");


while($row=mysqli_fetch_array($sql1)){
    $fname = $row['fname'];
    $lname = $row['lname'];
    $Pemail = $row['email'];
    }

//users details
if(isset($_GET['userID']))
{
    $UserID = $_GET['userID'];
    $res =  mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID =  '$UserID'");
if($res->num_rows > 0)
{
    while($row = $res->fetch_assoc()) {
       $Uemail = $row['email'];
       $contact = $row['contact']; 
             
    }
}
        $string = "+254". $contact; 
        $recipients = $string; 
}
        if(isset($_POST['submit'])){
            $contact = $_POST['contact'];
            $body = $_POST['body'];

          // Be sure to include the file you've just downloaded
          require_once('AfricasTalkingGateway.php');
          // Specify your authentication credentials
          $username   = "bloodorgan";
          $apikey     = "8a62463cde8793afb7b02a417334a81962e17ccd3c81a7254db1b656f6681835";
          // Specify the numbers that you want to send to in a comma-separated list
          // Please ensure you include the country code (+254 for Kenya in this case)

            $body = $body . "\r\n". "Please reply with the options below.". "\r\nPhone Number: ". $contact . "\r\nEmail Address: ". $Pemail;        

           // /var_dump($recipients);
          // And of course we want our recipients to know what we really do
          $message    = $body;
          // Create a new instance of our awesome gateway class
          $gateway    = new AfricasTalkingGateway($username, $apikey);
          /*************************************************************************************
            NOTE: If connecting to the sandbox:
            1. Use "sandbox" as the username
            2. Use the apiKey generated from your sandbox application
               https://account.africastalking.com/apps/sandbox/settings/key
            3. Add the "sandbox" flag to the constructor
            $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
          **************************************************************************************/
          // Any gateway error will be captured by our custom Exception class below, 
          // so wrap the call in a try-catch block
          try 
          { 
            // Thats it, hit send and we'll take care of the rest. 
            $results = $gateway->sendMessage($contact, $message);
                      
            foreach($results as $result2) {
              // status is either "Success" or "error message"
              echo " Number: " .$result2->number;
              echo " Status: " .$result2->status;
              echo " StatusCode: " .$result2->statusCode;
              echo " MessageId: " .$result2->messageId;
              echo " Cost: "   .$result2->cost."\n";
              header("location: index.php");
            }
          }
          catch ( AfricasTalkingGatewayException $e )
          {
             echo "Encountered an error while sending: ".$e->getMessage();
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
                    <li class="active">
                        <a  href="contact.php">
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
                                            Get in touch with the user
                                        </h3>
                                <form action="smsBooking.php" method="post">
                                    <div class="mt75 row justify-content-center">
                                            <div class="col-12">
                                                <input type="text" value="<?php echo $recipients?>" name="contact" placeholder="Contact" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <textarea  placeholder="Message" name="body" class="form-control" cols="4" rows="4"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="Submit" name="submit" class="btn btn-primary">Send</button>
                                            </div>
                                        </div>
                                </form>
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
<!--map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuahgsm_qfH1F3iywCKzZNMdgsCfnjuUA"></script>
<!-- Custom js -->
<script src="../assets/js/main.js"></script>
</body>
</html>
