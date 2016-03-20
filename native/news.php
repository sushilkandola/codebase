<?php include('includes/header.php');
include("includes/paging.inc.php");
$paging = new Pager;
@$pagesize=$_GET['pagesize'];
$search=$_POST['search'];
if($search!='')
{
	$sql="select * from newsfeed where news_title like '%$search%' or news_data like '%$search%'";
}
else
{
	$sql="select * from newsfeed where 1 order by news_id desc";
}
$exe=mysql_query($sql);
$countrecord=mysql_num_rows($exe);
 ?>  
  <!-- Begin Wrapper -->
  <div id="wrapper">
    <div id="post-wrapper">
    <? 
	if($countrecord>0){
	while($n=mysql_fetch_array($exe))
	{
		$news_title=$n['news_title'];
		$news_data= $n['news_data'];
		$sub_news_data=stripslashes(strip_tags(substr($news_data,0,500)));
		$news_id=$n['news_id'];
	?>
      <div class="post">
        <h2 class="title"><a href="newsInfo.php?news_id=<?=$news_id;?>"><?=$news_title?></a></h2>
        <div class="meta">
          <div class="top-border"></div>
          Posted on
          <div class="date"> <?php echo date('d M, Y',strtotime($n['news_date']))?></div>
          by <a href="mailto:<?=$adminMail?>" title="admin">admin</a></div>
        <!--<a href="blogInfo.php"><img src="style/images/art/blog1.jpg" alt="" /></a>-->
        <p><?=$sub_news_data;?> ...</a>
        <br><div style="text-align:right"><a href="newsInfo.php?news_id=<?=$news_id;?>">Read More</a></div>
        </p>
        <div class="tags">
          <div class="top-border"></div>
          Tags: <a href="#" title="">Web</a>, <a href="#" title="">Journal</a> </div>
      </div>
    <? } 
	}
	else
	{
		echo "<a href='blog.php'> Go Back</a> &nbsp; &nbsp; <h2 align='center'>No Records</h2>";	
	}
	?>
    <ul class="page-navi">
    <?
	if($count>$limit) 
	  {  
		echo '<li><a href="#" class="current">'. $pagelist . '</a></li>';   
	  }
	?> 
    </ul>  
    
    </div>
    
    <? include 'includes/right_blog.php';?>
  </div>
  <!-- End Wrapper -->
  
  <div class="clearfix"></div>
  <div class="push"></div>
</div>

<?php include('includes/footer.php'); ?> 