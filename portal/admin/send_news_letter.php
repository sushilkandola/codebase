<?
require 'conn/Session.php';
require 'conn/MySQL.php';
require_once("includes/paging.inc.php");
require_once("includes/generalFunction.php");
require_once("classes/mail.class.php");
require_once("classes/getname.class.php");
$dbcon =  new MySQL();
require 'conn/checkSession.php';
$mail_id= new admin_user();

if($_POST['submit']) 
{
	if($_POST['email_id']) 
	{   
	        $user_email_id.=$_POST['email_id'].',';
			$user_email_array=substr("$user_email_id", 0, -1);
			$user_email_id_list=explode(",",$user_email_array);
			
			foreach($user_email_id_list as $user)
			{  
			    //echo $user."<br>";
				$mail_id->send_news_letter($user);
			}
		$mess="Mail sent successfully.";
		$url="send_news_letter.php?mess=".base64_encode($mess);
		redirectPage($url);
	}
	
		move_uploaded_file($_FILES["file"]["tmp_name"], "uploads_newsletter/" . $_FILES["file"]["name"]);
		$filename="uploads_newsletter/".$_FILES['file']['name'];
		
		if($_FILES['file']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
		set_include_path(get_include_path() . PATH_SEPARATOR . '../PhpExcel2007/classes/classes_newsletter/');
		require_once('classes/classes_newsletter/PHPExcel.php');
		require_once('classes/classes_newsletter/PHPExcel/IOFactory.php');
		$excelReader = PHPExcel_IOFactory::createReader('Excel2007'); //we instantiate a reader object
		$excel = $excelReader->load($filename); //and load the document
			for ($i = 1; $i <15000; $i++) 
			{
				$fetch_email=$excel->getActiveSheet()->getCell('A' . $i)->getValue();
				if(!empty($fetch_email))
				{
				$user_email_id.=$fetch_email.',';
				$user_email_array=substr("$user_email_id", 0, -1);
				$user_email_id_list=explode(",",$user_email_array);
					foreach($user_email_id_list as $fetch_email)
					{  
						$mail_id->send_news_letter($fetch_email);
					}
				}
			}
				$mess="Mail sent successfully.";
				$url="send_news_letter.php?mess=".base64_encode($mess);
				redirectPage($url);
		}
		else
		if($_FILES['file']['type']=="application/vnd.ms-excel")
		{
		require_once 'classes/classes_newsletter/excel_reader2.php';
		$data = new Spreadsheet_Excel_Reader($filename);
		$row_count=$data->rowcount($sheet_index=0);
			for($var=1; $var<=$row_count; $var++)
			{	
				
				$fetch_email=$data->val($var,'A');
				if(!empty($fetch_email))
				{
					$mail_id->send_news_letter($fetch_email);
				/* $user_email_id.=$fetch_email .',';
				$user_email_array=substr("$user_email_id", 0, -1);
				$user_email_id_list=explode(",",$user_email_array);
					foreach($user_email_id_list as $fetch_email)
					{  
						echo "aaa". $fetch_email ."<br>";
						//$mail_id->send_news_letter($fetch_email);
					} */
				}
			}
				$mess="Mail sent successfully.";
				$url="send_news_letter.php?mess=".base64_encode($mess);
				redirectPage($url);
		}
		else {
			//	echo "Please upload only Excels Files.";
				$mess="Please upload only Excel File.";
				$url="send_news_letter.php?mess=".base64_encode($mess);
				redirectPage($url);
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
					<b style='font-size:15px;'>Send News Letter</b> 
				   </td>
			  </tr>
			</tbody>
			</table>
      <form action='send_news_letter.php' method='post' onSubmit="return checkall(this)" enctype="multipart/form-data" name="frm" > 
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td>
                    <table width="100%"  border="0" cellspacing="7" cellpadding="3"> 
<? if($_GET['mess']) {
            
      echo '<tr> 
              <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.base64_decode($_GET['mess']).'</font></td> 
            </tr>';
			
            } ?>
                <tr> 
                  <td width="19%" align="right" valign="top">Email id : </td> 
                  <td width="81%" height="25" valign="top" > 
                              <input type="text" class="txtbox" value="" name="email_id" id="email_id" />
       </td> 
                </tr>
                <tr>
                	<td width="19%" align="right" valign="top">&nbsp; </td> 
                	<td colspan="2" align="left"><strong>OR</strong></td></tr>
                <tr>
                	<td width="19%" align="right" valign="top">Upload Excel File : </td> 
                	<td><input type="file" name="file" value="file" size="43" />&nbsp;&nbsp;</td></tr><!--( Only <strong>.xls</strong> or <strong>.xlsx</strong> )-->
                <tr> 
              <td colspan="2" class="last" align="left" style="padding-left:210px;"> <input name="submit" type="submit" class="button" value="Submit"> 
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
</div>

 <!-- End #main-content -->
	</div>
	</div>
  
    </body>
</html>
<!--<script language="javascript" type="text/javascript">
function checkall(obj) 
    {
	if(isBlank("email_id")==false)
		{
		  alert("Please Enter Email Id.\n");
		   document.getElementById('email_id').focus();
		  return false; 
		}
	else
		{
			msg = "";  
			ret = true;
			if(InitialSpace("email_id")==false) {  msg +="Please remove Initial Space From Email Id.\n";   		  ret = false; 	   }
			if(emailValidator("email_id")==false) {  msg +="Please Enter a Valid Email Id.\n";   		  ret = false; 	   }
					if(ret == false) { alert(msg); setFocus("email_id"); return false;}
		}
      return true;
    }
    
</script>

-->