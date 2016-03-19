<?php include "header.php"; ?>
<?php
$uid = $_SESSION["userdata"]['uid'];
$id = $_REQUEST['id'];
$qryjob_aply = mysql_query("select id, jid, created from jobs_apply where uid = $uid");
$jobCount = mysql_num_rows($qryjob_aply);


if($id != '') {
	$qrydelete = mysql_query("delete from jobs_apply where id = $id");
	header('Location:jobs_applied.php?mess=Job remvedo successfully.');
}
?>
<div class="container" style="padding:10px 0;">
  <h3 style="color:#0096db; padding:10px 0;">Jobs Applied</h3>
  <div style="background-color:#f0f0f0; padding:5px 0px; border:solid 3px #ccc; height:50px;">
  <form name="search" action="search.php" method="get">
    <p class="col-md-2 advance-text">Search for Jobs</p>
    <div class="col-md-2">
      <input type="text" class="form-control " style="width:100%" name="skills" placeholder="Skills" required><br/>
    </div>
    <div class="col-md-2">
      <select class="form-control" name="experience"  style="width:100%"  required>
        <option value="">Select Experience</option>
        <?php for($exp=0; $exp<40; $exp++) {	?>
        <option value="<?php echo $exp; ?>"><?php echo $exp; ?> Year's</option>
       <?php } ?>
      </select>
    </div>
    <div class="col-md-2">
      <select class="form-control" name="salary" style="width:100%" >
        <option value="">Salary</option>
         <?php for($sal=1; $sal<50; $sal++) {	?>
        <option value="<?php echo $sal; ?>"> <?php echo $sal; ?> Lac's/Year</option>
        <?php } ?>
        <option value="50+"> 50+ Lac's/Year</option>
      </select>
    </div>
    <div class="col-md-2">
      <select class="form-control" name="city" style="width:100%" >
		<?php echo return_city($userData['city']); ?>
      </select>
    </div>
    <div class="col-md-2">
      <button class="btn btn-sm btn-primary btn-block" style="width:100%" type="submit">Search</button>
    </div>
    <div align="left">&nbsp;</div>
    </form>
  </div>
  <form action="" method="post">
    <div class="row"> 
      <!--<div class="panel-group" id="accordion">-->
      <div class="progress-bar toggle active" data-progress="60">
        <h6 class="progress-bar-title">View Jobs</h6>
        <div class="progress-bar-inner"><span></span></div>
        <div class="progress-bar-content">
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
                        <th>Applied On</th>
                        <th>Action</th>
                    </tr>
                    <?php if($jobCount>0) { 
					while($fetchjob_aply = mysql_fetch_array($qryjob_aply)) {
						$jid = $fetchjob_aply['jid'];
						$qryjob = mysql_query("select jid, job_title, salary, industry, functional_area, qualification, contact_person, contact_number, contact_email, created from jobs where jid = $jid");
						$fetchjob = mysql_fetch_array($qryjob);
 ?>
                    <tr>
                    	<td><?= $fetchjob['job_title']; ?></td>
                        <td><?= $fetchjob['salary']; ?></td>
                        <td><?= return_industry_name($fetchjob['industry']); ?></td>
                        <td><?= return_functionalarea_name($fetchjob['functional_area']); ?></td>
                        <td><?= return_qualification_name($fetchjob['qualification']); ?></td>
                        <td><?= $fetchjob['contact_person']; ?></td>
                        <td><?= $fetchjob['contact_email']; ?></td>
                        <td><?= $fetchjob_aply['created']; ?></td>
                        <td><a href="jobs_applied.php?id=<?= $fetchjob_aply['id']; ?>" title="Delete">Remove</a></td>
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