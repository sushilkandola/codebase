<?php
	session_start();
	unset($_SESSION["userdata"]['emailid']);
	session_destroy();
	header("location:index.php?msg=".urlencode("You have successfully logged out."));
	exit;
?>