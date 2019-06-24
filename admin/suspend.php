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
    if (isset($_GET['del'])){
        mysqli_query($con->conn,"delete from users where UserId = '".$_GET['id']."'");
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
                    <h4>Suspended Accounts</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive table-hover table-striped">
                                <table class="table" id="example" cellspacing="0" width="1000px">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>E-mail</th>
                                            <th>Contact</th>
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
                                            <td><?php echo htmlentities($row['contact']);?></td>
                                            <td>
                                                <a href="suspend.php?id=<?php echo $row['UserID']?>&sus=suspend" onClick="return confirm('Are you sure you want to LIFT BAN on this account?\nThis process will give the owner of this account all their previlages.')">
                                                <i class="fa fa-refresh" type="suspend" name="suspend" id="suspend"></i></a>
                                                <a href="suspend.php?id=<?php echo $row['UserID']?>&del=delete" onClick="return confirm('Are you sure you want to delete this account?\nThis process is irreversable!')">
                                                <i class="fa fa-trash red" type="submit" name="submit" id="submit"></i></a>
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