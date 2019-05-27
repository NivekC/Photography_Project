<?php
session_start();
include ('..DB/db.php');
if(!isset($_SESSION['username'])){
    header('location:../login/login.php');
} else {
    $con = new DBConnector;
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include ("include/header.php"); ?>
<body>
    <?php include ("include/navbar.php"); ?><br>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Posts</h4><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Recent Posts</b><hr>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-striped table-hover">
                                <div class="table">
                                    <thead>
                                        <th>Post ID</th>
                                        <th>Post by</th>
                                        <th>Ratings</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // $sql = mysqli_query($con->conn,"SELECT * FROM reports");
                                            // while($row = mysqli_fetch_array($sql)){
                                        ?>
                                        
                                    </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>