<?php include "header.php";
include "paging.inc.php";
$paging = new Pager;
$pagesize=$_GET['pagesize'];
$limit=$paging->pageSize($pagesize);
$start = $paging->findStart($limit);

$skills = addslashes($_REQUEST['skills']);
$city = $_REQUEST['city'];
$contract_type = $_REQUEST['contract_type'];

$experience = $_REQUEST['experience'];
$exp_min = $_REQUEST['exp_min'];
$exp_max = $_REQUEST['exp_max'];
$salary = $_REQUEST['salary'];
$sal_min = $_REQUEST['sal_min'];
$sal_max = $_REQUEST['sal_max'];

$qual = $_REQUEST['qual'];
$inds = $_REQUEST['inds'];
$func = $_REQUEST['func'];

$sql_search = "SELECT * FROM jobs WHERE  ( status='published' OR status='premium' ) ";

if($city!='') {
	$sql_search .= " AND city='$city' ";
}

if($contract_type!='') {
	$sql_search .= " AND contract_type='$contract_type'";
}
// Filter by Experience
if($exp_min && $exp_max) {
	$sql_search .= " AND total_experience between '$exp_min' and '$exp_max'";
} else if($exp_min) {
	$sql_search .= " AND total_experience > '$exp_min'";
} else if($exp_max) {
	$sql_search .= " AND total_experience < '$exp_max'";
} else if($experience!='')
{
	$sql_search .= " AND total_experience='$experience'";
}
// Filter By Salary
if($sal_min && $sal_max) {
	$sql_search .= " AND salary between '$sal_min' and '$sal_max'";
} else if($sal_min) {
	$sql_search .= " AND salary > '$exp_min'";
} else if($sal_max) {
	$sql_search .= " AND salary < '$sal_max'";
} else if($salary!='')
{
	$sql_search .= " AND salary='$salary'";
}
if($func!='') {
	$sql_search .= " and functional_area='$func'";
}
if($inds!='') {
	$sql_search .= " and industry='$inds'";
}
if($qual!='') {
	$sql_search .= " and qualification='$qual'";
}

