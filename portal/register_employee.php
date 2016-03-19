<?php include "header.php"; ?>
<?php
if($_SESSION['uid']=='') {header('Location:index.php?mess=Spme problem occured. Please try again later.');}
if($_POST){
	if($_POST['city']=='' || $_POST['work_experience']=='' || $_POST['salary']=='' || $_POST['company_name']=='' || $_POST['qualification']=='' || $_POST['institute']=='' || $_POST['key_skills']=='' ) {
		$mess ="Fields marked with (*) are mandatory.";
	}else if( $_FILES["resume"]["name"]=='' || $_FILES["profilepic"]["name"]=='') {
		$mess ="Resume and Photo uploads, both are mandatory.";
	}else {
		$appendvalue=time();
		$resume = $_FILES["resume"]["name"];
		$profilepic = $_FILES["profilepic"]["name"];
		if($resume!="") 
		{
		 	move_uploaded_file($_FILES["resume"]["tmp_name"],"./uploads/cv/".$appendvalue.$resume);         
		 	$resume=$appendvalue.$resume; 	
		}
		if($profilepic!="") 
		{
		 	move_uploaded_file($_FILES["profilepic"]["tmp_name"],"./uploads/photo/".$appendvalue.$profilepic);         
		 	$profilepic=$appendvalue.$profilepic; 	
		}
		$sqlIns = "INSERT INTO  `employee_info` (`uid` ,`country` ,`state` ,`city` ,`gender` ,`objective` ,`work_experience` ,`total_experience` ,`salary` ,`job_title` ,`company_name` ,`industry` ,`functional_area` ,`current_job_date` ,`qualification` ,`specialization` ,`institute` ,`passout` ,`course` ,`key_skills` ,`resume` ,`profilepic`) VALUES (  '".$_SESSION['uid']."', '".$_POST['country']."', '".$_POST['state']."', '".$_POST['city']."','".$_POST['gender']."','".$_POST['objective']."', '".$_POST['work_experience']."', '".$_POST['total_experience']."', '".$_POST['salary']."', '".$_POST['job_title']."', '".$_POST['company_name']."', '".$_POST['industry']."', '".$_POST['functional_area']."', '".$_POST['current_job_date']."', '".$_POST['qualification']."', '".$_POST['specialization']."', '".$_POST['institute']."', '".$_POST['passout']."', '".$_POST['course']."', '".$_POST['key_skills']."', '".$resume."', '".$profilepic."')";	
		$exe = mysql_query($sqlIns);
		header('Location:login.php?mess=Congratulations! You have comleted the registration with us. Please login and enjoy the fast job searching with us.');
	}
}
?>
<div align="center" style="color:#f00"><?php echo @$mess;?></div>
<div class="container" style="padding:10px 0;">
  <h3 style="color:#0096db; padding:10px 0;">New Employee Registration</h3>
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
                    <?php echo return_country(); ?>
                  </select>
				  <select class="form-control col-md-3" name="city" required>
                    <?php echo return_city(); ?>
                  </select>
                  <select class="form-control col-md-3" name="state" required>
                    <?php echo return_state(); ?>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label class="col-md-3">Gender <span style="color:#F00;">*</span></label>
                  <div class="col-md-9"> <span class="col-md-2">
                    <input name="gender" type="radio" value="male" required>
                    &nbsp; Male</span> <span class="col-md-2">
                    <input name="gender" type="radio" value="female" required>
                    &nbsp; Female</span> </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Career Objective <span style="color:#F00;">*</span></label>
                  <textarea name="objective" class="form-control col-md-9" cols="" rows="" required></textarea>
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
                    <input name="work_experience" type="radio" value="fresher" required>
                    &nbsp; Fresher</span> <span class="col-md-2">
                    <input name="work_experience" type="radio" value="experienced" required>
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
                  <input type="text" class="form-control col-md-9" name="job_title" placeholder="Job Title" required>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Company Name <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="company_name" placeholder="Company Name" required>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Type Of Company/Industry<span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="industry"  required>
                    <?php echo return_industry(); ?>
                  </select>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Functional Area <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="functional_area" required>
                    <?php echo return_functionalarea(); ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Current Job Start Date <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-4" id="datepicker" name="current_job_date" placeholder="Current Job Start Date" required>
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
                    <?php echo return_qualification();?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Specialization <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="specialization" required>
                    <?php echo return_specialization();?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Institute Name <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="institute" placeholder="Institute Name" required>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Year of Passout <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-3" name="passout" required>
                    <option value="">Select Year</option>
                    <?php $year = date('Y');
					for($yr=1950; $yr<=$year; $yr++) {
					?>
                    <option value="1"><?php echo $yr; ?></option>
                   <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Course Type <span style="color:#F00;">*</span></label>
                  <div class="col-md-9"> <span class="col-md-2">
                    <input name="course" type="radio" value="Full Time" required>
                    &nbsp; Full Time</span> <span class="col-md-2">
                    <input name="course" type="radio" value="Part Time" required>
                    &nbsp; Part Time</span> <span class="col-md-3">
                    <input name="course" type="radio" value="Correspondence" required>
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
                  <input type="text" class="form-control col-md-4" name="key_skills" placeholder="key skills" required>&nbsp; <b>Note:- </b> Please add multiple skills comma(,) separated.
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
                  <label class="col-md-3">Upload Resume <span style="color:#F00;">*</span></label>  
                  <input style="padding:0px; margin:0px;" type="file" class="form-control col-md-9" name="resume" required>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Upload Photo <span style="color:#F00;">*</span></label>  
                  <input style="padding:0px; margin:0px;" type="file" class="form-control col-md-9" name="profilepic" required>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!--</div>-->
      <!-- <button type="button" class="col-xs-offset-5 btn btn-info">Cancel</button> --> 
      <button type="submit" class="col-xs-offset-5 btn btn-primary">Register</button>
    </div>
  </form>
</div>
<?php include "footer.php"; ?>