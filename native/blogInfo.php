<?php   ob_start();  include('includes/header.php');
include("includes/paging.inc.php");
$paging = new Pager;
@$pagesize=$_GET['pagesize'];
$sql="select * from blog_post where blog_post_id=".$_REQUEST['blog_post_id'];
$exe=mysql_query($sql);
$st=mysql_fetch_array($exe);

$qry_blog="select * from blog_comment where blog_post_id=".$_REQUEST['blog_post_id'];
$result_blog=mysql_query($qry_blog);
$count_blog=mysql_num_rows($result_blog);
if($_POST['submit'])
{
$blog_post_id=$_REQUEST['blog_post_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$website=$_POST['website'];	
$comment=$_POST['comment'];
$date=date('Y-m-d h:i:s');
$insQry="insert into blog_comment (user_name,email_id,	phone_number,website, comment, comment_date,blog_post_id) values ('$name','$email', '$mobile','$website', '$comment','$date','$blog_post_id')";
$insExe=mysql_query($insQry);
header("Location:blogInfo.php?blog_post_id=".$_REQUEST['blog_post_id']."&mess=Your Comment Has Been Posted Successfully.");
}
 ?>  
  <!-- Begin Wrapper -->
  <div id="wrapper">
    <div id="post-wrapper">
      <div class="post">
        <h2 class="title"><a href="blog.php" title=""><?=$st['blog_post']?></a></h2>
        <div class="meta">
          <div class="top-border"></div>
          <div class="date"> <?php echo date('d M, Y',strtotime($st['blog_date']))?></div>
          by <a href="mailto:<?=$adminMail?>" title="admin">admin</a> &nbsp; | &nbsp; <a href="blogInfo.php?blog_post_id=<?=$_REQUEST['blog_post_id'];?>#comment_list"><?=$count_blog?> Comments</a> </div>
        <!--<a href="blogInfo.php"><img src="style/images/art/blog1.jpg" alt="" /></a>-->
        <p><?=$st['blog_post_desc']?></p>
        <div class="tags">
          <div class="top-border"></div>
          <strong>Tags:</strong> <?=$st['tags']?></div>
      </div>
      <!-- Begin Page Navigation -->
      <!-- Begin Comments -->
      <div id="comment-wrapper">
      <a href="" id="comment_list"></a>
        <h3><?=$count_blog?> Responses to "<?=$st['blog_post']?>"</h3>
        <!-- Begin Comments -->
        <?php 
			while($ct=mysql_fetch_array($result_blog))
			{
			$blog_comment_id=$ct['blog_comment_id'];
		?>
        <div id="comments">
          <ol id="singlecomments" class="commentlist">
            <li class= "clearfix">
              <div class="user"><a href="#"><img alt="" src="style/images/logo.jpg" height="60" width="60" class="avatar" /></a></div>
              <div class="message">
                <div class="info" >
                  <h3><a>By : <?= $ct['user_name'] ?></a></h3>
                  <div class="date" style="text-align:right; padding-left:20px;"> on &nbsp; <?php echo date('d M, Y h:i:s',strtotime($ct['comment_date']))?></div> 
                </div>
                <p><?= $ct['comment'] ?></p>
              </div>
              <div class="clear"></div>
            </li>
          </ol>
        </div>
        <!-- End Comments --> 
        <?
			}
		?>
        <!-- Begin Form -->
        <div id="comment-form" class="comment-form">
          <h3>Leave a Reply</h3>
          <form name="form_name" method="post">
            <div class="comment-input">
              <p>
                <input type="text" name="name" id="name" placeholder="Name">
              </p>
              <p>
                <input type="text" name="email" id="email" placeholder="Email Id">
              </p>
              <p>
                <input type="text" name="mobile" id="mobile" placeholder="Mobile">
              </p>
              <p>
                <input type="text" name="website" id="website" placeholder="Website">
              </p>
            </div>
            <div class="comment-textarea">
              <textarea name="comment" id="comment" rows="9" cols="30" placeholder="Enter Your Comment"></textarea>
            </div>
            <div>
            <input id="submit-button" class="button gray stripe" type="submit" name="submit" value="Post Comment" />
            </div>
          </form>
          <div class="clear"></div>
        </div>
        <!-- End Form --> 
        
      </div>
      <!-- End Comments --> 
      
    </div>
    
    <? include 'includes/right_blog.php';?>
  </div>
  <!-- End Wrapper -->
  
  <div class="clearfix"></div>
  <div class="push"></div>
</div>

<?php include('includes/footer.php'); ?> 