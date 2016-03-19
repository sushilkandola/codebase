<?php include "header.php"; ?>
<?php
if($_SESSION['uid']=='') {header('Location:index.php?mess=Spme problem occured. Please try again later.');}
if($_POST){
	if($_POST['company_type']=='' || $_POST['country']=='' || $_POST['state']=='' || $_POST['city']=='' || $_POST['industry']=='' || $_POST['contact_number']=='' || $_POST['contact_person']=='' ) {
		$mess ="Fields marked with (*) are mandatory.";
	}else if( $_FILES["profilepic"]["name"]=='') {
		$mess ="Please upload your photo.";
	}else {
		$appendvalue=time();
		$profilepic = $_FILES["profilepic"]["name"];
		if($profilepic!="") 
		{
		 	move_uploaded_file($_FILES["profilepic"]["tmp_name"],"./uploads/photo/".$appendvalue.$profilepic);         
		 	$profilepic=$appendvalue.$profilepic; 	
		}
		$sqlIns = "INSERT INTO  `employer_info` (`uid` ,`country` ,`state` ,`city` ,`address` ,`pincode` ,`company_type` ,`industry` ,`contact_number` ,`contact_person` ,`profilepic`) VALUES (  '".$_SESSION['uid']."', '".$_POST['country']."', '".$_POST['state']."', '".$_POST['city']."','".$_POST['address']."','".$_POST['pincode']."', '".$_POST['company_type']."', '".$_POST['industry']."', '".$_POST['contact_number']."', '".$_POST['contact_person']."', '".$profilepic."')";	
		$exe = mysql_query($sqlIns);
		header('Location:login.php?mess=Congratulations! You have comleted the registration with us. Please login and post your first job.');
	}
}
?>
<div align="center" style="color:#f00"><?php echo @$mess;?></div>
<div class="container" style="padding:40px 0;">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
     <!-- <h3 style="color:#0096db; padding:10px 0;">New Employer Registration</h3>-->
      <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
            <h6 class="progress-bar-title">New Employer Registration</h6>
            <div class="progress-bar-inner"><span></span></div>
            <div class="progress-bar-content">
            <div class="container">
                <div class="row">
                          <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-md-3">Company Type <span style="color:#F00;">*</span></label>
                      <div class="col-md-9"> <span class="col-md-2">
                        <input name="company_type" type="radio" value="Company" required>
                        &nbsp; Company</span> <span class="col-md-2">
                        <input name="company_type" type="radio" value="Consultant" required>
                        &nbsp; Consultant</span> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3">Type Of Company/Industry<span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-9" name="industry"  required>
                        <?php echo return_industry(); ?>
                      </select>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3">Address <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="address" placeholder="Address">
                    </div>
                    <div class="form-group">
                      <label class="col-md-3"> Country <span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-3" name="country" required>
                        <?php echo return_country(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3"> City <span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-3" name="city" required>
                        <?php echo return_city(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3"> State <span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-3" name="state" required>
                        <?php echo return_state(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3">Pincode <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="pincode" placeholder="Pin Code" required>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3">Contact Number <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="contact_number" placeholder="Contact Number" required>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3">Contact Person <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="contact_person" placeholder="Contact Person" required>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3">&nbsp;</label>
                      <input type="checkbox" name="agree"  required>
                      &nbsp; I agree to the Terms & Conditions </div>
                  </div>
                  </div>
      		</div>
            </div>
          </div>
      <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Upload</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container" >
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Upload Photo <span style="color:#F00;">*</span></label>  
                  <input style="padding:0px; margin:0px;" type="file" class="form-control col-md-9" name="profilepic" required>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <button type="submit" class="col-xs-offset-5 btn btn-primary">Register</button>
    </div>
  </form>
</div>
<?php include "footer.php"; ?>