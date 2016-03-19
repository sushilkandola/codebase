<?
require 'conn/Session.php';
require 'conn/MySQL.php';
require_once("includes/paging.inc.php");
require_once("includes/generalFunction.php");
  
$dbcon =  new MySQL();

require 'conn/checkSession.php';
$userId=$_SESSION['userId'];
$adminusr_id=$_POST['adminusr_id'];

$sqlDropDown1="select * from city where 1";
$ExecuteQuery1=mysql_query($sqlDropDown1) or die(mysql_error());
$countDropDown1=mysql_num_rows($ExecuteQuery1);

if($_POST['submit']) 
{
	if($_POST['admin_user_name']) 
	{
		 $created_date=date("Y-m-d : H:i:s");
		//$content=array( "admin_user_name"=>$_POST['admin_user_name'],"email_id"=>$_POST['email_id'],"phone_number"=>$_POST['phone_number'],"status_id"=>$_POST['status_id'],"city_id"=>$_POST['city_id'],"admin_user_date"=>$created_date);
		
		$content=array( "admin_user_name"=>$_POST['admin_user_name'],"email_id"=>$_POST['email_id'],"phone_number"=>$_POST['phone_number'],"user_type"=>$_POST['user_type'],"status_id"=>$_POST['status_id'],"city_id"=>$_POST['city_id'],"admin_user_date"=>$created_date);
		
	    //$content=array("user_status"=>$_POST['user_status'],"user_date"=>$created_date);
		$condition=" where admin_user_id =$adminusr_id";
		
		$dbcon->update_query("admin_user",$content,$condition);
		$mess="Record updated successfully.";
		$url="adminuser.php?mess=".base64_encode($mess);
		redirectPage($url);
	}
	else
	{
	   $mess="Please enter admin user name.";
	}
}
$dbcon->execute_query("select * from admin_user where admin_user_id =$adminusr_id");
$Records=$dbcon->fetch_one_record();
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
		
		<!--                       CSS                       -->
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		<!--Javascripts-->
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
	  <?  include('left.php'); ?>
        <!--Put content here -->
  <div id="main-content"> <!-- Main Content Section with everything -->
            <!-- Page Head -->
			<h2>Welcome  <?=ucfirst($_SESSION["username"]); ?></h2>
				 <tr>
		<td>
			<br>	
		</td></tr>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			  <tbody>
			  <tr>
				<td class="content-box-header">
					<b style='font-size:15px;'>	Update Admin Users</b> 
				   </td>
			  </tr>
			</tbody>
			</table>
