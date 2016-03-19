<?
require 'conn/Session.php';
require 'conn/MySQL.php';
require_once("includes/paging.inc.php");
require_once("includes/generalFunction.php");

$dbcon =  new MySQL();
require 'conn/checkSession.php';

//$dbcon->execute_query("select * from city where id=$cit_id");
//$user=$dbcon->fetch_one_record();
if($_POST['submit']) 
{
	$sqlcheck_user="select id from city where city_name='".$_POST['city_name']."'";
	$result1=mysql_query($sqlcheck_user) or die(mysql_error());
	  if(mysql_num_rows($result1) > 0)
	   {
		$url="add_city.php?mess=City Name Already Exist";
		redirectPage($url);
		exit;
	   }	
	else if($_POST['city_name']) 
	{   $created_date=date("Y-m-d : H:i:s");
		$content=array( "city_name"	=>$_POST['city_name'],"cid"	=>$_POST['cid'],"sid" =>$_POST['sid'],"city_date"=>$created_date);
		$dbcon->insert_query("city",$content);
		$mess="Record created successfully.";
		$url="citylist.php?mess=".base64_encode($mess);
		redirectPage($url);
	}
	else
	{
		$mess="Please enter city name.";
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
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
	 <? include('left.php'); ?>
        <!--Put content here -->
<div id="main-content"> 
<!-- Main Content Section with everything -->
<!-- Page Head -->
	<h2>Welcome <?=ucfirst($_SESSION["username"]); ?></h2>
	 <tr>
		<td>
			<br>	
		</td></tr>
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			  <tbody>
			  <tr>
				<td class="content-box-header">
					<b style='font-size:15px;'>	Add Metropolitan Area</b> 
				   </td>
			  </tr>
			</tbody>
			</table>
      <form action='#' method='post' onSubmit="return checkall(this)" name="frm" > 
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td>
                    <table width="100%"  border="0" cellspacing="7" cellpadding="3"> 
<? if($mess) {
            
      echo '<tr> 
              <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.$mess.'</font></td> 
            </tr> ';
            } ?>
             <? if($_REQUEST['mess']) 
			   {
				  echo '<tr> 
					 <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.$_REQUEST['mess'].'</font></td>
					</tr>';
			  } ?>
            <tr> 
              <td width="19%" align="right" valign="top">Country : </td> 
              <td width="81%" height="25" valign="top" ><select name="cid" class="txtbox"><?php return_country($Records['cid']);?></select></td> 
            </tr>
            <tr> 
              <td width="19%" align="right" valign="top">State : </td> 
              <td width="81%" height="25" valign="top" ><select name="sid" class="txtbox"><?php return_state($Records['sid']);?></select></td> 
            </tr>
            <tr> 
              <td width="19%" align="right" valign="top">City Name : </td> 
              <td width="81%" height="25" valign="top" ><input type="text" class="txtbox" value="" name="city_name" id="city_name" />   </td> 
            </tr>
            <tr> 
              <td colspan="2" class="last" align="left" style="padding-left:210px;"> <input name="submit" type="submit" class="button" value="Submit"> 
                &nbsp;&nbsp; 
                <input name="Submit623" type="button" class="button" value="Cancel" onClick="javascript:window.location='citylist.php'"> 
              </td> 
            </tr> 
          </table>
                </td>
            </tr>
        </table>	
		</form>
			 <!-- End #tab1 -->
    <? 
		require('footer.php')
 ?>
</div> <!-- End #main-content -->
	</div>
	</div>
     <!--<script>
	 
	 function checkall(obj) 
{
	/*name*/
    if(isBlank("city_name")==false)
	{
	  alert("Please enter city name.\n");
	   document.getElementById('city_name').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(InitialSpace("city_name")==false) {  msg +="Please remove initial space from city name.\n";   		  ret = false; 	   }
		if(isSpclChar("city_name")==false)   {  msg +="Please remove special characters from city name.\n";  	  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("city_name"); return false;}
    }
	
   return true;
}

</script>-->
   
    </body>
</html>

