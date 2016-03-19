<?php include "header.php"; ?>
<?php
	$pid = $_REQUEST['id'];
	$page = mysql_fetch_array(mysql_query("SELECT * FROM cmspage WHERE id=$pid and status='Active'"));

?>
<div class="container" style="padding:10px 0;">
  
  <div class="omb_login">
    <div class="row omb_row-sm-offset-3">
    
      <div class="col-xs-12 col-sm-6">
      <h3 style="color:#0096db; padding:10px 0;"><?php  echo $page['heading'];?></h3>
        <div><?php  echo stripslashes($page['page_content']);?></div>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>