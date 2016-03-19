<?php
include 'admin/conn/Session.php';
include 'admin/conn/MySQL.php';
$db =  new MySQL();

	$sql = "SELECT uid, fullname, emailid, utype FROM users WHERE emailid='" . $_POST['emailid'] . "' AND  password='".md5($_POST['password']) ."'";
	$result = mysql_query($sql) or die(mysql_error());
	//if(isset($_POST['remember'])){
	//setcookie("usernamecookie_admin", $_REQUEST['username'], time()+60*60*24*100, "/");
	//setcookie("userpasswordcookie_admin", $_REQUEST['userpassword'], time()+60*60*24*100, "/");
	//}
	if (mysql_num_rows($result) > 0)
	{	
		$Records=mysql_fetch_array($result);
		$_SESSION["userdata"]=$Records;
		if($Records['utype']=='employer') {
			header("Location:profile_rec.php");
		} else if($Records['utype']=='employee') {
			header("Location:profile.php");
		}
	}
	else
	{
	 	header("Location:login.php?mess=Login invalid ! Please enter correct email and password");
	}
?>
