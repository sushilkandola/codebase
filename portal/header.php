<?php
error_reporting(E_ALL ^ E_WARNING);
//error_reporting(E_ALL ^ E_DEPRECATED);
date_default_timezone_set("Asia/Kolkata");
require 'admin/conn/Session.php';
require 'admin/conn/MySQL.php';
$dbcon =  new MySQL();
require "admin/includes/generalFunction.php";
require "admin/includes/mail.php";
require "function.php";
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Job Portal</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/style1.css" rel="stylesheet">
<link href="css/owl.css" rel="stylesheet">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="js/jquery.min.js"></script> 
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<header>
  <div class="header-top">
    <div class="container">
      <div class="pull-left"><a href="index.php"><img width="172" height="77" title="" style="border:0px;" alt="" src="img/logo.png"></a></div>
      <div class="pull-right">
        <button type="button" class="btn number" style="color:#000"> 011-999-9999 </button>
        <?php if($_SESSION["userdata"]['emailid']=='') { ?>
        <a href="login.php" class="btn login">Login</a>
        <a href="register.php" class="btn create-account">Create Account </a>
        <?php } else { ?>
        <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Welcome <?=ucfirst($_SESSION["userdata"]['fullname']);?> <span class="caret"></span> </button>
          <ul class="dropdown-menu">
           <?php if($_SESSION["userdata"]['utype']=='employer') { ?>
           <li><a href="search_employees.php">Search Candidates</a></li>
            <li role="separator" class="divider"></li>
          	<li><a href="job_post.php">Post Job</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="jobs_postedby_me.php">Jobs Posted</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="profile_rec.php">Profile</a></li>
            <li role="separator" class="divider"></li>
            <?php } else { ?>
            <li><a href="jobs_applied.php">Jobs Applied</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="profile.php">Profile</a></li>
            <li role="separator" class="divider"></li>
            <?php } ?>
            <li><a href="change_password.php">Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="header-bottom">
    <div class="container">
      <ul class="nav nav-bar pull-right">
        <li><a href="page.php?id=3">Contact <br>
          <span>enquire here</span></a></li>
        <li><a href="page.php?id=5">Case Studies <br>
          <span>problem solutions</span></a></li>
		<li><a href="page.php?id=1">Services<br>
          <span>what we can do</span></a></li>
		<li class="active"><a href="page.php?id=4">Profile <br>
          <span>who we are</span></a></li>
      </ul>
    </div>
  </div>
</header>
<?php if(@$_REQUEST['mess']!='') { ?><div align="center" style="color:#f00"><?php echo $_REQUEST['mess'];?></div> <?php } ?>
