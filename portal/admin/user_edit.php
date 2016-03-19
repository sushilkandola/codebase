<?
	require 'conn/Session.php';
	require 'conn/MySQL.php';
	require_once("includes/paging.inc.php");
	require_once("includes/generalFunction.php");
	$dbcon =  new MySQL();
    require 'conn/checkSession.php';
	$uid = $_REQUEST['uid']; 
	
	$user_info = mysql_query("select * from users where uid=$uid");
	$user_info = mysql_fetch_array($user_info);
	$userData = user_info($user_info['uid'], 'employee_info');
	if($_POST){
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
		`key_skills` =  '". $_POST['key_skills'] ."'";
		$sqlupdate .= " WHERE  `uid` =$uid";
		$exe = mysql_query($sqlupdate);
		header("Location:employees.php?mess=".base64_encode('User Profile Updated Successfully.'));
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
          <td class="content-box-header"><b style='font-size:15px;'> Update User Info </b></td>
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
        <td><form name="chPass" method="post" action="" onsubmit="return chkempty()">
            <table cellpadding="0" cellspacing="0" border="0">
			<input type="hidden" name="uid" value="<?=$userData['uid']?>">
              <tr>
                <td width="200">Full Name</td>
                <td><input type="text" class="txtbox" name="name" id="" value="<?=$user_info['fullname']?>" readonly required /></td>
              </tr>
              <tr>
                <td width="200">Email</td>
                <td><input type="text" class="txtbox" name="email" id="" value="<?=$user_info['emailid']?>" readonly required  /></td>
              </tr>
			  <tr>
                <td width="200">Address</td>
                <td>
				 <select class="form-control col-md-3" name="country" required>
                    <?php echo return_country($userData['country']); ?>
                  </select>
				  <select class="form-control col-md-3" name="city" required>
                    <?php echo return_city($userData['city']); ?>
                  </select>
				  <select class="form-control col-md-3" name="state" required>
                    <?php echo return_state($userData['state']); ?>
                  </select>
				</td>
              </tr>
			  
			  <tr>
                <td width="200">Gender</td>
                <td>
				 <input name="gender" type="radio" value="Male" required <?php if($userData['gender']=='Male') { echo 'checked';} ?> >
                    &nbsp; Male</span> <span class="col-md-2">
                    <input name="gender" type="radio" value="Female" required <?php if($userData['gender']=='Female') { echo 'checked';} ?> >
                    &nbsp; Female</span> 
				</td>
              </tr>
			  <tr>
                <td width="200">Objective</td>
                <td><input type="text" class="txtbox" name="objective" id="" value="<?=$userData['objective']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Work Experience</td>
                <td><input type="text" class="txtbox" name="work_experience" id="" value="<?=$userData['work_experience']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Total Experience</td>
                <td><input type="text" class="txtbox" name="total_experience" id="" value="<?=$userData['total_experience']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Salary</td>
                <td>
					<select class="form-control col-md-4" name="salary" required>
                    <option value="">Salary</option>
                     <?php for($sal=1; $sal<50; $sal++) {	?>
                    <option value="<?php echo $sal; ?>" <?php if($userData['salary']==$sal) { echo 'selected';} ?> > <?php echo $sal; ?> Lac's/Year</option>
                   	<?php } ?>
                    <option value="50+" <?php if($userData['salary']=='50+') { echo 'selected';} ?> > 50+ Lac's/Year</option>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Job Title</td>
                <td><input type="text" class="txtbox" name="job_title" id="" value="<?=$userData['job_title']?>"  required /></td>
              </tr>
			  <tr>
                <td width="200">Company Name</td>
                <td><input type="text" class="txtbox" name="company_name" id="" value="<?=$userData['company_name']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Industry	</td>
                <td>
				<select class="form-control col-md-9" name="industry"  required>
                    <?php echo return_industry($userData['industry']); ?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Functional Area</td>
                <td>
				 <select class="form-control col-md-9" name="functional_area" required>
                    <?php echo return_functionalarea($userData['functional_area']); ?>
                  </select>
				  </td>
              </tr>
			  <tr>
                <td width="200">Current  Job </td>
                <td><input type="text" class="txtbox" name="current_job_date" id="" value="<?=$userData['current_job_date']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Qualification</td>
                <td>
				<select class="form-control col-md-9" name="qualification" required>
                    <?php echo return_qualification($userData['qualification']);?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Specialization</td>
                <td>
				<select class="form-control col-md-9" name="specialization" required>
                    <?php echo return_specialization($userData['specialization']);?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Institute</td>
                <td><input type="text" class="txtbox" name="institute" id="" value="<?=$userData['institute']?>"  required /></td>
              </tr>
			  <tr>
                <td width="200">Passout</td>
                <td>
				<select class="form-control col-md-2" name="passout" required>
                    <option value="">Select Year</option>
                    <?php $year = date('Y');
					for($yr=$year; $yr >= 1960; $yr--) {
					?>
                    <option value="<?php echo $yr; ?>" <?php if($userData['passout']==$yr) { echo 'selected';} ?> ><?php echo $yr; ?></option>
                   <?php } ?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Key Skills</td>
                <td><input type="text" class="txtbox" name="key_skills" id="" value="<?=$userData['key_skills']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Course	</td>
                <td>
					<input name="course" type="radio" value="Full Time" required <?php if($userData['course']=='Full Time') { echo 'checked';} ?> >
                    &nbsp; Full Time</span> <span class="col-md-2">
                    <input name="course" type="radio" value="Part Time" required <?php if($userData['course']=='Part Time') { echo 'checked';} ?> >
                    &nbsp; Part Time</span> <span class="col-md-3">
                    <input name="course" type="radio" value="Correspondence" required <?php if($userData['course']=='Correspondence') { echo 'checked';} ?> >
                    &nbsp; Correspondence</span>	
				</td>
              </tr>
			  <tr>
                <td>&nbsp;</td>
                <td colspan=""><input type="submit" name="subBtn" value="Save" class='button'/></td>
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