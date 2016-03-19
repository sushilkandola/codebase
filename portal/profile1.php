<?php include "header.php";
include "admin/conn/checkSessionWeb.php"; 
$uid = $_SESSION["userdata"]['uid'];
$profile = mysql_query("select * from employee_info  where uid=$uid");
$user_info = mysql_fetch_array($profile);
?>
<div id="page-content">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 page-sidebar">
        <aside>
          <div class="widget sidebar-widget white-container candidates-single-widget">
            <div class="widget-content">
              <div class="thumb"> <img src="img/content/face-6.png" alt=""> </div>
              <h5 class="bottom-line">Candidate Details</h5>
              <table>
                <tbody>
                  <tr>
                    <td>Name</td>
                    <td><?= $_SESSION["userdata"]['fullname']; ?></td>
                  </tr>
                  <tr>
                    <td>Location</td>
                    <td><?= return_city_name($user_info['city']). ' '. return_state_name($user_info['state']) .' ' . return_country_name($user_info['country']);?></td>
                  </tr>
                  <tr>
                    <td>Experiance</td>
                    <td><?=$user_info['total_experience'];?> Year's</td>
                  </tr>
                  <tr>
                    <td>Qualification </td>
                    <td><?= return_qualification_name($user_info['qualification']);?></td>
                  </tr>
                  <tr>
                    <td>specialization</td>
                    <td><?= return_specialization_name($user_info['specialization']);?></td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td>hidden <? $user_info['city'];?></td>
                  </tr>
                  <tr>
                    <td>E-mail</td>
                    <td><a href="mailto:<?= $_SESSION["userdata"]['fullname']; ?>"><?= $_SESSION["userdata"]['fullname']; ?></a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </aside>
      </div>
      <!-- end .page-sidebar -->
      
      <div class="col-sm-8 page-content">
        <div class="clearfix mb30 hidden-xs"> <a href="#" class="btn btn-gray pull-left">Back to Listings</a>
          <div class="pull-right"> <a href="#" class="btn btn-gray">Previous</a> <a href="#" class="btn btn-gray">Next</a> </div>
        </div>
        <div class="candidates-item candidates-single-item">
          <h6 class="title"><a href="#"><?= $_SESSION["userdata"]['fullname']; ?></a></h6>
          <br>
          <h3>Career Objective</h3>
          <p><?= $user_info['objective'];?></p>
          
                    <div class="progress-bar toggle active" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
            <h6 class="progress-bar-title">Keys Skills</h6>
            <div class="progress-bar-inner"><span></span></div>
            <div class="progress-bar-content in">
            <?php $key_skills = $user_info['key_skills'];
			$skills = explode(',',$key_skills);?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              	<?php foreach($skills as $skill) { ?>
                <tr>
                  <td><?=$skill;?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
                    <div class="clearfix">
            <div class="pull-left"> <a href="#" class="btn btn-default pull-left"><i class="fa fa-envelope-o"></i> Contact Me</a> </div>
            <div class=" pull-right"> <a href="#" class="btn btn-default pull-left"> View Resume</a> </div>
          </div>
        </div>
        <!-- <div class="title-lines">
          <h3 class="mt0">Similar Candidates</h3>
        </div>
        <div class="candidates-item">
          <div class="thumb"><img src="img/content/face-0.png" alt=""></div>
          <h6 class="title"><a href="#">John Doe</a></h6>
          <br>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, voluptatibus similique aliquid a dolores autem laudantium sapiente ad enim ipsa modi laborum accusantium deleniti neque architecto vitae. <a href="#" class="read-more">Read More</a></p>
          <div class="clearfix"></div>
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, nihil, dolores, culpa ullam vero ipsum placeat accusamus nemo ipsa cupiditate id molestiae consectetur quae pariatur repudiandae vel ex quaerat nam iusto aliquid laborum quia adipisci aut ut impedit obcaecati nisi deleniti tempore maxime sequi fugit reiciendis libero quo. Rerum, assumenda.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, at nemo inventore temporibus corporis suscipit.</p>
            <ul class="list-unstyled">
              <li><strong>Experience:</strong> 5 Years</li>
              <li><strong>Degree:</strong> MBA</li>
              <li><strong>Career Level:</strong> Mid Career</li>
            </ul>
            <h5>Skills</h5>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">Web Design</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">Development</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">UI/UX</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <hr>
            <div class="clearfix"> <a href="#" class="btn btn-default pull-left"><i class="fa fa-envelope-o"></i> Contact Me</a>
              <ul class="social-icons pull-right">
                <li><span>Share</span></li>
                <li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
                <li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
                <li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="candidates-item">
          <div class="thumb"><img src="img/content/face-1.png" alt=""></div>
          <h6 class="title"><a href="#">John Doe</a></h6>
          <br>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, voluptatibus similique aliquid a dolores autem laudantium sapiente ad enim ipsa modi laborum accusantium deleniti neque architecto vitae. <a href="#" class="read-more">Read More</a></p>
          <div class="clearfix"></div>
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, nihil, dolores, culpa ullam vero ipsum placeat accusamus nemo ipsa cupiditate id molestiae consectetur quae pariatur repudiandae vel ex quaerat nam iusto aliquid laborum quia adipisci aut ut impedit obcaecati nisi deleniti tempore maxime sequi fugit reiciendis libero quo. Rerum, assumenda.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, at nemo inventore temporibus corporis suscipit.</p>
            <ul class="list-unstyled">
              <li><strong>Experience:</strong> 5 Years</li>
              <li><strong>Degree:</strong> MBA</li>
              <li><strong>Career Level:</strong> Mid Career</li>
            </ul>
            <h5>Skills</h5>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">Web Design</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">Development</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">UI/UX</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <hr>
            <div class="clearfix"> <a href="#" class="btn btn-default pull-left"><i class="fa fa-envelope-o"></i> Contact Me</a>
              <ul class="social-icons pull-right">
                <li><span>Share</span></li>
                <li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
                <li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
                <li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="candidates-item">
          <div class="thumb"><img src="img/content/face-2.png" alt=""></div>
          <h6 class="title"><a href="#">John Doe</a></h6>
          <br>
          <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, maxime, excepturi, mollitia, voluptatibus similique aliquid a dolores autem laudantium sapiente ad enim ipsa modi laborum accusantium deleniti neque architecto vitae. <a href="#" class="read-more">Read More</a></p>
          <div class="clearfix"></div>
          <div class="content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, nihil, dolores, culpa ullam vero ipsum placeat accusamus nemo ipsa cupiditate id molestiae consectetur quae pariatur repudiandae vel ex quaerat nam iusto aliquid laborum quia adipisci aut ut impedit obcaecati nisi deleniti tempore maxime sequi fugit reiciendis libero quo. Rerum, assumenda.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, at nemo inventore temporibus corporis suscipit.</p>
            <ul class="list-unstyled">
              <li><strong>Experience:</strong> 5 Years</li>
              <li><strong>Degree:</strong> MBA</li>
              <li><strong>Career Level:</strong> Mid Career</li>
            </ul>
            <h5>Skills</h5>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">Web Design</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">Development</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <div class="progress-bar toggle" data-progress="60"> <a href="#" class="progress-bar-toggle"></a>
              <h6 class="progress-bar-title">UI/UX</h6>
              <div class="progress-bar-inner"><span></span></div>
              <div class="progress-bar-content"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, asperiores. </div>
            </div>
            <hr>
            <div class="clearfix"> <a href="#" class="btn btn-default pull-left"><i class="fa fa-envelope-o"></i> Contact Me</a>
              <ul class="social-icons pull-right">
                <li><span>Share</span></li>
                <li><a href="#" class="btn btn-gray fa fa-facebook"></a></li>
                <li><a href="#" class="btn btn-gray fa fa-twitter"></a></li>
                <li><a href="#" class="btn btn-gray fa fa-google-plus"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
      <!-- end .page-content --> 
      
    </div>
  </div>
  <!-- end .container --> 
  
</div>
<?php include "footer.php"; ?>