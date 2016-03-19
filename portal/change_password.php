<?php include "header.php"; ?>
<?php
if($_POST)
{   
	$sql = "SELECT uid, password FROM users WHERE emailid='" . $_SESSION["userdata"]['emailid'] ."'";
	$result = mysql_query($sql) or die(mysql_error());
	$Records=mysql_fetch_array($result);
	if(md5($_POST['oldpassword'])!=$Records['password'])	{
	  header("Location:change_password.php?mess=".urlencode("Please insert correct old password."));	 
	}
 	else if($_POST['password']!=$_POST['cpassword']) {
		header("Location:change_password.php?mess=".urlencode("Password and confirm password should be same."));	 
	} else { 
		$sql = "update users set password ='".md5($_POST['password'])."' where  emailid='" . $_SESSION["userdata"]['emailid'] ."'";
		$res = mysql_query($sql);
		if($res == "1")
		{
			header("Location:change_password.php?mess=".urlencode("Your password has been updated successfully."));	
		}
	 }
}
?>
<div class="container" style="padding:10px 0;">
  
  <div class="omb_login">
    <div class="row omb_row-sm-offset-3">
    
      <div class="col-xs-12 col-sm-6">
      <h3 style="color:#0096db; padding:10px 0;">Change Password</h3>
        <form class="omb_loginForm" action="" autocomplete="off" method="POST">       
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="password" class="form-control" name="oldpassword" placeholder="Old Password" required>
          </div>
          <span class="help-block"></span>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input  type="password" class="form-control" name="password" placeholder="New Password" required>
          </div>
          <span class="help-block"></span>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input  type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required>
          </div>
          <span class="help-block"><!--Password error--></span>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
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
        <p class="omb_forgotPwd"> <a href="#">Forgot password?</a> </p>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>