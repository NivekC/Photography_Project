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

        $UserID = $_GET['id'];
        $sqlUser = mysqli_query($con->conn, "SELECT * FROM `users` WHERE UserID = '$UserID'");
        while($row=mysqli_fetch_array($sqlUser)){
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $contact = $row['contact']; 
            }
        $sqlAdmin = mysqli_query($con->conn, "SELECT * FROM `users` WHERE username = '".$_SESSION['username']."'");
        while($row=mysqli_fetch_array($sqlAdmin)){
            $emailAdmin = $row['email'];
            $contactAdmin = $row['contact']; 
            }    

            $string = "+254". $contact; 
            $recipients = $string; 

            $body = "Your account ban has been lifted. Sorry for any inconvenience caused.";

          // Be sure to include the file you've just downloaded
          require_once('AfricasTalkingGateway.php');
          // Specify your authentication credentials
          $username   = "bloodorgan";
          $apikey     = "8a62463cde8793afb7b02a417334a81962e17ccd3c81a7254db1b656f6681835";
          // Specify the numbers that you want to send to in a comma-separated list
          // Please ensure you include the country code (+254 for Kenya in this case)

            $body = $body . "\r\n". "If you wish to reply, please reply with the options below.". "\r\nPhone Number: ". $contactAdmin . "\r\nEmail Address: ". $emailAdmin;        

           // /var_dump($recipients);
          // And of course we want our recipients to know what we really do
          $message    = $body;
          // Create a new instance of our awesome gateway class
          $gateway    = new AfricasTalkingGateway($username, $apikey);
          /*************************************************************************************
            NOTE: If connecting to the sandbox:
            1. Use "sandbox" as the username
            2. Use the apiKey generated from your sandbox application
               https://account.africastalking.com/apps/sandbox/settings/key
            3. Add the "sandbox" flag to the constructor
            $gateway  = new AfricasTalkingGateway($username, $apiKey, "sandbox");
          **************************************************************************************/
          // Any gateway error will be captured by our custom Exception class below, 
          // so wrap the call in a try-catch block
          try 
          { 
            // Thats it, hit send and we'll take care of the rest. 
            $results = $gateway->sendMessage($recipients, $message);
                      
            foreach($results as $result2) {
              // status is either "Success" or "error message"
              echo " Number: " .$result2->number;
              echo " Status: " .$result2->status;
              echo " StatusCode: " .$result2->statusCode;
              echo " MessageId: " .$result2->messageId;
              echo " Cost: "   .$result2->cost."\n";
              header("location: home.php");
            }
          }
          catch ( AfricasTalkingGatewayException $e )
          {
             echo "Encountered an error while sending: ".$e->getMessage();
          }

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