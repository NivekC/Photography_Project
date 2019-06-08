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
    <?php include ('include/navbar.php'); ?> <br>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Event Bookings</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-hover table-striped">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Date</th>
                                            <th>Venue</th>
                                            <th>Category</th>
                                            <th>Photographer</th>
                                            <th>Client</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($con->conn,"SELECT * FROM booking");
                                            while($row = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['bookID']);?></td>
                                            <td><?php echo htmlentities($row['date']);?></td>
                                            <td><?php echo htmlentities($row['venue']);?></td>
                                            <td><?php echo htmlentities($row['category']);?></td>
                                            <td><?php echo htmlentities($row['photographerID']);?></td>
                                            <td><?php echo htmlentities($row['UserID']);?></td>
                                            <td>
                                                <a href="home.php?id=<?php echo $row['UserID']?>&del=delete" onClick="return confirm('Aprove this event?')">
                                                <i class="fa fa-check-square" type="delete" name="delete" id="delete"></i></a>
                                                <a href="home.php?id=<?php echo $row['UserID']?>&del=delete" onClick="return confirm('Delete this event?')">
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