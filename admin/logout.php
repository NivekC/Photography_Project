<?php
session_start();
$_SESSION['username-']=="";
session_unset($_SESSION['username']);
$_SESSION['errmsg']="Successfully logged out!";
?>
<script language="javascript">
document.location="../login/login.php";
</script>