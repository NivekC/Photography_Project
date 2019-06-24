<?php
session_start();
include_once ('../DB/db.php');
if (!isset($_SESSION['username'])){
    header('location:../login/login.php');  
} else {
    $con = new DBConnector;
    if(isset($_GET['sus'])){
        mysqli_query($con->conn,"update users set active = 0 where UserID = '".$_GET['id']."'");
        $_SESSION['msg'] = "Account has been suspended";
    }
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
                            <h4>Photographers</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-hover table-striped " >
                                <table  class="table " id="example"  cellspacing="0" width="1000PX">
                                    <thead>
                                        <tr>
                                            <th>Photographer ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($con->conn,"SELECT * FROM users WHERE access_level = 3 && active = 1");
                                            while($row = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['UserID']);?></td>
                                            <td><?php echo htmlentities($row['fname']);?></td>
                                            <td><?php echo htmlentities($row['lname']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['contact']);?></td>
                                            <td>
                                                <a href="view.php?id=<?php echo $row['UserID']?>&see=view"><i class="fa fa-eye" type="submit" name="submit" id="submit"></i></a>
                                                <a href="home.php?id=<?php echo $row['UserID']?>&sus=suspend" onClick="return confirm('Are you sure you want to suspend account?')">
                                                <i class="fa fa-warning red" type="suspend" name="suspend" id="suspend"></i></a>
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>