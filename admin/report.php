<?php
session_start();
include_once ('../DB/db.php');
if (!isset($_SESSION['username'])){
    header('location:../login/login.php');
} else {
    $con = new DBConnector;
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include ('include/header.php'); ?>
<body>
    <?php include ("include/navbar.php");?> <br>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Reports & Feedback</h4> <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Reports</b><hr>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-hover table-striped">
                                <thead>
                                    <th>Report ID</th>
                                    <th>Title</th>
                                    <th>Complain</th>
                                    <th>User ID</th>
                                    <th>Photo ID</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = mysqli_query($con->conn, "SELECT * FROM reports");
                                        while($row = mysqli_fetch_array($sql)){
                                    ?>
                                    <tr>
                                        <td><?php echo htmlentities($row['ReportID']);?></td>
                                        <td><?php echo htmlentities($row['title']);?></td>
                                        <td><?php echo htmlentities($row['description']);?></td>
                                        <td><?php echo htmlentities($row['photographerID']);?></td>
                                        <td><?php echo htmlentities($row['photographsID']);?></td>
                                        <td>
                                            <a class="btn btn-xs btn-info" href="home.php?id=<?php echo $row['UserID']?>&pass=update" onClick="return confirm('Are you sure you want to reset password?')">
                                            <i class="fa fa-eye" type="submit" name="submit" id="submit"></i></a>
                                            <a class="btn btn-xs btn-danger" href="home.php?id=<?php echo $row['UserID']?>&sus=suspend" onClick="return confirm('Are you sure you eant to suspend account?')">
                                            <i class="fa fa-trash" type="suspend" name="suspend" id="suspend"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Feedback</b><hr>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-hover">
                                <div class="table">
                                    <thead>
                                        <th>User ID</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </thead>
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