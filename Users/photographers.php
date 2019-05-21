<?php
session_start();
include('../DB/db.php');
<<<<<<< HEAD
if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}
=======
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a

if(isset($_POST['update'])){
    header("Refresh:0");
}

<<<<<<< HEAD
		$con = new DBConnector;     
        $sql = mysqli_query($con->conn, "SELECT * FROM `photographers`");
        while($row=mysqli_fetch_array($sql)){
           
            $bio = $row['Description'];
            $userID = $row['UserID'];

        }
        $sql1 = mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID = '$userID'");
        

        while($row=mysqli_fetch_array($sql1)){
            $fname = $row['fname'];
=======
		$con = new DBConnector;
    $sql = mysqli_query($con->conn, "SELECT * FROM `photographers`");
    while($row=mysqli_fetch_array($sql)){

        $bio = $row['Description'];
        $userID  = $row['UserID'];

    }
        $sql1 = mysqli_query($con->conn, "SELECT * FROM `users` WHERE `UserID` = $userID ");


      while($row=mysqli_fetch_array($sql1)){
      $fname = $row['fname'];
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
			$lname = $row['lname'];
			$email = $row['email'];
			$username = $row['username'];
			$contact = $row['contact'];

        }

<<<<<<< HEAD
        $res =  mysqli_query($con->conn, "SELECT photographers.photographersID FROM `photographers` JOIN users ON users.UserID = photographers.UserID ");
        if($res->num_rows > 0)
        {
            while($row = $res->fetch_assoc()) {
              $pId = $row['photographersID'];           
            }
        }
        $res1 = "SELECT photographs FROM `gallery` WHERE photographersID = 1;";
        $res2 = mysqli_query($con->conn,$res1);
        
       
    
	   
=======


>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
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
<<<<<<< HEAD
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style>
    #content{
=======
<<<<<<< HEAD
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style(2).css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
=======
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      #content{
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
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
    left:10%;
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
<<<<<<< HEAD
    
    </style>
=======

   </style>
>>>>>>> 34ae1e1f57dfece46b237a5c8d09ebdd8b6be23d
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
</head>
<body>
<!-- <div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div> -->

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
                            <a href="book.php">
                                Photos
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
                    <li data-filter=".architecture"><a href="javascript:void(0)">architecture</a></li>
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


<section>
  <div class="card">
      <div class="box">
          <div class="img">

              <img class="card-img-top img" src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $image ); ; ?>" width="200" height="400" alt="Card image cap">
            </div>
              <hr>
              <h4 class ="card-title"><?php echo $fname." ". $lname?></h4>
              <div class="contents">
                 <p class="card-text">Phone number: 0<?php echo $contact; ?></p>
                <p class="card-text">Email:  <?php echo $email; ?></p>
                <?php echo $userID ?>
                <button type="button"  class="btn btn-sm btn-success" data-toggle="modal" data-target="<?php echo "#$userID";?>"  >Details</button>
              </div>

         </div>
       </div>
    </section>

  <div class="modal fade" id="<?php echo "$userID";?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="center-block col-sm-12" style = "position:center;.">
                <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $image ); ; ?>" width="200" class= "details img-responsive">
              </div>
              <div class="col-sm-12">
              <h4><?php echo $firstname." ". $lastname?></h4>
               <h5><?php echo $type?></h5>
              <p><?php echo $description; ?></p>
                <hr>
                 <p>Phone number: 0<?php echo $phone; ?></p>
                <p>Email:  <?php echo $email; ?></p>
                <p>Location:  <?php echo $constituency.", ".$ward; ?></p>
               </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url('bk/booking_view'); ?> " ><button type="button" class="btn btn-primary" >Book</button></a>
        </div>
      </div>
    </div>
  </div>

            <!--=================== filter portfolio start====================-->
<<<<<<< HEAD
           
<section>
=======
            <!-- <div class="portfolio gutters grid img-container">
                <div class="grid-sizer col-sm-12 col-md-6 col-lg-3"></div>
                <section>
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
<div class="card">
    <div class="box">
        <div class="img">

<<<<<<< HEAD
            <img class="card-img-top img" src="<?php echo $fname; ?>" width="200" height="400" alt="Card image cap">
          </div>
            <hr>
            <h4 class ="card-title"><?php echo $fname." ". $lname?></h4>
            <div class="contents">
               <p class="card-text">Phone number: <?php echo $contact; ?></p>
              <p class="card-text">Email:  <?php echo $email; ?></p>
            <?php echo $userID ?>
              <button type="button"  class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal"  >Details</button>
=======
            <img class="card-img-top img" src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $image ); ; ?>" width="200" height="400" alt="Card image cap">
          </div>
            <hr>
            <h4 class ="card-title"><?php echo $firstname." ". $lastname?></h4>
            <h5><?php echo $type?></h5>
            <div class="contents">
               <p class="card-text">Phone number: 0<?php echo $phone; ?></p>
              <p class="card-text">Email:  <?php echo $email; ?></p>
              <p class="card-text">Location:  <?php echo $constituency.", ".$ward; ?></p>
             
              <button type="button"  class="btn btn-sm btn-success" data-toggle="modal" data-target="<?php echo "#$id";?>"  >Details</button>
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
            </div>
             
       </div>
     </div> 
  </section>

