<?
	require 'conn/Session.php';
	require 'conn/MySQL.php';
	require_once("includes/paging.inc.php");
	require_once("includes/generalFunction.php");
	$dbcon =  new MySQL();
    require 'conn/checkSession.php';
	$jid = $_REQUEST['jid']; 
	
	$job_info = mysql_query("select * from jobs where jid=$jid");
	$job_info = mysql_fetch_array($job_info);
	$user = get_user($job_info['uid']);
	if($_POST){
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
			`contact_person` =  '". $_POST['contact_person'] ."'";
			$sqlupdate .= " WHERE  `jid` =$jid"; 
			// echo $sqlupdate; die;
			$exe = mysql_query($sqlupdate);
		header("Location:jobs.php?status=published&mess=".base64_encode('Job Updated Successfully.'));
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
          <td class="content-box-header"><b style='font-size:15px;'> Update Job </b></td>
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
			<input type="hidden" name="uid" value="<?=$job_info['jid']?>">
              <tr>
                <td width="200">Posted By</td>
                <td><input type="text" class="txtbox" name="name" id="" value="<?=$user['fullname']?>" readonly required /></td>
              </tr>
              <tr>
                <td width="200">Email</td>
                <td><input type="text" class="txtbox" name="email" id="" value="<?=$user['emailid']?>" readonly required  /></td>
              </tr>
			  <tr>
                <td width="200">Location</td>
                <td>
				 <select class="form-control col-md-3" name="country" required>
                    <?php echo return_country($job_info['country']); ?>
                  </select>
				  <select class="form-control col-md-3" name="city" required>
                    <?php echo return_city($job_info['city']); ?>
                  </select>
				  <select class="form-control col-md-3" name="state" required>
                    <?php echo return_state($job_info['state']); ?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Job Title</td>
                <td><input type="text" class="txtbox" name="job_title" id="" value="<?=$job_info['job_title']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Num Vacancy</td>
                <td><input type="text" class="txtbox" name="num_vacancy" id="" value="<?=$job_info['num_vacancy']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Job Description</td>
                <td> <textarea name="job_description" required cols="65" rows="12"><?=$job_info['job_description']?></textarea></td>
              </tr>
			  <tr>
                <td width="200">Total Experience</td>
                <td><input type="text" class="txtbox" name="total_experience" id="" value="<?=$job_info['total_experience']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Salary</td>
                <td>
					<select class="form-control col-md-4" name="salary" required>
                    <option value="">Salary</option>
                     <?php for($sal=1; $sal<50; $sal++) {	?>
                    <option value="<?php echo $sal; ?>" <?php if($job_info['salary']==$sal) { echo 'selected';} ?> > <?php echo $sal; ?> Lac's/Year</option>
                   	<?php } ?>
                    <option value="50+" <?php if($job_info['salary']=='50+') { echo 'selected';} ?> > 50+ Lac's/Year</option>
                  </select>  Lac's/Year
				</td>
              </tr>
			  <tr>
                <td width="200">Job skills</td>
                <td><input type="text" class="txtbox" name="skills" id="" value="<?=$job_info['skills']?>"  required /></td>
              </tr>
			  <tr>
                <td width="200">Industry	</td>
                <td>
				<select class="form-control col-md-9" name="industry"  required>
                    <?php echo return_industry($job_info['industry']); ?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Functional Area</td>
                <td>
				 <select class="form-control col-md-9" name="functional_area" required>
                    <?php echo return_functionalarea($job_info['functional_area']); ?>
                  </select>
				  </td>
              </tr>
			  <tr>
                <td width="200">Qualification</td>
                <td>
				<select class="form-control col-md-9" name="qualification" required>
                    <?php echo return_qualification($job_info['qualification']);?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Specialization</td>
                <td>
				<select class="form-control col-md-9" name="specialization" required>
                    <?php echo return_specialization($job_info['specialization']);?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Company Name</td>
                <td><input type="text" class="txtbox" name="company" id="" value="<?=$job_info['company']?>"  required /></td>
              </tr>
			 
			  <tr>
                <td width="200">About Company</td>
                <td><input type="text" class="txtbox" name="about_company" id="" value="<?=$job_info['about_company']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Webiste</td>
                <td><input type="text" class="txtbox" name="webiste" id="" value="<?=$job_info['webiste']?>" required  /></td>
              </tr>
			   <tr>
                <td width="200">Contact Person</td>
                <td><input type="text" class="txtbox" name="contact_person" id="" value="<?=$job_info['contact_person']?>" required  /></td>
              </tr>
			   <tr>
                <td width="200">Address</td>
                <td><input type="text" class="txtbox" name="address" id="" value="<?=$job_info['address']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Contact Number</td>
                <td><input type="text" class="txtbox" name="contact_number" id="" value="<?=$job_info['contact_number']?>" required  /></td>
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