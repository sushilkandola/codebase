<?
require 'conn/Session.php';
require 'conn/MySQL.php';
require_once("includes/paging.inc.php");
require_once("includes/generalFunction.php");

$dbcon =  new MySQL();
require 'conn/checkSession.php';

$dbcon->execute_query("select * from flat_size_type where status_id=$sta_id");
$user=$dbcon->fetch_one_record();
if($_POST['submit']) 
{
	if($_POST['status_name']) 
	{   $created_date=date("Y-m-d : H:i:s");
	
		$content=array( "status_name"	=>strtoupper($_POST['status_name']));
		$dbcon->insert_query("status",$content);
		$mess="Record created successfully.";
		$url="statuslist.php?mess=".base64_encode($mess);
		redirectPage($url);
	}
	else
	{
		$mess="Please enter status name.";
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
					<b style='font-size:15px;'>	Add Status</b> 
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
                <tr> 
                  <td width="19%" align="right" valign="top">Status Name : </td> 
                   
                  <td width="81%" height="25" valign="top" > 
                              <input type="text" class="txtbox" value="" name="status_name" id="status_name" />
       </td> 
                </tr>
                <!--  <tr> 
                  <td width="19%" align="right" valign="top">Status Description : </td> 
                   
                  <td width="81%" height="25" valign="top" > 
                              <input type="text" class="txtbox" value="" name="status_des" id="status_des" />
       </td> 
                </tr>-->
               
                <tr> 
              <td colspan="2" class="last" align="left" style="padding-left:210px;"> <input name="submit" type="submit" class="button" value="Submit"> 
                &nbsp;&nbsp; 
                <input name="Submit623" type="button" class="button" value="Cancel" onClick="javascript:window.location='statuslist.php'"> 
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
    if(isBlank("status_name")==false)
	{
	  alert("Please enter status name.\n");
	   document.getElementById('status_name').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(InitialSpace("status_name")==false) {  msg +="Please remove initial space from status name.\n";   		  ret = false; 	   }
		if(isSpclChar("status_name")==false)   {  msg +="Please remove special characters from status name.\n";  	  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("status_name"); return false;}
    }
	
   return true;
}

</script>-->
   
    </body>
</html>

