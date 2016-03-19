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
    $sql="select * from users where utype='employer' ";
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
		   echo "<SCRIPT language=\"JavaScript\">window.location=\"employers.php?mess=".base64_encode($mess)."\";</SCRIPT>";
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
			<select name="pagesize" id="pagesize" onchange="location.href='employers.php?&pagesize='+this.value">
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
					<b style='font-size:15px;'>List of Employers</b> 
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
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Full Address</b> </th>
              <th align="left" width="30%" bgcolor="#FFFFFF"><b>Country</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Company Type</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Industry</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Contact Number</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Contact Person</b> </th>
              <th align="left" width="1%" bgcolor="#FFFFFF"><b>Account Created</b> </th>
			  <th align="left" width="1%" bgcolor="#FFFFFF"><b>Others</b> </th>
              </tr>
              <?
				$i=0;
             	while($records=mysql_fetch_array($Exec)) {
				if($i%2==0){$CL="#CCCCCC";}else{$CL="#FFFFFF";}
				$user_info = user_info($records['uid'], 'employer_info');
              ?>
			  <tr>
				<td align="center" bgcolor='<?=$CL?>'><input name="arr_pd_ids[]" id="arr_pd_ids[]" value="<?=$records['uid']?>" type="checkbox"></td>
                <td bgcolor='<?=$CL?>'><? echo $records['fullname'];?> </td>
                <td bgcolor='<?=$CL?>'><a href="user_edit_empr.php?uid=<?=$records['uid']?>"><? echo $records['emailid'];?></a> </td>
                <td bgcolor='<?=$CL?>'><? echo $records['mobile'];?> </td>
				<td bgcolor='<?=$CL?>'><? echo $user_info['address']. ' ' . return_city_name($user_info['city']). ' ' . return_state_name($user_info['state']);?> </td>
                <td bgcolor='<?=$CL?>'><? echo return_country_name($user_info['country']).'('.$user_info['pincode'].')';?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['company_type'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo return_industry_name($user_info['industry']);?> </td>
				<td bgcolor='<?=$CL?>'><? echo $user_info['contact_number'];?> </td>
                <td bgcolor='<?=$CL?>'><? echo $user_info['contact_person'];?> </td>
				<td bgcolor='<?=$CL?>'><? echo $records['created'];?> </td>
				<td bgcolor='<?=$CL?>'><a href="jobs.php?status=published&uid=<?=$records['uid']?>">Jobs Posted</a> </td>
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