<?php
session_start();
include_once ('../DB/db.php');
if (!isset($_SESSION['username'])){
    header('location:../login/login.php');
} else {
    $con = new DBConnector;

    if (isset($_POST['submit'])){
        $sql = mysqli_query($con->conn, "select password from users where password = '" .password_hash($_POST['current'],PASSWORD_DEFAULT)."' && username = '".$_SESSION['username']."'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0){
            $query = mysqli_query($con->conn, "update user set password='" .password_hash($_POST['new'],PASSWORD_DEFAULT). "'");
            $_SESSION['msg'] = "Password Changed Successsfuly"; 
        } else {
            $_SESSION['msg'] = "Error:\nPassowrds don't match!";
            header ('location: admin.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<script type="text/javascript">
function valid(){
    if(document.change.new.value != document.change.confirm.value){
        alert("New password and Confirm password fields don't match!");
        document.change.confirm.focus();
        return false;
    }
    return true;
}
</script>
    <?php include ("include/header.php") ?>
<body>
    <?php include ("include/navbar.php"); ?><br>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Administrator Management</h4> <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Administrator information</b>
                        </div><br>
                        <div class="panel-body">
                            <div class="table-responsive table-hover">
                                <table class="table">
                                    <thead>
                                        <th>Admin ID</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Action</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Add administrator</b><hr>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
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
                                    <b>Access Level</b>
                                    <input type="radio" name="access" value="3" > Super
                                    <input type="radio" name="access" value="4" > Regular
                                </div>

                                    <button type="admin" name="add" class="btn btn-primary center-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Change Password</b><hr>
                            </div>
                            <div class="panel-body">
                                <form name="change" action="" method="POST" onsubmit="return valid();">
                                    <div class="form-group">
                                        Current Password
                                        <input type="password" class="form-control" id="current" name="current" required/>
                                    </div>
                                    <div class="form-group">
                                        New Password
                                        <input type="password" class="form-control" id="new" name="new"required />
                                    </div>
                                    <div class="form-group">
                                        Confirm Password
                                        <input type="password" class="form-control" id="confirm" name="confirm"required />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary center-block">Change</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>  