<?php include "header.php"; ?>
<?php
$uid = $_SESSION["userdata"]['uid'];
$jid = $_REQUEST['jid'];
$searching =  $_POST['searching'];
$sqlJobs= "select jid, job_title, salary, industry, functional_area, qualification, contact_person, contact_number, contact_email, created from jobs where uid = $uid";
if($searching != '') {
	$sqlJobs .= " and job_title like '%$searching%'";
}
$qryjob = mysql_query($sqlJobs);
$jobCount = mysql_num_rows($qryjob);
if($jid != '') {
	$qrydelete = mysql_query("delete from jobs where jid = $jid");
	header('Location:jobs_postedby_me.php?mess=Job deleted successfully.');
}
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
		<div style="float:right"><form method="post"><input type='text' value='' placeholder="Search Here" name='searching' value="<?=@$_POST['searching']?>"></form></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
              	<table width="100%">
                	<tr>
                    	<th>Job Title</th>
                        <th>Salary</th>
                        <th>Industry</th>
                        <th>Functional Area</th>
                        <th>Qualification</th>
                        <th>Contact Person</th>
                        <th>Contact Email</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                    <?php if($jobCount>0) {
					while($fetchjob = mysql_fetch_array($qryjob)) { ?>
                    <tr>
                    	<td><?= $fetchjob['job_title']; ?></td>
                        <td><?= $fetchjob['salary']; ?> Lac's/Year</td>
                        <td><?= return_industry_name($fetchjob['industry']); ?></td>
                        <td><?= return_functionalarea_name($fetchjob['functional_area']); ?></td>
                        <td><?= return_qualification_name($fetchjob['qualification']); ?></td>
                        <td><?= $fetchjob['contact_person']; ?></td>
                        <td><?= $fetchjob['contact_email']; ?></td>
                        <td><?= $fetchjob['created']; ?></td>
                        <td> <a href="jobs_applications.php?jid=<?= $fetchjob['jid']; ?>" title="Delete">Applications</a> <b>|</b> <a href="job_post.php?jid=<?= $fetchjob['jid']; ?>" title="Edit">Edit</a> <b>|</b> <a href="jobs_postedby_me.php?jid=<?= $fetchjob['jid']; ?>" title="Delete">Delete</a></td>
                    </tr>
                    <?php } } else { echo "<tr><td colspan='9' align='center'><b>No records found.</b></td></tr>"; }?>
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