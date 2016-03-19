<?php include "header.php"; ?>
<?php
if($_POST){
	$fullname   = addslashes($_POST['fullname']);
	$emailid 	= addslashes($_POST['emailid']);
	$password 	= addslashes($_POST['password']);
	$cpassword 	= addslashes($_POST['cpassword']);
	$mobile 	= addslashes($_POST['mobile']);
	$utype 		= $_POST['utype'];
	if($fullname != '' && $emailid != '' && $password != '' && $cpassword != '' && $utype != '') {
		$checkEmail = mysql_query("select uid from users where emailid='$emailid'");
		$countRows = mysql_num_rows($checkEmail); 
		if($countRows<=0) {
			if(strlen($password)>=6) {
			if($password == $cpassword) {
				$created = date('Y-m-d H:i:s');
				$enc_password = md5($password);
				mysql_query($sqlIns = "INSERT INTO  `users` (`fullname` ,`emailid` ,`password` ,`mobile` ,`utype` ,`created`) VALUES ( '$fullname',  '$emailid',  '$enc_password',  '$mobile',  '$utype',  '$created' )");
				$uid = mysql_insert_id();
				$_SESSION["uid"] = $uid;
				if($utype=='employee') {
					registration_mail($emailid, $password, $mobile, 'Employee' );
					header('Location:register_employee.php?mess=Congrats! Your account has been created successfully. Please proceed next by filling your education and professional details.');
				}  else if($utype=='employer') {
					registration_mail($emailid, $password, $mobile, 'Employer' );
					header('Location:register_employer.php?mess=Congrats! Your account has been created successfully. Please proceed next.');
				} else { header('Location:index.php?mess=Some problems occured. Please contact us.'); }
			} else {
				$mess = 'Password and confirm password should be same.';
			} 
			} else {
				$mess = 'Password length should be minimum 6.';
			}
		} else {
			$mess = 'Email ID already registered with us. Please click on forget password link.';
		}
	} else {
		$mess = 'Fields marked with (*) are mandatory.';
	}
}
?>
<div align="center" style="color:#f00"><?php echo @$mess;?></div>
<div class="container" style="padding:20px 0;">
  <form action="" method="post">
    <div class="row">
      <div class="col-md-6">
        <h3>Register Now</h3>
        <div class="form-group">
          <label class="col-md-4">Full Name <span style="color:#F00;">*</span></label>
          <input type="text" class="form-control col-md-8" name="fullname" placeholder="Full Name" required value="<?=@$fullname?>" >
        </div>
        <div class="form-group">
          <label class="col-md-4">Email ID <span style="color:#F00;">*</span></label>
          <input type="text" class="form-control col-md-8" name="emailid" placeholder="Email ID" required  value="<?=@$emailid?>">
        </div>
        <div class="form-group">
          <label class="col-md-4">Password <span style="color:#F00;">*</span></label>
          <input type="password" class="form-control col-md-8" name="password" placeholder="Password" required >
        </div>
        <div class="form-group">
          <label class="col-md-4">Confirm Password <span style="color:#F00;">*</span></label>
          <input type="password" class="form-control col-md-8" name="cpassword" placeholder="Confirm Password" required >
        </div>
        <div class="form-group">
          <label class="col-md-4">Mobile </label>
          <input type="text" class="form-control col-md-8" name="mobile" placeholder="Mobile" value="<?=@$mobile?>">
        </div>
        <div class="form-group">
          <label class="col-md-4">I am a <span style="color:#F00;">*</span></label>
          <div class="col-md-8"> <span class="col-md-6">
            <input name="utype" type="radio" value="employee" required <?php if($utype == 'employee') { echo 'checked';}?> >
            &nbsp; Jobseeker</span> <span class="col-md-6">
            <input name="utype" type="radio" value="employer" required <?php if($utype == 'employer') { echo 'checked';}?> >
            &nbsp; Recruiter</span> </div>
        </div>
        <!--<div class="form-group">
          <label class="col-md-4">Resume (optional)</label>
          <input type="file" class="form-control col-md-8" name="Resume" placeholder="Resume (optional)">
        </div>-->
        <div class="form-group">
          <label class="col-md-4">&nbsp;</label>
          <input type="checkbox" name="agree" required>
          &nbsp; I agree to the Terms & Conditions </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="signup">Save & Next</button>
      </div>
    </div>
  </form>
</div>
<?php include "footer.php"; ?>