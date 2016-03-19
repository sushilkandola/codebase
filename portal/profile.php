<?php include "header.php"; ?>
<?php
$uid = $_SESSION["userdata"]['uid'];
if($uid =='') {header('Location:index.php?mess=Spme problem occured. Please try again.');}
if($_POST){
	if($_POST['city']=='' || $_POST['work_experience']=='' || $_POST['salary']=='' || $_POST['company_name']=='' || $_POST['qualification']=='' || $_POST['institute']=='' || $_POST['key_skills']=='' ) {
		$mess ="Fields marked with (*) are mandatory.";
	} else {
		$appendvalue=time();
		$resume = $_FILES["resume"]["name"];
		$profilepic = $_FILES["profilepic"]["name"];
		if($resume!="") 
		{
		 	move_uploaded_file($_FILES["resume"]["tmp_name"],"./uploads/cv/".$appendvalue.$resume);         
		 	$resume1 = $appendvalue.$resume; 	
		}
		if($profilepic!="") 
		{
		 	move_uploaded_file($_FILES["profilepic"]["tmp_name"],"./uploads/photo/".$appendvalue.$profilepic);         
		 	$profilepic1 = $appendvalue.$profilepic; 	
		}
		
		$sqlupdate = "UPDATE  `employee_info` SET  `city` =  '". $_POST['city']."',
		`state` =  '". $_POST['state'] ."',
		`country` =  '". $_POST['country'] ."',
		`gender` =  '". $_POST['gender'] ."',
		`objective` =  '". $_POST['objective'] ."',
		`work_experience` =  '". $_POST['work_experience'] ."',
		`total_experience` =  '". $_POST['total_experience'] ."',
		`salary` =  '". $_POST['salary'] ."',
		`job_title` =  '". $_POST['job_title'] ."',
		`company_name` =  '". $_POST['company_name'] ."',
		`industry` =  '". $_POST['industry'] ."',
		`functional_area` =  '". $_POST['functional_area'] ."',
		`current_job_date` =  '". $_POST['current_job_date'] ."',
		`qualification` =  '". $_POST['qualification'] ."',
		`specialization` =  '". $_POST['specialization'] ."',
		`institute` =  '". $_POST['institute'] ."',
		`passout` =  '". $_POST['passout'] ."',
		`course` =  '". $_POST['course'] ."',
		`pre_company` =  '". $_POST['pre_company'] ."',
		`pre_jobtitle` =  '". $_POST['pre_jobtitle'] ."',
		`pre_location` =  '". $_POST['pre_location'] ."',
		`key_skills` =  '". $_POST['key_skills'] ."'";
		if($resume1!='') { $sqlupdate .=", `resume` =  '". $resume1 ."'"; }
		if($profilepic1!='') { $sqlupdate .=", `profilepic` =  '". $profilepic1 ."' "; }
		$sqlupdate .= " WHERE  `uid` =$uid";
		$exe = mysql_query($sqlupdate);
		header('Location:profile.php?mess=Your profile updated successfully.');
	}
}
$userData = mysql_query("select * from employee_info where uid=$uid");
$userData = mysql_fetch_array($userData);
?>
<div align="center" style="color:#f00"><?php echo @$mess;?></div>
<div class="container" style="padding:10px 0;">
  <h3 style="color:#0096db; padding:10px 0;">Update Profile</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row"> 
      <!--<div class="panel-group" id="accordion">-->
      <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Personal Details</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Current Location <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-3" name="country" required>
                    <?php echo return_country($userData['country']); ?>
                  </select>
				  <select class="form-control col-md-3" name="city" required>
                    <?php echo return_city($userData['city']); ?>
                  </select>
                  <select class="form-control col-md-3" name="state" required>
                    <?php echo return_state($userData['state']); ?>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label class="col-md-3">Gender <span style="color:#F00;">*</span></label>
                  <div class="col-md-9"> <span class="col-md-2">
                    <input name="gender" type="radio" value="Male" required <?php if($userData['gender']=='Male') { echo 'checked';} ?> >
                    &nbsp; Male</span> <span class="col-md-2">
                    <input name="gender" type="radio" value="Female" required <?php if($userData['gender']=='Female') { echo 'checked';} ?> >
                    &nbsp; Female</span> </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Career Objective <span style="color:#F00;">*</span></label>
                  <textarea name="objective" class="form-control col-md-9" cols="" rows="" required><?php echo strip_tags($userData['objective']);?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Work Experience</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Work Experience<span style="color:#F00;">*</span></label>
                  <div class="col-md-9"> <span class="col-md-2">
                    <input name="work_experience" type="radio" value="Fresher" required <?php if($userData['work_experience']=='Fresher') { echo 'checked';} ?> >
                    &nbsp; Fresher</span> <span class="col-md-2">
                    <input name="work_experience" type="radio" value="Experienced" required <?php if($userData['work_experience']=='Experienced') { echo 'checked';} ?> >
                    &nbsp; Experienced</span> </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Total Experience <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-4" name="total_experience" required>
                    <option value="">Select Experience</option>
                    <?php for($exp=0; $exp<30; $exp++) {	?>
                    <option value="<?php echo $exp; ?>" <?php if($userData['total_experience']==$exp) { echo 'selected';} ?> ><?php echo $exp; ?> Year's</option>
                   <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Current Annual Salary <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-4" name="salary" required>
                    <option value="">Salary</option>
                     <?php for($sal=1; $sal<50; $sal++) {	?>
                    <option value="<?php echo $sal; ?>" <?php if($userData['salary']==$sal) { echo 'selected';} ?> > <?php echo $sal; ?> Lac's/Year</option>
                   	<?php } ?>
                    <option value="50+" <?php if($userData['salary']=='50+') { echo 'selected';} ?> > 50+ Lac's/Year</option>
                  </select>
                  <div class="col-md-1"></div>
                  <!-- <select class="form-control col-md-4" name="salary">
                    <option>thousand</option>
                    <option value="salary">-Salary-</option>
                    <option value="Rs. 0 /Yr">Rs. 0 /Yr</option>
                    <option value="500000 /Yr">&lt; 500000 /Yr</option>
                    <option value="500000 - 1 lakh / Yr">500000 - 1 lakh / Yr</option>
                    <option value="1.0 lakh - 2.0 lakh / Yr">1.0 lakh - 2.0 lakh / Yr</option>
                    <option value="2 lakh - 3 lakh / Yr">2 lakh - 3 lakh / Yr</option>
                  </select> -->
                </div>  
                <div class="form-group">
                  <label class="col-md-3"><strong>Current Job Details</strong></label>
                  <div class="col-lg-9">&nbsp;</div>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Job Title <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="job_title" placeholder="Job Title" required value="<?php echo $userData['job_title'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Company Name <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="company_name" placeholder="Company Name" required value="<?php echo $userData['company_name'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Type Of Company/Industry<span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="industry"  required>
                    <?php echo return_industry($userData['industry']); ?>
                  </select>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Functional Area <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="functional_area" required>
                    <?php echo return_functionalarea($userData['functional_area']); ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Current Job Start Date <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-4" name="current_job_date" id="datepicker" placeholder="Current Job Start Date in (YYYY-MM-DD)  Format" required value="<?php echo $userData['current_job_date'];?>">
                </div>
				
				<div class="form-group">
                  <label class="col-md-3"><strong>Previous Comapny Details</strong></label>
                  <div class="col-lg-9">&nbsp;</div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-3">Previous Company <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="pre_company" placeholder="Previous Company Name" value="<?php echo $userData['pre_company'];?>">
                </div>
				<div class="form-group">
                  <label class="col-md-3">Previous Location <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="pre_location" placeholder="Location" value="<?php echo $userData['pre_location'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Previous Job Title <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="pre_jobtitle" placeholder="Job Title" value="<?php echo $userData['pre_jobtitle'];?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Education Details</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container" >
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Qualification Level <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="qualification" required>
                    <?php echo return_qualification($userData['qualification']);?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Specialization <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="specialization" required>
                    <?php echo return_specialization($userData['specialization']);?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Institute Name <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="institute" placeholder="Institute Name" required value="<?php echo $userData['institute'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Year of Passout <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-2" name="passout" required>
                    <option value="">Select Year</option>
                    <?php $year = date('Y');
					for($yr=$year; $yr >= 1960; $yr--) {
					?>
                    <option value="<?php echo $yr; ?>" <?php if($userData['passout']==$yr) { echo 'selected';} ?> ><?php echo $yr; ?></option>
                   <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Course Type <span style="color:#F00;">*</span></label>
                  <div class="col-md-9"> <span class="col-md-2">
                    <input name="course" type="radio" value="Full Time" required <?php if($userData['course']=='Full Time') { echo 'checked';} ?> >
                    &nbsp; Full Time</span> <span class="col-md-2">
                    <input name="course" type="radio" value="Part Time" required <?php if($userData['course']=='Part Time') { echo 'checked';} ?> >
                    &nbsp; Part Time</span> <span class="col-md-3">
                    <input name="course" type="radio" value="Correspondence" required <?php if($userData['course']=='Correspondence') { echo 'checked';} ?> >
                    &nbsp; Correspondence</span> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Key Skills</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container" >
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Key Skills <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-4" name="key_skills" placeholder="Key Skills" required  value="<?php echo $userData['key_skills'];?>">&nbsp; <b>Note:- </b> Please add multiple skills comma(,) separated.
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
                  <label class="col-md-3">Upload New Resume </label>  
                  <input style="padding:0px; margin:0px;" type="file" class="form-control col-md-9" name="resume">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Change Profile Photo </label>  
                  <input style="padding:0px; margin:0px;" type="file" class="form-control col-md-9" name="profilepic">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--</div>-->
      <!-- <button type="button" class="col-xs-offset-5 btn btn-info">Cancel</button> --> 
      <button type="submit" class="col-xs-offset-5 btn btn-primary">Update Profile</button>
    </div>
  </form>
</div>
<?php include "footer.php"; ?>