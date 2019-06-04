<?php
session_start();
include_once('../DB/db.php');
if(!isset($_SESSION['username']))
{
    header("location:../authenticator/login.php");
}

$con = new DBConnector;
if(isset($_POST['submit']))
{

    $target_dir = '../assets/upload/';
    $category = $_POST['category'];
    $uname = $_SESSION['username'];

    if( isset($_FILES['fileToUpload']['name'])) {
        
    $total_files = count($_FILES['fileToUpload']['name']);
    
    $res =  mysqli_query($con->conn, "SELECT photographers.photographersID FROM `photographers` JOIN users ON users.UserID = photographers.UserID WHERE users.username = '$uname'");
    if($res->num_rows > 0)
    {
        while($row = $res->fetch_assoc()) {
          $pId = $row['photographersID'];           
        }
    } 
    for($key = 0; $key < $total_files; $key++) {
        
        // Check if file is selected
        if(isset($_FILES['fileToUpload']['name'][$key]) && $_FILES['fileToUpload']['size'][$key] > 0) {
        $original_filename = $_FILES['fileToUpload']['name'][$key];
        $target = $target_dir . basename($original_filename);
        $tmp  = $_FILES['fileToUpload']['tmp_name'][$key];
        $ssql = "INSERT INTO `gallery`(`photographs`, `Category`, `photographersID`) VALUES ('$target','$category','$pId')";
        echo $ssql;
        $sql = mysqli_query($con->conn,$ssql);
        $uploadIMG = move_uploaded_file($tmp, $target);
        if($sql === true && $uploadIMG === true){
            echo "Twaz Successfull";
            header('location:index.php');
        }
        }
        
    }
        
    }
}


?>