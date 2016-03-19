<?php include "header.php";
include "paging.inc.php";
$paging = new Pager;
$pagesize=$_GET['pagesize'];
$limit=$paging->pageSize($pagesize);
$start = $paging->findStart($limit);

$skills = addslashes($_REQUEST['skills']);
$city = $_REQUEST['city'];
$experience = $_REQUEST['experience'];
$salary = $_REQUEST['salary'];
if($skills) {
	// Search for employees from Table: employee_info
	$sql_search = "SELECT * FROM employee_info WHERE city = '$city' ";
	
	if($skills!='' && $skills!='.' & $skills!=',') {
		$skills = explode(',', $skills); 
		$sql_search .= " AND ";
		foreach($skills as $skill){
			$sql_skills[] = "key_skills LIKE '%".trim($skill)."%' ";
		}
		$sql_search .= '('. implode(" OR ", $sql_skills).')';
	}

 	if($experience) {
		$sql_search .= " AND total_experience = '$experience'";
	}  	if($salary) {
		$sql_search .= " AND salary = '$salary'";
	} 
	$sql_search .= " GROUP BY  uid DESC";
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
} else { 
	$countrecord=0;
}
?>
<div id="page-content">

		<div class="container">

			<div class="row">

				<div class="col-sm-12 page-content">
					<div class="title-lines">
						<h3 class="mt0">Available Candidates</h3>
					</div>
                     <form method="get" name="jobsearch" action="">
					<div class="white-container candidates-search">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control " style="width:100%" name="skills" placeholder="Skills (,) Comma Separated" value="<?=$_REQUEST['skills']?>" required>
							</div>
							 <div class="col-sm-2">
                                  <select class="form-control" name="city"style="width:100%" required>
                                    <?php echo return_city($_REQUEST['city']); ?>
                                  </select>
							</div>
							<div class="col-sm-2">
								 <select class="form-control" name="experience"  style="width:100%" >
                                    <option value="">Select Experience</option>
                                    <?php for($exp=0; $exp<30; $exp++) {	?>
                                    <option value="<?php echo $exp; ?>" <?php if($_REQUEST['experience']==$exp){ echo 'selected';}?>><?php echo $exp; ?> Year's</option>
                                   <?php } ?>
                                  </select>
							</div>
							<div class="col-sm-2">
                                  <select class="form-control" name="salary" style="width:100%" >
                                    <option value="">Salary</option>
                                     <?php for($sal=1; $sal<50; $sal++) {	?>
                                    <option value="<?php echo $sal; ?>"  <?php if($_REQUEST['salary']==$sal){ echo 'selected';}?>> <?php echo $sal; ?> Lac's/Year</option>
                                    <?php } ?>
                                    <option value="50+"> 50+ Lac's/Year</option>
                                  </select>
							</div>
                           
                            <div class="col-sm-2">
								<input type="submit" class="btn btn-default btn-block" value="Search">
							</div>
						</div>
					</div>
					</form>
					<!-- <div class="clearfix mb30">
						<select class="form-control pull-left">
							<option value="">Sort By</option>
							<option value="">1</option>
							<option value="">2</option>
							<option value="">3</option>
							<option value="">4</option>
						</select>
						<ul class="pagination pull-right">
							<li><a href="#" class="fa fa-angle-left"></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#" class="fa fa-angle-right"></a></li>
						</ul>
					</div> -->
                   
					<?php if($countrecord > 0) {	
                    while($fetch = mysql_fetch_array($Exec)) { 
					$user = get_user($fetch['uid']); ?>
					<div class="candidates-item">
						<div class="thumb"><?php if($fetch['profilepic']) { ?><img src="uploads/photo/<?=$fetch['profilepic']?>" width="100" height="100" alt="<?=$fetch['profilepic']?>"><?php } else { ?> <img src="uploads/no-image.png" width="100" height="80" alt="No Image"><?php } ?></div>
						<h6 class="title"><a href="#"><?=$user['fullname']?> </a></h6>
						<span class="meta"> <?= return_city_name($fetch['city']); ?>, <?= return_state_name($fetch['state']); ?>,  <?= return_country_name($fetch['country']); ?></span>
						<ul class="top-btns">
							<li><a href="#" class="btn btn-gray fa fa-plus toggle"></a></li>
							<li><a href="#" class="btn btn-gray fa fa-star"></a></li>
						</ul>
						<p class="description"><strong>Career Objective: </strong><?php echo $fetch['objective']; ?> <a href="#" class="read-more">Read More</a></p>
						<div class="clearfix"></div>
						<div class="content">
							<ul class="list-unstyled">
								<li><strong>Experience:</strong> <?php echo $fetch['total_experience']; ?> Year's</li>
                                <li><strong>Salary:</strong> <?php echo $fetch['salary']; ?> Lac's/Year</li>
                                <li><strong>Specialization:</strong> <?=return_specialization_name($fetch['specialization']);?></li>
								<li><strong>Career Level:</strong> <?php echo $fetch['work_experience']; ?></li>
							</ul>
							<h6 style="font-size:15px; margin-top:15px;">Skills</h6>
							<ul class="additional-requirements clearfix">
							  <?php $skills = explode(',', $fetch['key_skills']); 
                              foreach($skills as $skill) { ?>
                                <li><?=$skill;?></li>
                              <?php } ?>
                            </ul>
                            <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
                                <h6 class="progress-bar-title" style="text-transform:capitalize">Current Job Profile</h6>
                                <div class="progress-bar-inner"><span></span></div>
                                <div class="progress-bar-content in">
                                  <p><strong>Designation: </strong><?=$fetch['job_title']?></p>
                                  <p><strong>Company Name: </strong><?=$fetch['company_name']?></p>
                                  <p><strong>Industry Area:</strong> <?=return_industry_name($fetch['industry'])?></p>
                                  <p><strong>Functional Area: </strong><?=return_functionalarea_name($fetch['functional_area']);?></p>
                                  <p><strong>Joined Since: </strong><?=$fetch['current_job_date']?></p>
                                </div>
                              </div>
                            <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
                                <h6 class="progress-bar-title" style="text-transform:capitalize">Educational Qualification</h6>
                                <div class="progress-bar-inner"><span></span></div>
                                <div class="progress-bar-content in">
                                  <p><strong>Qualification: </strong><?= return_qualification_name($fetch['qualification'])?></p>
                                  <p><strong>Institute Name: </strong><?=$fetch['institute']?></p>
                                  <p><strong>Passout:</strong> <?= $fetch['passout']?></p>
                                  <p><strong>Course Type: </strong><?=$fetch['course']?></p>
                                </div>
                              </div>
							<hr>
							<div class="clearfix">
								<a class="btn btn-default pull-left"><i class="fa fa-envelope-o"></i> Contact Me</a>
								<!-- <ul class="social-icons pull-right">
									<li><span>Share</span></li>
									<li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
									<li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
									<li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
								</ul> -->
							</div>
						</div>
					</div>
                    
                    <?php }
						if($count>$limit)
						{
							echo "<p align='center' class='cb'>".$pagelist. "</p>";	
						}
					} else { echo "<p align='center' class='cb'><b>Please change your search parameters and find suitable candidates.</b></p>";} ?>
					<!-- <div class="clearfix">
						<ul class="pagination pull-right">
							<li><a href="#" class="fa fa-angle-left"></a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#" class="fa fa-angle-right"></a></li>
						</ul>
					</div>-->
				</div>
			</div>
		</div> <!-- end .container -->

	</div>

<?php include "footer.php"; ?>