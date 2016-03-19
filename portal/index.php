<?php include "header.php"; ?>
<div class="banner">
  <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active"> <img src="img/banner.png" alt=""> </div>
      <div class="item"> <img src="img/banner.png" alt=""> </div>
      <div class="item"> <img src="img/banner.png" alt=""> </div>
      <div class="item"> <img src="img/banner.png" alt=""> </div>
    </div>
    
    <!-- Left and right controls --> 
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
</div>
<div class="container" style="position:relative;">
  <div class="advance-search">
  <form name="search" action="search.php" method="get">
    <p class="col-md-2 advance-text">Search for a Job</p>
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
    <div align="left">* Please use comma(,) separated skills for better search options.</div>
    </form>
  </div>
</div>
<div class="hidden-xs" id="homepage-banner">
  <div id="slider-wrapper">
    <div class="slider-item" style="height:417px;"><img class="homepage-slider-image" src="img/bg-slider.jpg" alt="" title="dummy-slide-1" /></div>
    
    <!-- /.slider-item --> 
    
    <!-- /.slider-item --> 
    
    <!-- /.slider-item --> </div>
  
  <!-- /.slider-images-container -->
  
  <div class="banner-wrapper hidden-sm">
    <div class="container">
      <div class="banner-caption">
        <div class="row">
          <div class="col-md-6">
            <div class="banner-left">
            <div class="find-job"><img src="img/find-job.png" width="240" height="258" alt=""></div>
              <h1 style="font-size:21px;">Easiest way to find dream job</h1>
              <p>Connect to recruiters directly. More than 20000 
Recruiters looking for candidates like you</p>
              <a style="margin-top:40px;" href="<?php if($_SESSION["userdata"]['emailid']=='') { echo "login.php"; } else { echo "search.php";}?>" class="btn btn-default btn-find-job">Find a Job</a> </div>
          </div>
          <div class="col-md-6">
            <div class="banner-right">
            <div class="post-job"><img src="img/post-job.png" width="151" height="256" alt=""></div>
              <h1  style="font-size:21px;">Hire Skilled People, best of them</h1>
              <p>Randstad's skilled and dedicated teams work hard to add value and efficiency ensuring every candidate we recruit is the right match, and every service we 
provide is of the highest quality</p>
              <a href="<?php if($_SESSION["userdata"]['emailid']=='') { echo "login.php"; } else { echo "post_job.php";}?>" class="btn btn-default btn-post-job">Post a Job</a> </div>
          </div>
        </div>
        
        <!-- /.row --> 
        
      </div>
      
      <!-- /.banner-caption --> 
      
    </div>
    
    <!-- /.container --> 
    
  </div>
  
  <!-- /.banner-wrapper --> 
  
</div>

<!--<div class="advanced-search">

  <div class="container"> fsafd </div>

</div>-->

    <div class="feature">
      <h2>Feature Employers</h2>
      <div class="container">
        <div class="col-md-12">
          <ul class="feature-list">
            <li><img src="img/logo/logo1.jpg" width="146" height="50" alt=""></li>
            <li><img src="img/logo/logo2.jpg" width="146" height="50" alt=""></li>
            <li><img src="img/logo/logo3.jpg" width="146" height="50" alt=""></li>
            <li><img src="img/logo/logo4.jpg" width="146" height="50" alt=""></li>
            <li><img src="img/logo/logo5.jpg" width="146" height="50" alt=""></li>
            <li><img src="img/logo/logo6.jpg" width="146" height="50" alt=""></li>
          </ul>
        </div>
      </div>
    </div>
	<div class="feature"><h2>Premium Jobs</h2></div>
    <?php 
		$premium = "SELECT * FROM jobs WHERE status='premium' ORDER BY jid DESC";
		$ExecPre=mysql_query($premium) or die(mysql_error());
		while($fetchPre = mysql_fetch_array($ExecPre)) { 
	?>
	<div class="col-sm-6">
		<div class="jobs-item jobs-single-item" style="background-color:#f9f9f9">
          <div class="clearfix visible-xs"></div>
          <div class="date">&nbsp;<?php echo date("d M", @strtotime($fetchPre['created'])); ?>&nbsp;<span><?php echo date("Y", strtotime($fetchPre['created'])); ?></span></div>
          <h6 class="title" ><a><?=$fetchPre['job_title'];?> </a></h6>
          <span class="meta"> <?= return_city_name($fetchPre['city']); ?>, <?= return_state_name($fetchPre['state']); ?>,  <?= return_country_name($fetchPre['country']); ?></span>
          <div style="text-transform:capitalize; margin-top:10px; font-size:13px;"><strong>Experience Required:</strong> <?=$fetchPre['total_experience']?> Year's</div>
          <div style="text-transform:capitalize; margin-top:10px; font-size:13px;"><strong>Salary Offered:</strong> <?=$fetchPre['salary']?> Lac's/Year</div>
          <h6 style="text-transform:capitalize; margin-top:10px; font-size:13px;">Skills Requirements</h6>
          <ul class="additional-requirements clearfix">
          <?php $skills = explode(',', $fetchPre['skills']); 
		  foreach($skills as $skill) { ?>
            <li><?=$skill;?></li>
          <?php }
		  ?>
              <div style="float:right;  cursor:pointer"><a href="job.php?jid=<?=$fetchPre['jid']?>&skills=<?=trim($skill);?>"  class="btn btn-default pull-left"><strong>Read More</a></strong></div> <!-- class="toggleDiv<?=$fetch['jid']?>"  -->
          </ul> 
        </div>
    </div>
    <?php } ?>
    
    <div style="clear:both; height:0px; line-height:0px; font-size:0px;"></div>
<!--
<div class="clients">
  <h2>Clients Testimonials</h2>
  <div class="container">
    <div class="row">
      <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="owl-item">
                <div class="text-center">
                  <div class="testimonial-box">
                    <p>"We will work with you to fully understand your business and to inform our <a class="blue-color" href="#">marketing</a> "</p>
                  </div>
                  <img alt="" class="testimonial-client img-circle" src="img/1.png">
                  <h4>Markus Dovenberg</h4>
                  <h5 class="alt">Web Designer</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control left" href="#myCarousel"  data-slide="prev">&lsaquo;</a> <a class="carousel-control right" href="#myCarousel"   data-slide="next">&rsaquo;</a> 
      </div>
    </div>
  </div>
</div>
--> 
<?php include "footer.php"; ?>
