<?php include "header.php"; ?>
<?php
$jid = $_REQUEST['jid'];
if($_POST) {
	if($_POST['job_title']=='' || $_POST['job_description']=='' || $_POST['skills']=='' || $_POST['salary']=='' || $_POST['qualification']=='' || $_POST['city']=='' || $_POST['company']==''|| $_POST['address']==''|| $_POST['contact_number']==''|| $_POST['contact_person']==''|| $_POST['country']=='' ) {
		$mess ="Fields marked with (*) are mandatory.";
	}else {
		if(!$jid) {
			$created = date('Y-m-d');
			$sqlIns = "INSERT INTO  `jobs` (`uid` ,`job_title` ,`num_vacancy` ,`job_description` ,`skills` ,`total_experience` ,`salary` ,`salary_info` ,`country` ,`state` , `city` ,`industry` ,`functional_area` ,`specialization` ,`qualification`,`company` ,`about_company` ,`webiste` ,`address` ,`contact_number` ,`contact_email` ,`contact_person`  ,`contract_type`,`status`,`created`) VALUES (  '".$_SESSION['userdata']['uid']."', '".$_POST['job_title']."', '".$_POST['num_vacancy']."', '".$_POST['job_description']."','".$_POST['skills']."','".$_POST['total_experience']."', '".$_POST['salary']."', '".$_POST['salary_info']."', '".$_POST['country']."', '".$_POST['state']."', '".$_POST['city']."', '".$_POST['industry']."', '".$_POST['functional_area']."', '".$_POST['specialization']."', '".$_POST['qualification']."', '".$_POST['company']."', '".$_POST['about_company']."', '".$_POST['webiste']."', '".$_POST['address']."', '".$_POST['contact_number']."', '".$_POST['contact_email']."', '".$_POST['contact_person']."', '".$_POST['contract_type']."', 'pending' ,'".$created."')";	
			$exe = mysql_query($sqlIns);
			// Send mail to admin
			$useremail = $_SESSION["userdata"]['emailid'];
			job_posted_mail(ADMIN_EMAIL, $useremail, $_POST['job_title'], $_POST['city']);
			header('Location:job_post.php?mess=Your job will be published with in 24 hours. You will receive notification email once job is approved.');
		} else {
			$sqlupdate = "UPDATE  `jobs` SET  
			`job_title` =  '". $_POST['job_title']."',
			`num_vacancy` =  '". $_POST['num_vacancy'] ."',
			`job_description` =  '". $_POST['job_description'] ."',
			`skills` =  '". $_POST['skills'] ."',
			`total_experience` =  '". $_POST['total_experience'] ."',
			`salary` =  '". $_POST['salary'] ."',
			`salary_info` =  '". $_POST['salary_info'] ."',
			`country` =  '". $_POST['country'] ."',
			`state` =  '". $_POST['state'] ."',
			`city` =  '". $_POST['city'] ."',
			`industry` =  '". $_POST['industry'] ."',
			`functional_area` =  '". $_POST['functional_area'] ."',
			`specialization` =  '". $_POST['specialization'] ."',
			`qualification` =  '". $_POST['qualification'] ."',
			`about_company` =  '". $_POST['about_company'] ."',
			`webiste` =  '". $_POST['webiste'] ."',
			`contact_number` =  '". $_POST['contact_number'] ."',
			`contact_email` =  '". $_POST['contact_email'] ."',
			`contact_person` =  '". $_POST['contact_person'] ."',
			`contract_type` =  '". $_POST['contract_type'] ."',
			`status` = 'published' ";
			$sqlupdate .= " WHERE  `jid` =$jid"; 
			$exe = mysql_query($sqlupdate);
			header("Location:job_post.php?jid=$jid&mess=Job has been updated successfully.");
		}
	}
}
if($jid) {
	$selJob = "select * from jobs where jid=$jid";
	$fetchJob = mysql_fetch_array(mysql_query($selJob));
}
?>
<div align="center" style="color:#f00"><?php echo @$mess;?></div>

