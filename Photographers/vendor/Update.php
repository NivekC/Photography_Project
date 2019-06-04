<?php
     /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "blood_organ");

// Check connection
if($mysqli === false){
die("ERROR: Could not connect. " . $mysqli->connect_error);
}



// Escape user inputs for security
$Name = $mysqli->real_escape_string($_REQUEST['name']);  
$email = $mysqli->real_escape_string($_REQUEST['email']);
$location = $mysqli->real_escape_string($_REQUEST['location']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);

$target = "images/".basename($_FILES['Image']['name']);
$Image = $_FILES['Image']['name'];

// attempt insert query execution
$sql = "UPDATE `institution` SET PhoneNo = '".$PhoneNo."', Address = '".$Address."', Location = '".$location."', Email = '".$email."', Image = '".$Image."' WHERE institution.Name = '".$Name."'";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
echo "Image Uploaded successfully";
}
else
{
echo "There was a problem uploading the Image ";
}
print_r($_FILES);

if($mysqli->query($sql) === true ){
header("location: admininstitution.php");
echo "Records inserted successfully."; 

} else {
echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}


// Close connection
$mysqli->close();
?>