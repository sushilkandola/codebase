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
	$userData = user_info($user_info['uid'], 'employer_info');
	if($_POST){
		$sqlupdate = "UPDATE  `employer_info` SET  `city` =  '". $_POST['city']."',
		`state` =  '". $_POST['state'] ."',
		`country` =  '". $_POST['country'] ."',
		`address` =  '". $_POST['address'] ."',
		`pincode` =  '". $_POST['pincode'] ."',
		`company_type` =  '". $_POST['company_type'] ."',
		`industry` =  '". $_POST['industry'] ."',
		`contact_number` =  '". $_POST['contact_number'] ."',
		`contact_person` =  '". $_POST['contact_person'] ."'";
		$sqlupdate .= " WHERE  `uid` =$uid";
		$exe = mysql_query($sqlupdate);
		header("Location:employers.php?mess=".base64_encode('User Profile Updated Successfully.'));
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
                <td width="200">Address</td>
                <td><input type="text" class="txtbox" name="address" id="" value="<?=$userData['address']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Pincode</td>
                <td><input type="text" class="txtbox" name="pincode" id="" value="<?=$userData['pincode']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Company Type</td>
                <td><input type="text" class="txtbox" name="company_type" id="" value="<?=$userData['company_type']?>"  required /></td>
              </tr>
			  <tr>
                <td width="200">Industry</td>
                <td>
				<select class="form-control col-md-9" name="industry"  required>
                    <?php echo return_industry($userData['industry']); ?>
                  </select>
				</td>
              </tr>
			  <tr>
                <td width="200">Contact Number	</td>
				 <td><input type="text" class="txtbox" name="contact_number" id="" value="<?=$userData['contact_number']?>" required  /></td>
              </tr>
			  <tr>
                <td width="200">Contact Person </td>
                <td><input type="text" class="txtbox" name="contact_person" id="" value="<?=$userData['contact_person']?>" required  /></td>
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