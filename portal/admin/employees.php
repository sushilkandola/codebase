<?
	require 'conn/Session.php';
	require 'conn/MySQL.php';
	require_once("includes/paging.inc.php");
	require_once("includes/generalFunction.php");
	
	$dbcon =  new MySQL();
    require 'conn/checkSession.php';
	$paging = new Pager;
	$pagesize=$_GET['pagesize']; 
	$fullname= $_POST['fullname'];
	$emailid= $_POST['emailid'];
    $sql="select * from users where utype='employee' ";
	if($fullname !='' ) {
		$sql .= " and fullname LIKE '%$fullname%'";
	}
	if($emailid !='' ) {
		$sql .= " and emailid LIKE '%$emailid%'";
	}
	$sql .= " order by uid";
	 $limit=$paging->pageSize($pagesize);
	$start = $paging->findStart($limit);
	$ExecQuery=mysql_query($sql) or die(mysql_error());
	$count=mysql_num_rows($ExecQuery);
	$pages =$paging->findPages($count, $limit);
	$pagelist = $paging->pageList($_GET['page'], $pages,$pagesize);
	$showingR=$paging->showingRecords($start,$limit,$count);

	$orderBy=$_REQUEST['order_by'];
	$orderBy2=$_REQUEST['order_by2'];
	if(!empty($orderBy) && !empty($orderBy2))
	{
	 $orders="order by $orderBy $orderBy2";
    }
	$Exec=mysql_query("$sql $orders LIMIT  $start , $limit") or die(mysql_error());
    $countrecord=mysql_num_rows($Exec);
	if(!empty($_POST)) 
	 {
	   if($_POST['changeStatus']=='delete') 
		{
		   $cit_id=implode(",", $_POST['arr_pd_ids']);
		   $dbcon->execute_query("delete from users where uid in($cit_id)");
		   $mess="Record deleted successfully.";
		   echo "<SCRIPT language=\"JavaScript\">window.location=\"employees.php?mess=".base64_encode($mess)."\";</SCRIPT>";
		}
     }
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Admin Panel</title>
        <script type="text/javascript" src="js/general.js"></script>
         <script type="text/javascript" src="js/ajaxfile.js"></script>
         <script type="text/javascript"src="js/zxml.js"></script>
		<!--                       CSS                       -->
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
    <div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
	  <? include('left.php');	?>
        <!--Put content here -->
     <div id="main-content"> <!-- Main Content Section with everything -->
            <!-- Page Head -->
			<h2>Welcome <?=ucfirst($_SESSION["username"]); ?></h2>
				 <tr>
		<td>
			<br>	
					<?
  if($countrecord>0) { 
  ?>

		<div align="right">Showing Records: <?=$showingR?></div>
		<div>Records Per Page:
			<select name="pagesize" id="pagesize" onchange="location.href='employees.php?&pagesize='+this.value">
           		<option value="10" <? if($pagesize==10){echo "selected";} ?>>10</option>
				<option value="25" <? if($pagesize==25){echo "selected";} ?>>25</option>
				<option value="50" <? if($pagesize==50){echo "selected";} ?>>50</option>
				<option value="100" <? if($pagesize==100){echo "selected";} ?>>100</option>
			 </select>
		</div><br />

		<?
	}
		?>
		</td></tr>
			
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			  <tbody>
			  <tr>
				<td class="content-box-header">
					<b style='font-size:15px;'>Employees List</b> 
					<div style="float:right">
						<form method="post">
							<b>Search: </b> &nbsp; <input type="text" name="fullname" placeholder="Search By Name" value="<?=$fullname?>">  &nbsp; 
							<input type="text" name="emailid" placeholder="Search By Email"  value="<?=$emailid?>"> &nbsp; 
							<input type="submit" name="submit" value="Search"> &nbsp; 
							<a href="employees.php"><b><u>Clear Search</u></b></a>
						</form>
					</div>
				   </td>
			  </tr>
			</tbody>
			</table>
		<table border="0" cellpadding="0" cellspacing="0">
         <? if($_REQUEST['mess']) 
			   {
				  echo '<tr> 
					 <td width="81%" height="25" valign="top" colspan="2"><font color="red">'.base64_decode($_REQUEST['mess']).'</font></td>
					</tr>';
			  } ?>
			<tr>
				<td>
        <form method="post" name="frm" id="form1" onsubmit="return chkForm(this);">
        <input type="hidden" name="changeStatus" id="changeStatus">
        <input type="hidden" name="cit_id" id="cit_id">
	     <table class="tableList" border="0" cellpadding="0" cellspacing="1" width="100%">
		  <tbody>
  <?
  if($countrecord>0) {
    ?>
		  <tr>
			 <th width="2%" bgcolor="#FFFFFF">
			 	<input name="check_all" id="check_all" value="1" onclick="checkall(this.form)"  type="checkbox">
			  </th>			 
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>User Name</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>User Email</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Mobile</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Address</b> </th>
              <th align="left" width="30%" bgcolor="#FFFFFF"><b>gender</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Objective</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Work Experience</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Total Experience</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Salary</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Job Title</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Company Name</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Industry</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Functional Area</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Specialization</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Qualification</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Job Date</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Institute</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Passout</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Course</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Key Skills</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Posted On</b> </th>
              </tr>
              <?
				$i=0;
             	while($records=mysql_fetch_array($Exec)) {
				if($i%2==0){$CL="#CCCCCC";}else{$CL="#FFFFFF";}
				$user_info = user_info($records['uid'], 'employee_info');
              ?>
			  <tr>
				<td align="center" bgcolor='<?=$CL?>'><input name="arr_pd_ids[]" id="arr_pd_ids[]" value="<?=$records['uid']?>" type="checkbox"></td>
                <td bgcolor='<?=$CL?>'><? echo $records['fullname'];?> </td>
                <td bgcolor='<?=$CL?>'><a href="user_edit.php?uid=<?=$records['uid']?>"><? echo $records['emailid'];?></a> </td>
                <td bgcolor='<?=$CL?>'><? echo $records['mobile'];?> </td>
				<td bgcolor='<?=$CL?>'><? echo return_city_name($user_info['city']). ' ' . return_state_name($user_info['state']), ' '. return_country_name($user_info['country']);?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['gender'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['objective'];?> </td>
				<td bgcolor='<?=$CL?>'><? echo $user_info['work_experience'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['total_experience'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['salary'];?> </td>
				<td bgcolor='<?=$CL?>'><? echo $user_info['job_title'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['company_name'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo return_industry_name($user_info['industry']);?> </td>
                <td bgcolor='<?=$CL?>'><? echo return_functionalarea_name($user_info['functional_area']);?> </td>
                <td bgcolor='<?=$CL?>'><? echo return_specialization_name($user_info['specialization']);?> </td>
                <td bgcolor='<?=$CL?>'><? echo return_qualification_name($user_info['qualification']);?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['current_job_date'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['institute'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['passout'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['course'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['key_skills'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $records['created'];?> </td>
  			</tr>
              <?
         $i++; }
              ?>
                     
            </tbody>
          </table>
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
   		  <tr>
            <td style="padding: 2px;" ><br />
			        <input name="Delete" id="Delete"  value="Delete" class="button" onclick="return deleteConfirmFromUser('arr_pd_ids[]')" 
                    type="submit" style="border:0px;" />
            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
          <tr>
          	<td>
          		<table border="0" cellpadding="0" cellspacing="0" width="100%">
	          		<tr>
	          			
	          			<td width="90%" align="center">
	          			<?
	          			
	          			if($count>$limit){
		          			
		          		echo $pagelist;	
	          			}
	          			
	          			?>
	          			</td>
	          			
	          		</tr>
          		</table>
           	
          	</td>
          </tr>
          <?
      }else{
	      
	     echo '<tr>
          	<td align="center">
          		No Records
           	
          	</td>
          </tr>';
	      
	      
      }
          ?>
        </tbody>
        </table>
      </form>
		</td>
			</tr>
        </table>	
	 <!-- End #tab1 -->
    <? require('footer.php') ?>
</div> <!-- End #main-content -->
</div>
      <!-- End Content here-->
      <!-- End #main-content -->
</div></body>
  
</html>