<form action='#' method='post' onSubmit="return checkall(this)" name="frm"> 
 <input type="hidden" value="<?=$adminusr_id?>" name="adminusr_id"?>
		<table border="0" cellpadding="0" cellspacing="0">
            <? if($_REQUEST['mess']) 
			   {
				  echo '<tr> 
					 <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.$_REQUEST['mess'].'</font></td>
					</tr>';
			  } ?>
			<tr>
				<td>
                   <table width="100%"  border="0" cellspacing="7" cellpadding="3" > 
			<? if($mess) 
			{
				  echo '<tr> 
					 <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.$mess.'</font></td>
					</tr>';
			} ?>
            <tr> 
              <th width="19%" align="right" valign="top">User Name : </th> 
              <td width="81%" height="25" valign="top" ><input type="text" class="txtbox" value="<?=$Records['admin_user_name']?>" name="admin_user_name" id="admin_user_name"/></td> 
            </tr>
            <tr> 
              <th width="19%" align="right" valign="top">Email Id : </th> 
              <td width="81%" height="25" valign="top" ><input type="text" class="txtbox" value="<?=$Records['email_id']?>" name="email_id" id="email_id"  /></td> 
            </tr>
            <tr> 
              <th width="19%" align="right" valign="top">Phone Number : </th> 
              <td width="81%" height="25" valign="top" >
              <input type="text" class="txtbox" value="<?=$Records['phone_number']?>" name="phone_number" id="phone_number" />
               </td> 
            </tr>
            <tr> 
              <th width="19%" align="right" valign="top">User Type : </th> 
              <td width="81%" height="25" valign="top" ><select name="user_type" id="user_type" class="selectbox">
             
                <option <?php if($Records['user_type']=='Edit'){?> selected="selected"<?php }?> value="Edit">Edit</option>
              	<option <?php if($Records['user_type']=='View'){?> selected="selected"<?php }?> value="View">View</option>
                <option <?php if($Records['user_type']=='Seo'){?> selected="selected"<?php }?> value="Seo">Seo</option>
              	<option <?php if($Records['user_type']=='Broker'){?> selected="selected"<?php }?> value="Broker">Broker</option>
             
              
              
              </select>
            
               </td> 
            </tr>
            
           
      
            <tr> 
              <th width="19%" align="right" valign="top">City : </th> 
              <td width="81%" height="25" valign="top" ><select class="selectbox" name="city_id" id="city_id">
               <option value="-1">Select City</option>
                    <?php
                         if($countDropDown1>0)
						{ $i=0;
							while($records1=mysql_fetch_array($ExecuteQuery1))
							{
								
							?>
                           <option value="<?php echo $records1['city_id'];?>" <?php if($records1['city_id']==$Records['city_id']){ ?> selected="selected" <?php }?>><?php echo $records1['city_name']; ?></option>   
                    
                    <?php } } ?>
                  </select>
              
             
               </td> 
            </tr>
           
            
            
            
             <tr> 
              <th width="19%" align="right" valign="top">User Status : </th> 
              <td width="81%" height="25" valign="top" ><select name="status_id" id="status_id" class="selectbox">
             
                <option <?php if($Records['status_id']=='1'){?> selected="selected"<?php }?> value="1">Inactive</option>
              	<option <?php if($Records['status_id']=='2'){?> selected="selected"<?php }?> value="2">Active</option>
             
              
              
              </select>
            
               </td> 
            </tr>
            <tr> 
              <td colspan="2" class="last" align="left" style="padding-left:210px;"> <input name="submit" type="submit" class="button" value="Update" onclick="return pubValidate();"> 
				&nbsp;&nbsp; 
                <input name="Submit623" type="button" class="button" value="Cancel" onClick="javascript:window.location='adminuser.php'"> 
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
        <!-- End Content here-->
        
        <!-- End #main-content -->
		
	</div>
    <!--<script>
		 
	 function checkall(obj) 
{
	/*name*/
    if(isBlank("admin_user_name")==false)
	{
	  alert("Please enter name.\n");
	   document.getElementById('admin_user_name').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(InitialSpace("admin_user_name")==false) {  msg +="Please remove initial space from name.\n";   		  ret = false; 	   }
		if(isSpclChar("admin_user_name")==false)   {  msg +="Please remove special characters from name.\n";  	  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("admin_user_name"); return false;}
    }
	
	 if(isBlank("email_id")==false)
	{
	  alert("Please enter email id.\n");
	   document.getElementById('email_id').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(InitialSpace("email_id")==false) {  msg +="Please remove initial space from name.\n";   		  ret = false; 	   }
		if(emailValidator("email_id")==false) {  msg +="Please enter a valid email id.\n";   		  ret = false; 	   }
				if(ret == false) { alert(msg); setFocus("email_id"); return false;}
    }
	
	
	  if(isBlank("phone_number")==false)
	{
	  alert("Please enter phone number.\n");
	   document.getElementById('phone_number').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(countlength("phone_number",9)==false){msg +="Please enter minimum 10 digit phone number.\n";   		  ret = false; 	}
		if(InitialSpace("phone_number")==false) {  msg +="Please remove initial space from phone number.\n";   		  ret = false; 	   }
		if(isSpclChar("phone_number")==false)   {  msg +="Please remove special characters from phone number.\n";  	  ret = false; 	   }
		if(isNumeric("phone_number")==false)   {  msg +="Please enter a valid phone number.\n";  	  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("phone_number"); return false;}
    }
	 if(selectbox("city_id")==false)
	{
	  alert("Please enter city name.\n");
	  document.getElementById('city_id').focus();
	  return false; 
	}
	
	
   return true;
}
</script>-->
    </body>
  
</html>
