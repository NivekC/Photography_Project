<?php
    session_start();
    echo $_SESSION['username'];
    unset($_SESSION['username']);
    session_destroy();
    if(!isset($_SESSION['username'])){
        header("location:../Authenticator/login.php");
    }

?>