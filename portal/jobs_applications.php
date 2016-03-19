<?php include "header.php"; ?>
<?php
$uid = $_SESSION["userdata"]['uid'];
$jid = $_REQUEST['jid'];
$qryjob = mysql_query("select * from jobs_apply where jid	='$jid' order by jid");
$jobCount = mysql_num_rows($qryjob);


?>
<div class="container" style="padding:10px 0;">
  <h3 style="color:#0096db; padding:10px 0;">Jobs Listing</h3>
  <form action="" method="post">
    <div class="row"> 
      <!--<div class="panel-group" id="accordion">-->
      
      <div class="progress-bar toggle active" data-progress="60">
        <h6 class="progress-bar-title">View My Jobs</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
              	<table width="100%">
                	<tr>
                    	<th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <?php if($jobCount>0) {
						$counter = 0;
					while($fetchjob = mysql_fetch_array($qryjob)) {
					$user = get_user($fetchjob['uid']);
						if($user['utype']=='employee') {
						$counter++;
					?>
                    <tr>
                    	<td><? echo $counter; ?></td>
                        <td> <? echo $user['fullname'];?>  </td>
                        <td> *****************  </td>
						<td> *****************  </td>
                        <td>View Info</td>
                    </tr>
                    <?php } }  } else { echo "<tr><td colspan='9' align='center'><b>No records found.</b></td></tr>"; }?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </form>
</div>
<?php include "footer.php"; ?>