 <div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
	<!-- <h1 id="sidebar-title"><a href="#">---><!-- </a></h1> -->
	<!-- Logo (221px wide) -->
            <div style="padding:10px 0px 0px 10px; font-size:16px; color:#FFF;"> <h2 style="color:#fff; padding-top:10px;">Job Portal</h2>
				<!-- <img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /> -->
            </div>
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <span style="color:#FFF;"><?=ucfirst($_SESSION["username"]);?></span>
				<!--
				, you have <a href="#messages" rel="modal" title="3 Messages">3 Messages</a>
				--> <br />
				<br />
				<!--<a href="#" title="View the Site">View the Site</a> |--> 
                <a href="logout.php" title="Sign Out">Sign Out</a>
			</div>    
            <?php
			  $menu_home = array("welcome.php");
			  $menu_master = array("citylist.php","state.php","country.php", "statuslist.php","updatecity.php","add_city.php","add_state.php","updatestate.php","add_country.php","updatecountry.php","add_status.php","updatestatus.php","adminuser.php", "experience.php", "qualification.php", "specialization.php", "specialization_manage.php", "qualification_manage.php", "experience_manage.php", "industry.php", "industry_manage.php", "functionalarea.php", "functionalarea_manage.php");
			  $menu_member = array("userlist.php","userreqlist.php","updateuser.php","updateuserreq.php","searchentry.php","searchentryassign.php","searchuserreq.php");
			  $menu_pass = array("change_password.php");
			  $menu_pages = array("cmspage.php","cmspage_manage.php");
			  $jobs = array("jobs.php");
			  $menu_cat = array("category.php","add_category.php","comment_details.php");
			?>			
    	
                <ul id="main-nav"> 
                 		<li>
                        <a href="welcome.php" 
                        <?php if (in_array(basename($_SERVER['SCRIPT_FILENAME']), $menu_home)) { echo 'class="nav-top-item active no-submenu"';  } else { echo 'class="nav-top-item  no-submenu"'; }?>>DashBoard
                        </a></li>
                        <li>
                        <a href="#" 
                        <?php if (in_array(basename($_SERVER['SCRIPT_FILENAME']), $menu_master)) { echo 'class="nav-top-item active no-submenu"';  } else { echo 'class="nav-top-item  no-submenu"'; }?>>Master Data	
                        </a><ul>
                        	<li><a href="country.php">Manage Country</a></li>
                            <li><a href="state.php">Manage State</a></li>
                            <li><a href="citylist.php">Manage City</a></li>
                            <li><a href="category.php">Job Category</a></li>
                            <li><a href="qualification.php">Qualifications</a></li>
                            <li><a href="specialization.php">Specializations</a></li>
                            <li><a href="experience.php">Experience</a></li>
                            <li><a href="industry.php">Industry Type</a></li>
                            <li><a href="functionalarea.php">Functional Area</a></li>
                        </ul></li>
                        <li>
                        <a href="#" 
                        <?php if (in_array(basename($_SERVER['SCRIPT_FILENAME']), $menu_member)) { echo 'class="nav-top-item active no-submenu"';  } else { echo 'class="nav-top-item  no-submenu"'; }?>>Users
                        </a>
                        <ul>
                            <li><a href="employers.php">Employers</a></li>
                            <li><a href="employees.php">Job Seekers</a></li>
                        </ul>
                        
                        </li>
                        <li>
                       <a href="#" 
                        <?php if (in_array(basename($_SERVER['SCRIPT_FILENAME']), $jobs)) { echo 'class="nav-top-item active no-submenu"';  } else { echo 'class="nav-top-item  no-submenu"'; }?>>Jobs
                        </a>
                         <ul>
                            <li><a href="jobs.php?status=pending">Pending Jobs</a></li>
                            <li><a href="jobs.php?status=published">Published Jobs</a></li>
                            <li><a href="jobs.php?status=premium">Premium Jobs</a></li>
                        </ul>
                        </li>
						<li>
                        <a href="#" 
                        <?php if (in_array(basename($_SERVER['SCRIPT_FILENAME']), $menu_pages)) { echo 'class="nav-top-item active no-submenu"';  } else { echo 'class="nav-top-item  no-submenu"'; }?>>CMS Page
                        </a>
                        <ul>
                            <li><a href="cmspage.php">View Pages</a></li>
                            <li><a href="cmspage_manage.php">Add New Page</a></li>
                        </ul>
                        
                        </li>
                        <li>
                        <a href="#" 
                        <?php if (in_array(basename($_SERVER['SCRIPT_FILENAME']), $menu_pass)) { echo 'class="nav-top-item active no-submenu"';  } else { echo 'class="nav-top-item  no-submenu"'; }?>>Settings
                        </a>
                        <ul>
                            <!--<li><a href="profile.php">Your Profile</a></li>-->
                            <li><a href="change_password.php">Change Password</a></li>
                        </ul>
                        
                        </li>
                </ul>
			
		</div></div> <!-- End #sidebar -->

        
  