<?php
include_once("../DB/db.php");
if(!empty($_POST['rating']) && !empty($_POST['photographerID'])){
$photographerID = $_POST['photographerID'];
$userID = "userID";
$insertRating = "INSERT INTO item_rating (photographerID, userID, ratingNumber, comments) VALUES ('".$photographerID."', '".$userID."', '".$_POST['rating']."',  '".$_POST["comment"]."')";
mysqli_query($conn, $insertRating) or die("database error: ". mysqli_error($conn));
echo "rating saved!";
}
?>
