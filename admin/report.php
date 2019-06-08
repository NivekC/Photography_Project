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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Reports</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-hover table-striped">
                                <table class="table">
                                    <thead>
                                        <th>Report ID</th>
                                        <th>Title</th>
                                        <th>Complain</th>
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
                                            <td>
                                                <a  href="home.php?id=<?php echo $row['UserID']?>&pass=update"><i class="fa fa-eye-slash" type="submit" name="submit" id="submit"></i></a>
                                                <a  href="home.php?id=<?php echo $row['UserID']?>&del=delete" onClick="return confirm('Are you sure you eant to delete report?')">
                                                <i class="fa fa-trash red" type="delete" name="delete" id="delete"></i></a>
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