<<<<<<< HEAD
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
=======
<div class="modal fade" id="<?php echo "$id";?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="center-block col-sm-12" style = "position:center;.">
<<<<<<< HEAD
              <img src="<?php echo $fname ?>" width="200" class= "details img-responsive">
            </div>
            <div class="col-sm-12">
            <h4><?php echo $fname." ". $lname?></h4>
            <p><?php echo $bio; ?></p>
            <?php 
            if($sql->num_rows > 0)
            {
                while($row = $res2->fetch_assoc()) {
                $images = $row['photographs'];
                echo "<img src='$images'  alt='pro1'  width='300px;' height='300px;' style='margin: 5px;'/> ";
                echo "  ";        
                }
            }
        ?>
              <hr>
               <p>Phone number: <?php echo $contact; ?></p>
              <p>Email:  <?php echo $email; ?></p>
=======
              <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode( $image ); ; ?>" width="200" class= "details img-responsive">
            </div>
            <div class="col-sm-12">
            <h4><?php echo $firstname." ". $lastname?></h4>
             <h5><?php echo $type?></h5>
            <p><?php echo $description; ?></p>
              <hr>
               <p>Phone number: 0<?php echo $phone; ?></p>
              <p>Email:  <?php echo $email; ?></p>
              <p>Location:  <?php echo $constituency.", ".$ward; ?></p>
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<<<<<<< HEAD
        <a href="book.php?userID=<?php echo $userID?>" ><button type="button" class="btn btn-primary" >Book</button></a>
      </div>
    </div>
  </div>
</div>

             
            </div>
=======
        <a href="<?php echo base_url('bk/booking_view'); ?> " ><button type="button" class="btn btn-primary" >Book</button></a>
      </div>
    </div>
  </div>
</div>

               <!-- <div class="grid-item branding  col-sm-12 col-md-6 col-lg-3">
                    <a href="../assets/img/fashion 1.jpeg" title="project name 1" >
                        <div class="project_box_one">
                            <img src="../assets/img/Photographer 1.jpeg"  />
                            <div class="product_info">
                                <div class="product_info_text">
                                    <div class="product_info_text_inner">
                                        <i class="ion ion-plus"></i>
                                        <h4>My projects</h4>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </a>



                    <div class="book">
                      <a href='book.php' name="submit" value="Book" class="btn btn-primary"> Book Me</button></a>
                    </div>

                    <div class="row">
<div class="col-sm-12">
<form id="ratingForm" method="POST">
<div class="form-group">
<h4>Rate Me</h4>
<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<input type="hidden" class="form-control" id="rating" name="rating" value="1">
<input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678">
</div>

<div class="form-group">
<label for="comment">Comment*</label>
<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
</div>
</form>
</div>
</div>

                </div>

                <div class="grid-item  branding architecture  col-md-6 col-lg-3">
                    <a href="../assets/img/portfolio/photographer 2.jpeg" title="project name 2">
                        <div class="project_box_one">
                            <img src="../assets/img/photographer 2.jpeg"  />
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

                    <div class="book">
                      <button type="Submit" name="submit" value="Book" class="btn btn-primary"> Book Me </button>
                    </div>

                </div>

                <div class="grid-item  design col-sm-12 col-md-6 col-lg-3">
                    <a href="../assets/img/portfolio/photographer 3.jpeg" title="project name 5">
                        <div class="project_box_one">
                            <img src="../assets/img/photographer 3.jpeg"  />
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

                    <div class="book">
                      <button type="Submit" name="" value="Book" class="btn btn-primary"> Book Me</button>
                    </div>

                </div>
                <div class="grid-item  photography design col-sm-12 col-md-6 col-lg-3">
                    <a href="../assets/img/portfolio/photographer 4.jpeg" title="project name 5">
                        <div class="project_box_one">
                            <img src="../assets/img/photographer 4.jpeg"  />
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

                    <div class="book">
                      <button type="Submit" name="" value="Book" class="btn btn-primary"> Book Me</button>
                    </div>

                </div>
                <div class="grid-item  branding photography  col-sm-12 col-md-6 col-lg-3">
                    <a href="../assets/img/portfolio/port5.png" title="project name 5">
                        <div class="project_box_one">
                            <img src="../assets/img/photographer 5.jpeg"  />
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

                    <div class="book">
                      <button type="Submit" name="" value="Book" class="btn btn-primary"> Book Me</button>
                    </div>

                </div>
                <div class="grid-item   architecture design col-sm-12 col-md-6 col-lg-3">
                    <a href="../assets/img/portfolio/port6.png" title="project name 5">
                        <div class="project_box_one">
                            <img src="../assets/img/photographer 6.jpeg"  />
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

                    <div class="book">
                      <button type="Submit" name="" value="Book" class="btn btn-primary"> Book Me</button>
                    </div>

                </div>
                <div class="grid-item  photography architecture col-sm-12 col-md-6 col-lg-3">
                    <a href="../assets/img/portfolio/port7.png" title="project name 5">
                        <div class="project_box_one">
                            <img src="../assets/img/photographer 7.jpeg"  />
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

                    <div class="book">
                      <button type="Submit" name="" value="Book" class="btn btn-primary"> Book Me</button>
                    </div>

                </div>
                <div class="grid-item  branding design  col-sm-12 col-md-6 col-lg-3">
                    <a href="../assets/img/portfolio/photographer 2.jpeg" title="project name 5">
                        <div class="project_box_one">
                            <img src="../assets/img/photographer 8.jpeg"  />
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

                    <div class="book">
                      <button type="Submit" name="" value="Book" class="btn btn-primary"> Book Me</button>
                    </div>-->

                </div>


            </div> -->
>>>>>>> a211ddf4f0903caba0672814bc52a983cded077a
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
