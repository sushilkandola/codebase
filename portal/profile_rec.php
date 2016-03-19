<?php include "header.php"; ?>
<?php
$uid = $_SESSION["userdata"]['uid'];
if($uid =='') {header('Location:index.php?mess=Spme problem occured. Please try again.');}
if($_POST){
	if($_POST['company_type']=='' || $_POST['country']=='' || $_POST['state']=='' || $_POST['city']=='' || $_POST['industry']=='' || $_POST['contact_number']=='' || $_POST['contact_person']=='' ) {
		$mess ="Fields marked with (*) are mandatory.";
	} else {
		$appendvalue=time();
		$profilepic = $_FILES["profilepic"]["name"];
		if($profilepic!="") 
		{
		 	move_uploaded_file($_FILES["profilepic"]["tmp_name"],"./uploads/photo/".$appendvalue.$profilepic);         
		 	$profilepic1 = $appendvalue.$profilepic; 	
		}
		
		$sqlupdate = "UPDATE  `employer_info` SET  `city` =  '". $_POST['city']."',
		`state` =  '". $_POST['state'] ."',
		`country` =  '". $_POST['country'] ."',
		`address` =  '". $_POST['address'] ."',
		`pincode` =  '". $_POST['pincode'] ."',
		`company_type` =  '". $_POST['company_type'] ."',
		`industry` =  '". $_POST['industry'] ."',
		`contact_number` =  '". $_POST['contact_number'] ."',
		`contact_person` =  '". $_POST['contact_person'] ."'";
		if($profilepic1!='') { $sqlupdate .=", `profilepic` =  '". $profilepic1 ."'"; }
		$sqlupdate .= " WHERE  `uid` =$uid";
		$exe = mysql_query($sqlupdate);
		header('Location:profile_rec.php?mess=Your profile updated successfully.');
	}
}
$userData = mysql_query("select * from employer_info where uid=$uid");
$userData = mysql_fetch_array($userData);
?>
<div align="center" style="color:#f00"><?php echo @$mess;?></div>
<div class="container" style="padding:40px 0;">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
     <!-- <h3 style="color:#0096db; padding:10px 0;">New Employer Registration</h3>-->
      <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
            <h6 class="progress-bar-title">Update Profile</h6>
            <div class="progress-bar-inner"><span></span></div>
            <div class="progress-bar-content">
            <div class="container">
                <div class="row">
                          <div class="col-md-12">
                    <div class="form-group">
                      <label class="col-md-3">Company Type <span style="color:#F00;">*</span></label>
                      <div class="col-md-9"> <span class="col-md-2">
                        <input name="company_type" type="radio" value="Company" required <?php if($userData['company_type']=='Company') { echo 'checked';} ?> >
                        &nbsp; Company</span> <span class="col-md-2">
                        <input name="company_type" type="radio" value="Consultant" required <?php if($userData['company_type']=='Consultant') { echo 'checked';} ?> >
                        &nbsp; Consultant</span> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3">Type Of Company/Industry<span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-9" name="industry"  required>
                        <?php echo return_industry($userData['industry']); ?>
                      </select>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3">Address <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="address" placeholder="Address" value="<?=$userData['address'];?>">
                    </div>
                    <div class="form-group">
                      <label class="col-md-3"> Country <span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-3" name="country" required>
                        <?php echo return_country($userData['country']); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3"> City <span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-3" name="city" required>
                        <?php echo return_city($userData['city']); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3"> State <span style="color:#F00;">*</span></label>
                      <select class="form-control col-md-3" name="state" required>
                        <?php echo return_state($userData['state']); ?>
                      </select>
                    </div>
                    
                    
                    <div class="form-group">
                      <label class="col-md-3">Pincode <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="pincode" placeholder="Pin Code" required value="<?=$userData['address'];?>">
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3">Contact Number <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="contact_number" placeholder="Contact Number" required  value="<?=$userData['contact_number'];?>">
                    </div>
                    
                    <div class="form-group">
                      <label class="col-md-3">Contact Person <span style="color:#F00;">*</span></label>
                      <input type="text" class="form-control col-md-9" name="contact_person" placeholder="Contact Person" required  value="<?=$userData['contact_person'];?>">
                    </div>
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
                  <input style="padding:0px; margin:0px;" type="file" class="form-control col-md-9" name="profilepic">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <button type="submit" class="col-xs-offset-5 btn btn-primary">Update Profile</button>
    </div>
  </form>
</div>
<?php include "footer.php"; ?>