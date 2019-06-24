<?php
session_start();
include_once ('../DB/db.php');
if (!isset($_SESSION['username'])){
    header('location:../login/login.php');
} else {
    $con = new DBConnector;
    if(isset($_GET['del'])){
        mysqli_query($con->conn,"delete from users where UserId = '".$_GET['id']."'");
    }
    if(isset($_POST['submit'])){
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $email = $_POST['mail'];
        $nums = $_POST['num'];
        $acc = $_POST['access'];
        $pass =  "newadmin";
        $npass = password_hash($pass,PASSWORD_DEFAULT);
        
        $sql = mysqli_query($con->conn, "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `email`, `contact`, `access_level`, `active`) VALUES ('$fn','$ln','$fn','$npass','$email','$nums','$acc',1)");
    }
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
                    <h4>Administrator Management </h4> <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Administrator information(minor)</b>
                        </div><br>
                        <div class="panel-body">
                            <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead>
                                        <th>Admin ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = mysqli_query($con->conn,"SELECT * FROM users WHERE access_level = 4 && active = 1");
                                            while($row = mysqli_fetch_array($sql)){
                                        ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['UserID']);?></td>
                                            <td><?php echo htmlentities($row['fname']);?></td>
                                            <td><?php echo htmlentities($row['lname']);?></td>
                                            <td><?php echo htmlentities($row['contact']);?></td>
                                            <td>
                                                <a href="admin.php?id=<?php echo $row['UserID']?>&del=delete" onClick="return confirm('Are you sure you want to DELETE this account?\nThis process is irreversable!')">
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
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Add administrator</b><hr>
                        </div>
                        <div class="panel-body">
                            <form name="admin" method="POST">
                                <div class="form-group">
                                    First Name
                                    <input type="text" name="fname" id="fname" class="form-control" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    Last Name
                                    <input type="text" name="lname" id="lname" class="form-control" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    E-mail
                                    <input type="email" name="mail" id="mail" class="form-control" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    Contact
                                    <input type="number" name="num" id="num" class="form-control" autocomplete="off" placeholder="07..." required/>
                                </div>
                                <div class="form-group">
                                    <b>Access Level</b>
                                    <input type="radio" name="access" value="1" > Super
                                    <input type="radio" name="access" value="4" > Regular
                                </div>
                                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>  