if($skills!='' && $skills!='.' & $skills!=',') {
	$skills_exp = explode(',', $skills); 
	$sql_search .= " AND ";
	foreach($skills_exp as $skills_ex){
		$sql_skills[] = "skills LIKE '%".trim($skills_ex)."%' ";
	}
    $sql_search .= '('. implode(" OR ", $sql_skills).')';
}
$sql_search .= " GROUP BY jid DESC";
//echo $sql_search;
$ExecQuery=mysql_query($sql_search) or die(mysql_error());
$count=mysql_num_rows($ExecQuery);
$pages =$paging->findPages($count, $limit);
$search_param = "total_experience=$total_experience&salary=$salary&city=$city";
$pagelist = $paging->pageList($_GET['page'], $pages, $pagesize, $search_param);
$showingR=$paging->showingRecords($start,$limit,$count);
$orderBy=$_REQUEST['order_by'];
$orderBy2=$_REQUEST['order_by2'];
if(!empty($orderBy) || !empty($orderBy2))
{	$orders="order by $orderBy $orderBy2 ASC";  }
$Exec=mysql_query("$sql_search $orders LIMIT  $start , $limit") or die(mysql_error());
$countrecord=mysql_num_rows($Exec);

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
    <form method="get" name="jobsearch" action="">
      <input type="hidden" name="skills" value="<?=$skills;?>">
      <input type="hidden" name="salary" value="<?=$salary;?>">
      <input type="hidden" name="city" value="<?=$city;?>">
      <input type="hidden" name="experience" value="<?=$experience;?>">
      <div class="col-sm-4 page-sidebar">
        <aside>
          <div class="white-container mb0">
            <div class="widget sidebar-widget jobs-filter-widget">
              <h5 class="widget-title">Refine Results</h5>
              <div class="widget-content">
                <!-- <h6>By Type</h6>
                <div>
                  <ul class="filter-list">
                    <li><a href="#">Banking/Finance <span>(300)</span></a></li>
                    <li><a href="#">Administration <span>(758)</span></a></li>
                    <li><a href="#">Art/Design/Creative <span>(20)</span></a></li>
                    <li><a href="#">Customer Service <span>(165)</span></a></li>
                    <li><a href="#">Education/Training <span>(11)</span></a></li>
                    <li><a href="#">Banking/Finance <span>(9)</span></a></li>
                  </ul>
                  <a href="#" class="toggle"></a> </div> -->
                
                <h6 style="font-size:13px;">Functional Area</h6>
                <div class="checkbox">
                	 <select class="form-control col-md-9" name="func">
						<?php echo return_functionalarea();?>
                      </select>
                </div>  
                <h6 style="font-size:13px;">Industry Type</h6>
                <div class="checkbox">
                	 <select class="form-control col-md-9" name="inds">
						<?php echo return_industry();?>
                      </select>
                </div>                
                <h6 style="font-size:13px;">Qualification</h6>
                <div class="checkbox">
                	 <select class="form-control col-md-9" name="qual">
						<?php echo return_qualification();?>
                      </select>
                </div>	
                <h6 style="font-size:13px;">Work Experience</h6>
                <div class="checkbox">
                  <label> Minimum <input type="number" style="width:100px; float:left" name="exp_min" placeholder="1" value="<?=@$exp_min;?>"> </label><br/><br/>
                  <label> Maximum <input type="number" style="width:100px; float:left" name="exp_max" placeholder="3" value="<?=@$exp_max;?>"> </label>
                </div>
                <h6 style="font-size:13px;">Salary Offered</h6>
                <div class="checkbox">
                  <label> Minimum <input type="number" style="width:100px; float:left" name="sal_min" placeholder="1" value="<?=@$sal_min;?>"> </label><br/><br/>
                  <label> Maximum <input type="number" style="width:100px; float:left" name="sal_max" placeholder="3" value="<?=@$sal_max;?>"> </label>
                </div>
                <h6 style="font-size:13px;">Type of Contract</h6>
                <div class="radio">
                  <label>
                    <input type="radio" name="contract_type" value="Full-Time"  <?php if(@$contract_type=='Full-Time') { echo "checked";}?>>
                    Full-Time</label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="contract_type" value="Part-Time" <?php if(@$contract_type=='Part-Time') { echo "checked";}?>>
                    Part-Time</label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="contract_type" value="Freelance" <?php if(@$contract_type=='Freelance') { echo "checked";}?>>
                    Freelance</label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="contract_type" value="Internship" <?php if(@$contract_type=='Internship') { echo "checked";}?>>
                    Internship</label>
                </div>
                <!-- <h6>Date Posted</h6>
                <div class="range-slider clearfix">
                  <div class="slider" data-min="1" data-max="60"></div>
                  <div class="first-value"><span>1</span> days</div>
                  <div class="last-value"><span>60</span> days</div>
                </div>
                <h6>Salary Range</h6>
                <div class="range-slider clearfix">
                  <div class="slider" data-min="1" data-max="100000"></div>
                  <div class="first-value">$ <span>1</span></div>
                  <div class="last-value">$ <span>100000</span></div>
                </div> -->
                <input type="submit" class="btn btn-default mt30" value="Filter">
              </div>
            </div>
          </div>
        </aside>
      </div>
      <!-- end .page-sidebar -->
      
      <div class="col-sm-8 page-content">         
        <div class="title-lines">
          <h3 class="mt0">Available Jobs</h3>
        </div>
        <div class="clearfix mb30">
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
         <?php if($countrecord > 0) {	
		 $record=1;		
	    while($fetch = mysql_fetch_array($Exec)) {  ?>
        <div class="jobs-item jobs-single-item">
          <div class="clearfix visible-xs"></div>
          <div class="date">&nbsp;<?php echo date("d M", @strtotime($fetch['created'])); ?>&nbsp;<span><?php echo date("Y", @strtotime($fetch['created'])); ?></span></div>
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
              <div style="float:right;  cursor:pointer"><a href="job.php?jid=<?=$fetch['jid']?>&skills=<?=$_REQUEST['skills']?>"  class="btn btn-default pull-left"><strong>Full Info</a></strong></div> <!-- class="toggleDiv<?=$fetch['jid']?>"  -->
              <div class="toggleDivHide<?=$fetch['jid']?>" style="float:right; margin-top:-22px; display:none; font-size:50px; cursor:pointer"><strong>-</strong></div>
          </ul> 
          <script type="text/javascript">
			 $(document).ready(function(){
				$(".toggleDiv<?=$fetch['jid'];?>").click(function(){
					$(".toggleInfo<?=$fetch['jid'];?>").toggle('slow');
					 $(".toggleDiv<?=$fetch['jid'];?>").hide();
					 $(".toggleDivHide<?=$fetch['jid'];?>").show();
				});	
				$(".toggleDivHide<?=$fetch['jid'];?>").click(function(){
					$(".toggleInfo<?=$fetch['jid'];?>").toggle('slow');
					 $(".toggleDiv<?=$fetch['jid'];?>").show();
					 $(".toggleDivHide<?=$fetch['jid'];?>").hide();
				});				
			});
		  </script>
          <div class="toggleInfo<?=$fetch['jid']?>" style="display:none">
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
                  <h4 style="font-size:13px;"><?=$fetch['company']?></h4>
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
        <?php }
			if($count>$limit)
			{
				echo "<p align='center' class='cb'>".$pagelist. "</p>";	
			}
		} else { echo "No search records found.";} ?>
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
      </form>
    </div>
  </div>
  <!-- end .container --> 
  
</div>
<?php include "footer.php"; ?>