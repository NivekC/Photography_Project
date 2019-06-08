<?php
session_start();
include ('../DB/db.php');

if (!isset($_SESSION['username'])){
    header('location:../login/login.php');
} else {
    $con = new DBConnector;

    if(isset($_GET['sus'])){
        mysqli_query($con->conn,"update users set active = 1 where UserID = '".$_GET['id']."'");
        $_SESSION['msg'] = "Account has been restored";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include ('include/header.php');?>
<body>
    <?php include ('include/navbar.php'); ?><br>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Suspended Accounts</h4><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive table-hover table striped">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>E-mail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($con->conn,"SELECT * FROM users WHERE active = 0");
                                            while($row = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['UserID']);?></td>
                                            <td><?php echo htmlentities($row['fname']);?></td>
                                            <td><?php echo htmlentities($row['lname']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="home.php?id=<?php echo $row['UserID']?>&pass=update" onClick="return confirm('Are you sure you want to reset password?')">
                                                <i class="fa fa-eye" type="submit" name="submit" id="submit"></i></a>
                                                <a class="btn btn-xs btn-danger" href="suspend.php?id=<?php echo $row['UserID']?>&sus=suspend" onClick="return confirm('Are you sure you want to lift the ban on this account?\nThis process will give the owner of this account all their previlages.')">
                                                <i class="fa fa-refresh" type="suspend" name="suspend" id="suspend"></i></a>
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