<div class="container" style="padding:10px 0;">
  <h3 style="color:#0096db; padding:10px 0;">Post Job</h3>
  <form action="" method="post">
	<input type="hidden" name="jid" value="<?=$jid;?>">
    <div class="row"> 
      <!--<div class="panel-group" id="accordion">-->
      
      <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Job Details</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Job Title / Designation <span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="job_title" placeholder="Job Title" required  value="<?=$fetchJob['job_title'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Number of Vacancies </label>
                  <input type="text" class="form-control col-md-9" name="num_vacancy" value="<?=$fetchJob['num_vacancy'];?>" placeholder="Number of Vacancies">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Job Description<span style="color:#F00;">*</span></label>
                  <textarea name="job_description" class="form-control col-md-9" cols="" rows=""  required><?=$fetchJob['job_description'];?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Skills Required<span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="skills" placeholder="Use Multiple words separated by commas" required value="<?=$fetchJob['skills'];?>">
                  <p>Use Multiple words separated by commas</p>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Total Experience <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-4" name="total_experience" required>
                    <option value="">Select Experience</option>
                    <?php for($exp=0; $exp<30; $exp++) {	?>
                    <option value="<?php echo $exp; ?>" <?php if($fetchJob['total_experience']==$exp) { echo 'selected';} ?> ><?php echo $exp; ?> Year's</option>
                   <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Current Annual Salary <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-4" name="salary" required>
                    <option value="">Salary</option>
                     <?php for($sal=1; $sal<50; $sal++) {	?>
                    <option value="<?php echo $sal; ?>" <?php if($fetchJob['salary']==$sal) { echo 'selected';} ?> > <?php echo $sal; ?> Lac's/Year</option>
                   	<?php } ?>
                    <option value="50+" <?php if($userData['salary']=='50+') { echo 'selected';} ?> > 50+ Lac's/Year</option>
                  </select>
                  <div class="col-md-1"></div>
                </div>  
                <div class="form-group">
                  <label class="col-md-3">Other Salary Details</label>
                  <input type="text" class="form-control col-md-9" name="salary_info" placeholder="Salary Details" value="<?=$fetchJob['num_vacancy'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Location of Job <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-3" name="country" required>
                    <?php echo return_country($fetchJob['country']); ?>
                  </select>
				  <select class="form-control col-md-3" name="city" required>
                    <?php echo return_city($fetchJob['city']); ?>
                  </select>
                  <select class="form-control col-md-3" name="state" required>
                    <?php echo return_state($fetchJob['state']); ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Type Of Company/Industry<span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="industry"  required>
                    <?php echo return_industry($fetchJob['industry']); ?>
                  </select>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Functional Area <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="functional_area" required>
                    <?php echo return_functionalarea($fetchJob['functional_area']); ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Type Of Contract <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="contract_type" required>
                    <option value="">Please Select</option>
                    <option value="Full-Time" <?php if($fetchJob['contract_type']=='Full-Time') { echo 'selected';} ?> >Full-Time</option>
                    <option value="Part-Time" <?php if($fetchJob['contract_type']=='Part-Time') { echo 'selected';} ?> >Part-Time</option>
                    <option value="Freelance" <?php if($fetchJob['contract_type']=='Freelance') { echo 'selected';} ?> >Freelance</option>
                    <option value="Internship" <?php if($fetchJob['contract_type']=='Internship') { echo 'selected';} ?> >Internship</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Desired Candidate Profile</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Specity Qualification <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="qualification" required>
                    <?php echo return_qualification($fetchJob['qualification']);?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Specity Specialization <span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-9" name="specialization" required>
                    <?php echo return_specialization($fetchJob['specialization']);?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Employer and Recruiter Details</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container" >
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Company Name<span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="company" placeholder="Company Name" required value="<?=$fetchJob['company'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">About Company <span style="color:#F00;">*</span></label>
                  <textarea name="about_company" class="form-control col-md-9" cols="" rows="" required> <?=$fetchJob['about_company'];?></textarea>
                </div>
                <div class="form-group">
                  <label class="col-md-3">Company Website<span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="webiste" placeholder="Company Website" required value="<?=$fetchJob['webiste'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Contact Person <span style="color:#F00;">*</span></label>
                 <input type="text" class="form-control col-md-9" name="contact_person" placeholder="Contact Person" required value="<?=$fetchJob['contact_person'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Contact Email <span style="color:#F00;">*</span></label>
                 <input type="text" class="form-control col-md-9" name="contact_email" placeholder="Contact Email" required value="<?=$fetchJob['contact_email'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Address<span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="address" placeholder="Company Address" required value="<?=$fetchJob['address'];?>">
                </div>
                <div class="form-group">
                  <label class="col-md-3">Contact Number<span style="color:#F00;">*</span></label>
                  <input type="text" class="form-control col-md-9" name="contact_number" placeholder="Contact Number" required value="<?=$fetchJob['contact_number'];?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Manage Response</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container" >
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Received Responses on<span style="color:#F00;">*</span></label> <input type="text" class="form-control col-md-9" name="institutename" placeholder="Contact Number">
                  
                  
                </div>
                <div class="form-group">
                  <label class="col-md-3">Reference Code<span style="color:#F00;">*</span></label> <input type="text" class="form-control col-md-9" name="institutename" placeholder="Contact Number">
                  
                  
                </div>
                <div class="form-group">
                  <label class="col-md-3">Set Response Preferences<span style="color:#F00;">*</span></label>  <input type="checkbox" name="agree">
          &nbsp; Send only the most relevant applications to my mail
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
      <!--<div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Job Visibility Option</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container" >
            <div class="row">
              <div class="col-md-12">
                fsfds
              </div>
            </div>
          </div>
        </div>
      </div>-->
     
     <!--  <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
        <h6 class="progress-bar-title">Schedule Refresh</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container" >
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-md-3">Refresh this job every<span style="color:#F00;">*</span></label>
                  <select class="form-control col-md-4" name="total">
                    <option value="">-Select Experience-</option>
                    <option value="0yr">0 Yr</option>
                    <option value="1yr">1 Yr</option>
                    <option value="2yr">2 Yr</option>
                    <option value="3yr">3 Yr</option>
                    <option value="4yr">4 Yr</option>
                    <option value="5yr">5 Yr</option>
                  </select>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div> -->
      
      <!--</div>-->
      <button type="submit" class="col-xs-offset-5  btn btn-primary">Update the Job</button>
    </div>
  </form>
</div>
<?php include "footer.php"; ?>