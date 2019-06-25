<?php
session_start();
include ('../DB/db.php');
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
                    <h4>Recent Posts</h4><hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive table-striped table-hover">
                                <div class="table">
                                    <thead>
                                        <tr>
                                            <th>Post ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Category</th>
                                            <th>Ratings</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql=mysqli_query($con->conn,"select gallery.photographID as pid, users.UserID as uid, gallery.Category as cat, user.fname as fn, gallery.photographersID as phid ,user.lname as ln, from gallery join users on users.UserID=gallery.photographersID ");
                                            while($row = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['pid']);?></td>
                                            <td><?php echo htmlentities($row['fn']);?></td>
                                            <td><?php echo htmlentities($row['ln']);?></td>
                                            <td><?php echo htmlentities($row['uid']);?></td>
                                            <td><?php echo htmlentities($row['cat']);?></td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="home.php?id=<?php echo $row['UserID']?>&pass=update">
                                                <i class="fa fa-eye" type="submit" name="submit" id="submit"></i></a>
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>