<?
require 'conn/Session.php';
require 'conn/MySQL.php';
require_once("includes/paging.inc.php");
require_once("includes/generalFunction.php");
  
$dbcon =  new MySQL();

require 'conn/checkSession.php';
$userId=$_SESSION['userId'];
$usr_id=$_POST['usr_id'];

$sqlDropDown="select * from profession where 1";
$ExecuteQuery=mysql_query($sqlDropDown) or die(mysql_error());
$countDropDown=mysql_num_rows($ExecuteQuery);

if($_POST['submit']) 
{
	if($_POST['user_status']) 
	{
		 $created_date=date("Y-m-d : H:i:s");
		//$content=array( "user_name"=>$_POST['user_name'],"email_id"=>$_POST['email_id'],"phone_number"=>$_POST['phone_number'],"user_status"=>$_POST['user_status'],"address1"=>$_POST['address1'],"address2"=>$_POST['address2'],"address3"=>$_POST['address3'],"city "=>$_POST['city'],"pincode"=>$_POST['pincode'],"user_date"=>$created_date);
		
	    $content=array("user_status"=>$_POST['user_status'],"user_date"=>$created_date);
		$condition=" where user_id =$usr_id";
		$dbcon->update_query("members",$content,$condition);
		$mess="Record updated successfully.";
		$url="userlist.php?mess=".base64_encode($mess);
		redirectPage($url);
	}
	else
	{
	   $mess="Please enter group name.";
	}
}
$dbcon->execute_query("select * from members where user_id =$usr_id");
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
					<b style='font-size:15px;'>	Update Users</b> 
				   </td>
			  </tr>
			</tbody>
			</table>
<form action='#' method='post' onSubmit="return checkall(this)" name="frm"> 
 <input type="hidden" value="<?=$usr_id?>" name="usr_id"?>
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
              <td width="81%" height="25" valign="top" >
              <input type="text" class="txtbox" value="<?=$Records['user_name']?>" name="user_name" id="user_name" disabled="disabled"/>
               </td> 
            </tr>
            <tr> 
              <th width="19%" align="right" valign="top">Email Id : </th> 
              <td width="81%" height="25" valign="top" >
              <input type="text" class="txtbox" value="<?=$Records['email_id']?>" name="email_id" id="email_id" disabled="disabled" />
               </td> 
            </tr>
               <tr> 
              <th width="19%" align="right" valign="top">Profession : </th> 
              <td width="81%" height="25" valign="top" >
            <select class="selectbox" name="profession_id" id="profession_id" disabled="disabled">
                    <?php
                         if($countDropDown>0)
						{ $i=0;
							while($records=mysql_fetch_array($ExecuteQuery))
							{
								
							?>
                    <option value="<?php echo $records['profession_id'];?>" <?php if($records['profession_id']==$Records['profession_id']){ ?> selected="selected" <?php }?> ><?php echo $records['profession_name']; ?></option>
                    <?php } } ?>
                  </select>
               </td> 
            </tr>
            <tr> 
              <th width="19%" align="right" valign="top">Phone Number : </th> 
              <td width="81%" height="25" valign="top" >
              <input type="text" class="txtbox" value="<?=$Records['phone_number']?>" name="phone_number" id="phone_number" disabled="disabled"/>
               </td> 
            </tr>
             <tr> 
              <th width="19%" align="right" style="vertical-align:middle;">Address1 : </th> 
              <td width="81%" height="25" valign="top" >
              <textarea cols="41" rows="5" name="address1" id="address1" class="txtbox" disabled="disabled"><?=$Records['address1']?></textarea>
               </td> 
            </tr>
           
      
            <tr> 
              <th width="19%" align="right" valign="top">City : </th> 
              <td width="81%" height="25" valign="top" >
              <input type="text" class="txtbox" value="<?=$Records['city']?>" name="city" id="city" disabled="disabled"/>
               </td> 
            </tr>
            <tr> 
              <th width="19%" align="right" valign="top">Pin Code : </th> 
              <td width="81%" height="25" valign="top" >
              <input type="text" class="txtbox" value="<?=$Records['pincode']?>" name="pincode" id="pincode" disabled="disabled"/>
               </td> 
            </tr>
            
                      
            
             <tr> 
              <th width="19%" align="right" valign="top">User Status : </th> 
              <td width="81%" height="25" valign="top" ><select name="user_status" id="user_status" class="selectbox">
             
                <option <?php if($Records['user_status']=='1'){?> selected="selected"<?php }?> value="1">Inactive</option>
              <option <?php if($Records['user_status']=='2'){?> selected="selected"<?php }?> value="2">Active</option>
               <option <?php if($Records['user_status']=='3'){?> selected="selected"<?php }?> value="3">Closed</option>
              <option <?php if($Records['user_status']=='4'){?> selected="selected"<?php }?> value="4">Allocated</option>
               <option <?php if($Records['user_status']=='5'){?> selected="selected"<?php }?> value="5">Booked</option>
              
              
              </select>
            
               </td> 
            </tr>
            <tr> 
              <td colspan="2" class="last" align="left" style="padding-left:210px;"> <input name="submit" type="submit" class="button" value="Update" onclick="return pubValidate();"> 
				&nbsp;&nbsp; 
                <input name="Submit623" type="button" class="button" value="Cancel" onClick="javascript:window.location='userlist.php'"> 
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
	
    if(isBlank("user_name")==false)
	{
	  alert("Please enter name.\n");
	   document.getElementById('user_name').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(InitialSpace("user_name")==false) {  msg +="Please remove initial space from name.\n";   		  ret = false; 	   }
		if(isSpclChar("user_name")==false)   {  msg +="Please remove special characters from name.\n";  	  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("user_name"); return false;}
    }
	
	 if(isBlank("Address1")==false)
	{
	  alert("Please enter address.\n");
	     document.getElementById('Address1').focus();
	  return false; 
	}
	else
	{
		msg = "";  
	    ret = true;
		if(InitialSpace("Address1")==false) {  msg +="Please remove initial space from address.\n";   		  ret = false; 	   }
		if(ret == false) { alert(msg); setFocus("Address1"); return false;}
    }
   return true;
}
</script>-->
    </body>
  
</html>
