<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once('../DB/db.php');

if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}

            //photographers details
            $con = new DBConnector;     
            $username = $_SESSION['username'];
            $sqlAdmin = mysqli_query($con->conn, "SELECT * FROM `users` WHERE access_level = 1");
            while($row=mysqli_fetch_array($sqlAdmin)){
                $adminEmail = $row['email'];
                }
            $sqlUser = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '$username'");
            while($row=mysqli_fetch_array($sqlUser)){
                $UserEmail = $row['email'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                }
        //Get details from the form
        if(isset($_POST['submit'])){           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $body = $_POST['body'];



//Load Composer's autoloader
require '../assets/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kiplelisaac@gmail.com';                 // SMTP username
    $mail->Password = 'Chepkurui1998';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;
    $mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true
)
);                                    // TCP port to connect to


    $message1 = $body . "<br>" . "<br>"."Name: ". $fname ." " .$lname . "<br>"."Please reply to this email. "."<br>" ."Thank You ". "<br>" . $UserEmail;
 
 

    //Recipients
    $mail->setFrom($email, $fname);
    $mail->addAddress($email);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message1;
    $mail->AltBody = $message1;

    $mail->send();
    header("location: index.php");
    echo 'Message has been sent';
    
}
catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

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
                                            Get in touch with us
                                        </h3>



                                        <ul class="nosyely_list pt50">
                                            <li>
                                                <div class="img_box_two">
                                                    <img src="../assets/img/icons/satelite.png" alt="info list">
                                                    <div class="content align-items-center">
                                                        <p>
                                                        <h5>
                                                            Ronald Ngala ST , No234/56<br/>
                                                            Nairobi , KENYA
                                                        </h5>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="img_box_two">
                                                    <img src="../assets/img/icons/scheme.png" alt="info list">
                                                    <div class="content align-items-center">
                                                        <p>
                                                        <h5>
                                                          Amaniphotography@gmail.com
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
                                                            +254706492324
                                                        </h5>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <form action="contact.php" method="post">
                                        <div class="mt75 row justify-content-center">
                                            <div class="col-lg-6 col-12">
                                                <input type="text" placeholder="Name" name="name" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <input type="email" placeholder="E-Mail" name="email" value="<?php echo $adminEmail?>" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <input type="text" placeholder="Subject" name="subject" class="form-control">
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
