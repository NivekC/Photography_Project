<?php
    session_start();
    include('../DB/db.php');

    $con = new DBConnector;
    if(!isset($_SESSION['username']))
    {
        header("location:../authenticator/login.php");
    }

    if(isset($_GET['id'])){
        $ReportID = $_GET['id'];
        //$photosID = $_GET['photosID'];
    }
    $sqlReport = mysqli_query($con->conn, "SELECT * FROM `reports` WHERE ReportID = '$ReportID'");
    while($row=mysqli_fetch_array($sqlReport)){
        $title = $row['title'];
        $description = $row['description']; 
        $date = $row['date'];
        $photographerID = $row['photographerID'];
        $photographsID = $row['photographsID']; 
        }  
    $sqlphotographs = mysqli_query($con->conn, "SELECT * FROM `gallery` WHERE photographID = '$photographsID'");
    while($row=mysqli_fetch_array($sqlphotographs)){
        $photographs = $row['photographs']; 
        } 
    $sqlphotographer = mysqli_query($con->conn, "SELECT UserID FROM `photographers` WHERE photographersID = '$photographerID'");
    while($row=mysqli_fetch_array($sqlphotographer)){
        $UserID = $row['UserID']; 
        }
    $sqlphotographerDetails = mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID = '$UserID'");
    while($row=mysqli_fetch_array($sqlphotographerDetails)){
        $fname = $row['fname'];
        $lname = $row['lname']; 
        $email = $row['email'];
        $contact = $row['contact'];
        $username = $row['username']; 
        }
    $sqlRevokeStatus = mysqli_query($con->conn, "SELECT `status` FROM `gallery` WHERE photographID = '$photographsID'");
    while($row=mysqli_fetch_array($sqlRevokeStatus)){
        $status = $row['status']; 
    }


if(isset($_POST['revoke'])){
    $photographsID = $_POST['photographsID'];
    
    $sqlStatus = mysqli_query($con->conn,"UPDATE `gallery` SET `status`= 0 WHERE photographID = '$photographsID'");
    header('location: report.php');
}
         
?>
<!DOCTYPE html>
<html lang="en">
    <?php include ('include/header.php'); ?>
    <link rel="stylesheet" href="assets/css/view.css">


<body>
    <?php include ("include/navbar.php"); ?><br>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Report View</h4>
                    </div>
                    <div class="card-deck">
                        <section>
                            <div class="card">
                                <div class="box">
                                    <div class="img">
                                        <img class="details img-responsive" src="<?php echo $photographs?>" width="300" height="400" alt="Card image cap">
                                    </div>
                                        <hr>
                                        <h4 class ="card-title"><?php echo $fname." ". $lname?></h4>
                                        <div class="contents">
                                            <p class="card-text">Phone number: <?php echo $contact?></p>
                                            <p class="card-text">Email:  <?php echo $email?></p>
                                            <p class="card-text"> Status: <?php if($status==1){echo "Report Pending";}else{echo "Report Revoked";}?></p>
                                            <form action="view.php" method="post">
                                            <input type="hidden" name="photographsID" value="<?php echo $photographsID?>">
                                            <button type="submit" name="revoke"  class="btn btn-sm btn-success" >Revoke</button>
                                            </form>
                                        </div>
                                        
                                </div>
                            </div> 
                        </section>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>