<?
require 'conn/Session.php';
require 'conn/MySQL.php';
require_once("includes/paging.inc.php");
require_once("includes/generalFunction.php");

$dbcon =  new MySQL();
require 'conn/checkSession.php';

$sqlDropDown="select * from city where 1";
$ExecuteQuery=mysql_query($sqlDropDown) or die(mysql_error());
$countDropDown=mysql_num_rows($ExecuteQuery);


$dbcon->execute_query("select * from locality where locality_id=$loc_id");
$user=$dbcon->fetch_one_record();
$mess =""; 
$message1="";
if($_POST['submit']) 
{   $appendvalue=time();
                          
	if($_POST['locality_name']) 
	{    
		 $created_date=date("Y-m-d : H:i:s");
		 if($_FILES["locality_info_file"]["name"]!="") 
		 {
		  move_uploaded_file($_FILES["locality_info_file"]["tmp_name"],"./upload/".$appendvalue.$_FILES["locality_info_file"]["name"]);         
		  $locality_info_file= $appendvalue.$_FILES['locality_info_file']['name']; 																													         }
		else
		 {
		   $message1.= "empty file<br />";	
		 }
		 if($_FILES["locality_map_file"]["name"]!="")
		 {
		    if ((($_FILES["locality_map_file"]["type"] == "image/gif")|| ($_FILES["locality_map_file"]["type"] == "image/jpeg")|| ($_FILES["locality_map_file"]["type"] == "image/pjpeg")))
		    {
			 move_uploaded_file($_FILES["locality_map_file"]["tmp_name"],"./upload/".$appendvalue.$_FILES["locality_map_file"]["name"]);
			 $locality_map_file= $appendvalue.$_FILES['locality_map_file']['name']; 
		     }
		     else
		     {
			$mess.= "Please upload locality map image only<br />";
		      }
		  }
		 else
		 {
			 $message2.= "empty file<br />";	
		 }
		
		 if($mess=="")
		 {
		 if(($message1=="") && ($message2==""))
		 {
			$content=array( "locality_name"=>$_POST['locality_name'],"city_id"=>$_POST['city_id'],"current_rate_psf"=>$_POST['current_rate_psf'],"locality_info_file"=>$locality_info_file,"locality_map_file"=>$locality_map_file,"locality_date"=>$created_date); 
		 }
		 elseif($message1=="")
		 {
			$content=array( "locality_name"=>$_POST['locality_name'],"city_id"=>$_POST['city_id'],"current_rate_psf"=>$_POST['current_rate_psf'],"locality_info_file"=>$locality_info_file,"locality_date"=>$created_date); 
		 }
		 elseif($message2=="")
		 {
			$content=array( "locality_name"=>$_POST['locality_name'],"city_id"=>$_POST['city_id'],"current_rate_psf"=>$_POST['current_rate_psf'],"locality_map_file"=>$locality_map_file,"locality_date"=>$created_date); 
		 }
		 else
		 {
			$content=array( "locality_name"=>$_POST['locality_name'],"city_id"=>$_POST['city_id'],"current_rate_psf"=>$_POST['current_rate_psf'],"locality_date"=>$created_date);
		 }
		
		$dbcon->insert_query("locality",$content);
		$mess="Record created successfully.";
		$url="localitylist.php?mess=".base64_encode($mess);
		redirectPage($url);
	 }
		 else
		 {
			 echo $mess;
			 
			 
		 }
	}
	else
	{
		$mess="Please enter locality name.";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Panel</title>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/ajaxfile.js"></script>
<script type="text/javascript"src="js/zxml.js"></script>
<script language="javascript" src="js/fixedTextArea.js"></script>
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <? include('left.php'); ?>
  <!--Put content here -->
  <div id="main-content">
    <!-- Main Content Section with everything -->
    <!-- Page Head -->
    <h2>Welcome
      <?=ucfirst($_SESSION["username"]); ?>
    </h2>
    <tr>
      <td><br></td>
    </tr>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td class="content-box-header"><b style='font-size:15px;'> Add Locality</b></td>
        </tr>
      </tbody>
    </table>
    <form action='#' method='post' enctype="multipart/form-data" onSubmit="return checkall(this)" name="frm" >
      <table border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><table width="100%"  border="0" cellspacing="7" cellpadding="3">
              <? if($mess) {
            
      echo '<tr> 
              <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.$mess.'</font></td> 
            </tr> ';
            } ?>
              <tr>
                <td width="19%" align="right" valign="top">Locality Name : </td>
                <td width="81%" height="25" valign="top" ><input type="text" class="txtbox" value="" name="locality_name" id="locality_name" /></td>
              </tr>
              <!--<tr>
                <td width="19%" align="right" valign="top">City Name : </td>
                <td width="81%" height="25" valign="top" ><select class="selectbox" name="city_id" id="city_id">
                 <option value="-1">Select City</option>
                    <?php
                         if($countDropDown>0)
						{ $i=0;
							while($records=mysql_fetch_array($ExecuteQuery))
							{
							?>
                    <option value="<?php echo $records['city_id']; ?>"><?php echo $records['city_name']; ?></option>
                    <?php } } ?>
                  </select>
                 </td>
              </tr>-->
              <tr>
                <td width="19%" align="right" valign="top">Current Rate Psf : </td>
                <td width="81%" height="25" valign="top" ><input type="text" class="txtbox" value="" name="current_rate_psf" id="current_rate_psf" /></td>
              </tr>
              <tr>
                <td width="19%" align="right" style="vertical-align:middle;">Locality Info File : </td>
                <td width="81%" height="25" valign="top"><input type="file" class="txtbox" value="" name="locality_info_file" id="locality_info_file" /></td>
              </tr>
              <tr>
                <td width="19%" align="right" valign="top">Locality Map File  : </td>
                <td width="81%" height="25" valign="top" ><input type="file" class="txtbox" value="" name="locality_map_file" id="locality_map_file" /></td>
              </tr>
              <tr>
                <td colspan="2" class="last" align="left" style="padding-left:210px;"><input name="submit" type="submit" class="button" value="Submit">
                  &nbsp;&nbsp;
                  <input name="Submit623" type="button" class="button" value="Cancel" onClick="javascript:window.location='localitylist.php'"></td>
              </tr>
            </table></td>
        </tr>
      </table>
    </form>
    <!-- End #tab1 -->
    <? 
		require('footer.php')
 ?>
  </div>
  <!-- End #main-content -->
</div>
</div>
<!--<script>
	 
	 function checkall(obj) 
{
	/*name*/
    if(isBlank("locality_name")==false)
	{
	  alert("Please enter locality name.\n");
	   document.getElementById('locality_name').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(InitialSpace("locality_name")==false) {  msg +="Please remove initial space from locality name.\n";   		  ret = false; 	   }
		if(isSpclChar("locality_name")==false)   {  msg +="Please remove special characters from locality name.\n";  	  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("locality_name"); return false;}
    }
	 if(selectbox("city_id")==false)
	{
	  alert("Please enter city name.\n");
	  document.getElementById('city_id').focus();
	  return false; 
	}
	/*current_rate_psf*/
	 if(isBlank("current_rate_psf")==false)
	{
	  alert("Please enter current rate per square feet.\n");
	     document.getElementById('current_rate_psf').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		//if(isNumeric("current_rate_psf")==false)( msg +="Please enter Numeric Value Only. \n ";ret = false; }
		if(InitialSpace("current_rate_psf")==false) {  msg +="Please remove initial space from current rate per square feet.\n";   		  ret = false; 	   }
		if(isSpclChar("current_rate_psf")==false)   {  msg +="Please remove special characters from current rate per square feet.\n";  	  ret = false; 	   }
		if(isNumeric("current_rate_psf")==false)   {  msg +="Please enter numeric value only.\n";  	  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("current_rate_psf"); return false;}
    }
	
	
	
	
	
	
	/*discounted_rate_psf*/
	
	 
	/*project_terms*/
	
   return true;
}

</script>-->
</body>
</html>
