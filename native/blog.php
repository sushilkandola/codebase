<?php  ob_start();  include('includes/header.php');
include("includes/paging.inc.php");
$paging = new Pager;
@$pagesize=$_GET['pagesize'];
$search=$_POST['search'];
$tag=$_REQUEST['tag'];
if($search!='')
{
	$sql="select * from blog_post where blog_post like '%$search%' or blog_post_desc like '%$search%'";
}
else if($tag!='')
{
	$sql="select * from blog_post where tags like '%$tag%'";
}
else
{
	$sql="select * from blog_post where 1";	
}
$exe=mysql_query($sql);
$countrecord=mysql_num_rows($exe);
 ?>  
  <!-- Begin Wrapper -->
  <div id="wrapper">
    <div id="post-wrapper">
    <? 
	if($countrecord>0){
	while($st=mysql_fetch_array($exe))
		{
			$blog_post_id=$st['blog_post_id'];
			$blog_post=$st['blog_post'];
			$blog_post_desc=$st['blog_post_desc'];
			$sub_blog_post_desc=stripslashes(strip_tags(substr($blog_post_desc,0,800)));
			
			$qry_blog="select * from blog_comment where blog_post_id=".$blog_post_id;
			$result_blog=mysql_query($qry_blog);
			$count_blog=mysql_num_rows($result_blog);
	?>
      <div class="post">
        <h2 class="title"><a href="blogInfo.php?blog_post_id=<?=$blog_post_id;?>"><?=$blog_post?></a></h2>
        <div class="meta">
          <div class="top-border"></div>
          Posted on
          <div class="date"> <?php echo date('d M, Y',strtotime($st['blog_date']))?></div>
          by <a href="mailto:<?=$adminMail?>" title="admin">admin</a> &nbsp; | &nbsp; <a href="blogInfo.php?blog_post_id=<?=$blog_post_id;?>#comment_list"><?=$count_blog?> Comments</a> </div>
        <!--<a href="blogInfo.php"><img src="style/images/art/blog1.jpg" alt="" /></a>-->
        <p><?=$sub_blog_post_desc;?></a>
        <br><div style="text-align:right"><a href="blogInfo.php?blog_post_id=<?=$blog_post_id;?>">Read More</a></div>
        </p>
        <div class="tags">
          <div class="top-border"></div>
          <strong>Tags:</strong> <?=$st['tags']?></div>
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