<?php
session_start();
include_once('../DB/db.php');
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
    <?php include ("include/navbar.php"); ?><br>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Users Information</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-hover table-striped">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($con->conn,"SELECT * FROM users WHERE access_level = 2 && active = 1");
                                            while($row = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['UserID']);?></td>
                                            <td><?php echo htmlentities($row['fname']);?></td>
                                            <td><?php echo htmlentities($row['lname']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['contact']);?></td>
                                            <td>   
                                                <a class="btn btn-xs btn-primary" href="home.php?id=<?php echo $row['UserID']?>&pass=update" onClick="return confirm('Are you sure you want to reset password?')">
                                                <i class="fa fa-eye" type="submit" name="submit" id="submit"></i></a>
                                                <a class="btn btn-xs btn-danger" href="home.php?id=<?php echo $row['UserID']?>&sus=suspend" onClick="return confirm('Are you sure you eant to suspend account?')">
                                                <i class="fa fa-warning" type="suspend" name="suspend" id="suspend"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>