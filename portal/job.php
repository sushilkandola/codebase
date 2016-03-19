<?php include "header.php";
include "paging.inc.php";
$paging = new Pager;
$pagesize=$_GET['pagesize'];
$limit=$paging->pageSize($pagesize);
$start = $paging->findStart($limit);

$jid = $_REQUEST['jid'];
$sql_job = "SELECT * FROM jobs where jid=$jid";
$Exec=mysql_query($sql_job) or die(mysql_error());
$fetch = mysql_fetch_array($Exec);

?>   
<script>
function validate()
{
   if( document.searching.academic.value == "" )
   {
     alert( "Please provide your academic!" );
     return false;
   }
   else if( document.searching.subject.value == "" )
   {
     alert( "Please provide your subject!" );
     return false;
   }
   return( true );
}
$(document).ready(function(){
$("#academic").change(function () {        
    var value = $('#academic option:selected').val();
	$.ajax({
		type:'post',
		async:false,
		url:'lib/get_subjects.php?page=home&name='+value,
		dataType: "text",
		cache: false,
		success: function(data) {
			$( "#subjects" ).html(data);
		}
	});	   
});
});
function check_selectedClass(value) {
	$.ajax({
		type:'post',
		async:false,
		url:'lib/get_subjects.php?page=search&name='+value,
		dataType: "text",
		cache: false,
		success: function(data) {
			$( "#subjects" ).html(data);
			//alert(data);
		}
	});	
}
</script>
<div id="page-content">
  <div class="container">
    <div class="row">

      <div class="col-sm-1"></div>
      <div class="col-sm-10 page-content">         
        <div class="title-lines">
          <h3 class="mt0">Job Details</h3>
        </div>
        <div class="clearfix">
          <!-- <ul class="pagination pull-right">
            <li><a href="#" class="fa fa-angle-left"></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#" class="fa fa-angle-right"></a></li>
          </ul> -->
        </div>
        <div class="jobs-item jobs-single-item">
          <div class="clearfix visible-xs"></div>
          <div class="date">&nbsp;<?php echo date("d M", strtotime($fetch['created'])); ?>&nbsp;<span><?php echo date("Y", strtotime($fetch['created'])); ?></span></div>
          <h6 class="title" ><a><?=$fetch['job_title'];?> </a></h6>
          <span class="meta"> <?= return_city_name($fetch['city']); ?>, <?= return_state_name($fetch['state']); ?>,  <?= return_country_name($fetch['country']); ?></span>
          <div style="text-transform:capitalize; margin-top:10px; font-size:13px;"><strong>Experience Required:</strong> <?=$fetch['total_experience']?> Year's</div>
          <div style="text-transform:capitalize; margin-top:10px; font-size:13px;"><strong>Salary Offered:</strong> <?=$fetch['salary']?> Lac's/Year</div>
          <h6 style="text-transform:capitalize; margin-top:10px; font-size:13px;">Skills Requirements</h6>
          <ul class="additional-requirements clearfix">
          <?php $skills = explode(',', $fetch['skills']); 
		  foreach($skills as $skill) { ?>
            <li><?=$skill;?></li>
          <?php } ?>
          </ul> 
      
          <div class="toggleInfo<?=$fetch['jid']?>">
              <p><b>Job Description:</b> <?=$fetch['job_description'];?></p>
              <hr>
              <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
                <h6 class="progress-bar-title" style="text-transform:capitalize">Additional Requirements</h6>
                <div class="progress-bar-inner"><span></span></div>
                <div class="progress-bar-content in">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><strong>Functional Area: </strong> <?=return_functionalarea_name($fetch['functional_area']);?></td>
                    </tr>
                    <tr>
                      <td><strong>Specialization Area: </strong> <?=return_specialization_name($fetch['specialization']);?></td>
                    </tr>
                    <tr>
                      <td><strong>Essential Qualification: </strong> <?=return_qualification_name($fetch['qualification']);?></td>
                    </tr>
                    <tr>
                      <td><strong>No. of Openings:</strong>  <?=$fetch['num_vacancy'];?> Positions</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
                <h6 class="progress-bar-title" style="text-transform:capitalize">Company Profile</h6>
                <div class="progress-bar-inner"><span></span></div>
                <div class="progress-bar-content in">
                  <h4 style="font-size:1px;"><?=$fetch['company']?></h4>
                  <p><strong>About: </strong><?=$fetch['about_company']?></p>
                  <p><strong>Webite:</strong> <?=$fetch['webiste']?></p>
                  <p><strong>Conatct Person: </strong><?=$fetch['contact_person']?></p>
                  <p><strong>Conatct Email: </strong><?=$fetch['contact_email']?></p>
                </div>
              </div>
              <?php if($_SESSION["userdata"]['emailid']=='') { ?>
              	<div class="clearfix"> <a href="login.php" class="btn btn-default pull-left">Login to Apply</a> &nbsp; &nbsp;  <a style="margin-left:20px;" href="register.php" class="btn btn-default pull-left">Register to Apply</a>  </div>
              <?php } else {
				$appliedJobs = checkIfRecordExist("jobs_apply", "id", "uid", $_SESSION["userdata"]['uid'], "jid", $fetch['jid']);
				if($appliedJobs<=0) {
			  ?>
              	<div class="clearfix"> <a href="apply_job.php?jid=<?=$fetch['jid']?>" class="btn btn-default pull-left">Apply for this Job</a>  </div>
              <?php }  else { ?>
              <div class="clearfix">  <a class="btn btn-default pull-left">Job Applied Already</a>  </div>
			  <?php }} ?>
          </div>
          
        </div>
        <div class="title-lines">
          <h3 class="mt0">Other Similar Jobs</h3>
        </div>
        <?php 
		$city = $fetch['city'];
		$skillLike = $_REQUEST['skills'];
		$similarJobs = "SELECT * FROM jobs WHERE city='$city' ";
		if($skillLike!='' && $skillLike!='.' & $skillLike!=',') {
			$skillLike = explode(',', $skillLike); 
			$similarJobs .= " AND ";
			foreach($skillLike as $skill){
				$sql_skills[] = "skills LIKE '%".trim($skill)."%' ";
			}
			$similarJobs .= '('. implode(" OR ", $sql_skills).')';
		}
		$similarJobs .= " and jid!=$jid ORDER BY jid  desc LIMIT 0,5";
		$ExecSim=mysql_query($similarJobs) or die(mysql_error());
		$counySim = mysql_num_rows($ExecSim);
		while($fetchSim = mysql_fetch_array($ExecSim)) { 
		?>
        <div class="jobs-item jobs-single-item">
          <div class="clearfix visible-xs"></div>
          <div class="date">&nbsp;<?php echo date("d M", strtotime($fetchSim['created'])); ?>&nbsp;<span><?php echo date("Y", strtotime($fetchSim['created'])); ?></span></div>
          <h6 class="title" ><a><?=$fetchSim['job_title'];?> </a></h6>
          <span class="meta"> <?= return_city_name($fetchSim['city']); ?>, <?= return_state_name($fetchSim['state']); ?>,  <?= return_country_name($fetchSim['country']); ?></span>
          <div style="text-transform:capitalize; margin-top:10px; font-size:13px;"><strong>Experience Required:</strong> <?=$fetchSim['total_experience']?> Year's</div>
          <div style="text-transform:capitalize; margin-top:10px; font-size:13px;"><strong>Salary Offered:</strong> <?=$fetchSim['salary']?> Lac's/Year</div>
          <h6 style="text-transform:capitalize; margin-top:10px; font-size:13px;">Skills Requirements</h6>
          <ul class="additional-requirements clearfix">
          <?php $skills = explode(',', $fetchSim['skills']); 
		  foreach($skills as $skill) { ?>
            <li><?=$skill;?></li>
          <?php }
		  ?>
              <div style="float:right;  cursor:pointer"><a href="job.php?jid=<?=$fetchSim['jid']?>"  class="btn btn-default pull-left"><strong>Full Info</a></strong></div> <!-- class="toggleDiv<?=$fetch['jid']?>"  -->
          </ul> 
        </div>
		<?php } if($counySim==0) { echo '<b>No Similar Job Found.</b>';} ?>
        <div class="clearfix">
          <!-- <ul class="pagination pull-right">
            <li><a href="#" class="fa fa-angle-left"></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#" class="fa fa-angle-right"></a></li>
          </ul> --> 
        </div>
      </div>
      <!-- end .page-content --> 
      
    </div>
  </div>
  <!-- end .container --> 
  
</div>
<?php include "footer.php"; ?>