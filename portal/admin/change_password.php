<?
	require 'conn/Session.php';
	require 'conn/MySQL.php';
	require_once("includes/paging.inc.php");
	require_once("includes/generalFunction.php");
	$dbcon =  new MySQL();
    require 'conn/checkSession.php';
	if(isset($_POST['subBtn']))
	{   if($_SESSION["username"]=='admin')
	    {
 		$dbcon->execute_query("select * from admins where admin_user_name='admin'");
		$Records=$dbcon->fetch_one_record();
		}
		else
		{
		$dbcon->execute_query("select * from admins where admin_user_name='".$_SESSION["username"]."'");
		$Records=$dbcon->fetch_one_record();
		}
	    if($_POST['oldpassword']!=$Records['password'])
		 {
		  header("Location:change_password.php?mess=".urlencode("Please insert correct old password."));	 
		}
		else
		 {
			$sql = "update admins set password ='".$_POST['newpassword']."' where admin_user_name ='".$_SESSION['username']."'";
			$res = mysql_query($sql);
			//echo $sql;
			if($res == "1")
			{
				header("Location:change_password.php?mess=".urlencode("Password updated successfully."));	
			}
		 }
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Panel</title>
<!-- CSS -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
<!-- Javascripts-->
<!-- jQuery -->
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript">
function chkempty()
{
	if (document.chPass.oldpassword.value=="")
	{
		alert("Old password field is empty.");
		document.getElementById("oldpassword").focus();
		//setFocus("oldpassword");
		return false;
	}
	else if(document.chPass.newpassword.value=="")
	{
		alert("New password field is empty.");
		document.getElementById("newpassword").focus();
		return false;
	}
  else if(document.chPass.newpassword.value!=document.chPass.cpassword.value)
   {
	alert("New and confirm password is not matching.");
	document.getElementById("cpassword").focus();
	return false;
   }
  else
   {
     return true;
    }
}
</script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <?
     	include('left.php');
   ?>
  <!--Put content here -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <h2>Welcome
      <?=ucfirst($_SESSION["username"]); ?>
    </h2>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td class="content-box-header"><b style='font-size:15px;'> Change Password </b></td>
          <td class="content-box-header"><form name="createVenue" method="post" action="add_venue.php">
              <div style="float:right"> </div>
            </form></td>
        </tr>
      </tbody>
    </table>
    <table border="0" cellpadding="0" cellspacing="0">
     <? if($_REQUEST['mess']) 
           {
              echo '<tr> 
             <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.urldecode($_REQUEST['mess']).'</font></td>
            </tr>';
        } ?>
      <tr>
        <td><form name="chPass" method="post" action="change_password.php" onsubmit="return chkempty()">
            <table cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td width="200">Old Password</td>
                <td><input type="password" class="txtbox" name="oldpassword" id="oldpassword" value="" /></td>
              </tr>
              <tr>
                <td>New Password</td>
                <td><input type="password" class="txtbox" name="newpassword" id="newpassword" value="" /></td>
              </tr>
              <tr>
                <td>Confirm Password</td>
                <td><input type="password" class="txtbox" name="cpassword" id="cpassword" value="" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="subBtn" value="Save" class='button'/>
                  <input type="reset" name="rstbtn" value="Reset" class='button'/></td>
              </tr>
            </table>
          </form></td>
      </tr>
    </table>
    <!-- End #tab1 -->
    <? require('footer.php') ?>
  </div>
  <!-- End #main-content -->
</div>
<!-- End Content here-->
<!-- End #main-content -->
</div>
</body>
</html>