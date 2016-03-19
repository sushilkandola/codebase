<?php include "header.php"; 
if($_POST['emailid']) {
	$emailid =  $_POST['emailid'];
	$sql = "SELECT uid, fullname, password FROM users WHERE emailid='" . $emailid . "'";
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result) > 0)
	{	
		$randomPassword = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 8);
		$newPassword = md5($randomPassword);
		$sqlupdate = "UPDATE  `users` SET  `password` = '$newPassword' WHERE  `emailid` ='$emailid'";
		mysql_query($sqlupdate);
		forgot_password_mail($emailid,$randomPassword);
		header("Location:login.php?mess=Password has been sent on your email id. Please check in your email's inbox and spam folders.");
		// Send mail
	} else {
		header("Location:forgot_pass.php?mess=Sorry! This email does not exist in our records.");
	}
}
?>
<div class="container" style="padding:80px 0;">
  <div class="omb_login">
    <div class="row omb_row-sm-offset-3">
      <div class="col-xs-12 col-sm-6">
        <form class="omb_loginForm" action="" autocomplete="off" method="POST">       
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="emailid" placeholder="Email ID" required>
          </div>
          <span class="help-block"></span>
        
          <button class="btn btn-lg btn-primary btn-block" type="submit">Get Password on Email</button>
        </form>
      </div>
    </div>
    <div class="row omb_row-sm-offset-3">
      <div class="col-xs-12 col-sm-3">
        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me">
          Remember Me </label>-->
      </div>
      <div class="col-xs-12 col-sm-3">
        <p class="omb_forgotPwd"> <a href="login.php">Login</a>  | <a href="register.php">Register</a> </p>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
