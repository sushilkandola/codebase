<?php include('includes/header.php');
include("includes/paging.inc.php");
$paging = new Pager;
@$pagesize=$_GET['pagesize'];
$sql="select * from newsfeed where news_id=".$_REQUEST['news_id'];
$exe=mysql_query($sql);
$st=mysql_fetch_array($exe);

 ?>  
  <!-- Begin Wrapper -->
  <div id="wrapper">
    <div id="post-wrapper">
      <div class="post">
        <h2 class="title"><a href="news.php" title=""><?=$st['news_title']?></a></h2>
        <div class="meta">
          <div class="top-border"></div>
          Posted on 
          <div class="date"> <?php echo date('d M, Y',strtotime($st['news_date']))?></div>
          by <a href="mailto:<?=$adminMail?>" title="admin">admin</a> </div>
        <!--<a href="blogInfo.php"><img src="style/images/art/blog1.jpg" alt="" /></a>-->
        <p><?=$st['news_data']?></p>
        
      </div>
      <!-- Begin Page Navigation -->	
      
    </div>
    
    <? include 'includes/right_blog.php';?>
  </div>
  <!-- End Wrapper -->
  
  <div class="clearfix"></div>
  <div class="push"></div>
</div>

<?php include('includes/footer.php'); ?> 