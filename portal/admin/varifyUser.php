<?php
  include 'conn/Session.php';
 ?>
<?php
/*---------------
*User Management
* Developed By : XXXXXXXX
-------------------*/
// Include the MySQL class
?>
<?php
include 'conn/MySQL.php';
$db =  new MySQL();
?>
<HTML>
<?php
      $sql = "SELECT * FROM admins WHERE admin_user_name='" . $_POST['username'] . "' AND  password='".$_POST['userpassword'] ."' AND  status_id='2'";
      $result = mysql_query($sql) or die(mysql_error());
	   if(isset($_POST['remember'])){
      setcookie("usernamecookie_admin", $_REQUEST['username'], time()+60*60*24*100, "/");
      setcookie("userpasswordcookie_admin", $_REQUEST['userpassword'], time()+60*60*24*100, "/");
       }
	 
      if (mysql_num_rows($result) > 0)
	  {	
	    $Records=mysql_fetch_array($result);
		echo $Records['id'];
		$_SESSION["userdata_admin"]=$Records;
		$_SESSION["userdata_admin"];
		$user_name=$_POST['username'];
        $_SESSION["username"]=$user_name;
		header("Location:welcome.php");
      }
      else
	  {
         header("Location:index.php?msg=".urlencode("Login invalid ! Please enter correct userId and password"));
       }
?>
