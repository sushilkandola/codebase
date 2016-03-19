<?php include "header.php"; ?>
<?php
$jid = $_REQUEST['jid'];
if($jid=='') { echo '<center>Sorry! Direct access not allowed.</center>'; exit;}
$uid = $_SESSION["userdata"]['uid'];
$applied = date('Y-m-d');
$insert =  mysql_query("insert into jobs_apply (uid, jid, created) values ('$uid', '$jid', '$applied')");
?>
<div class="container" style="padding:10px 0;">
  
  <div class="omb_login">
    <div class="row omb_row-sm-offset-3">
    
      <div class="col-xs-12 col-sm-6">
      <h3 style="color:#0096db; padding:10px 0;">Apply for Job</h3>
        <div>
        	Dear <b> <?=ucfirst($_SESSION["userdata"]['fullname']);?> </b>, you have applied for the job successfully. We have sent a notification to the employer for your job interest. <br/><br/>Warm Regards:<br/>Team Heygetmeajob<br/><br/><br/>
        </div>	
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>