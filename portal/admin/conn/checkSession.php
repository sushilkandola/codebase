<?php
//echo $_SESSION["userdata"]['email_id'];
if(!isset($_SESSION["userdata_admin"]['email_id']))
{   echo "not registered";
	header("Location:index.php?mess=".urlencode("Your login session is not valid or has expired. Please login again to use the system."));
	exit;
}

?>