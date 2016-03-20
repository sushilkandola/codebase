<?
 $sqlPop="select * from blog_post where popular='yes'";	
 $exePop=mysql_query($sqlPop);
?>

<div id="sidebar">
      <div class="sidebox">
        <form id="searchform" method="post" action="<? if(basename($_SERVER['SCRIPT_FILENAME'])=='blog.php') { echo 'blog.php'; } else { echo 'news.php'; }?>">
          <input type="text" id="search" name="search" value="<? if($search!='') echo $search; else echo 'type and hit enter'; ?>" onfocus="this.value=''" onblur="this.value=<? if($search!='') echo $search; else echo 'type and hit enter'; ?>"/>
        </form>
      </div>
      <div class="sidebox">
        <h3>Popular Blog Posts</h3>
        <ul class="post-list">
        <?
        while($fetchPop=mysql_fetch_array($exePop))
		{
			$qry_blog="select * from blog_comment where blog_post_id=".$fetchPop['blog_post_id'];
			$result_blog=mysql_query($qry_blog);
			$count_blog=mysql_num_rows($result_blog);
		?>
              <li><a href="#" title=""><img alt="" src="style/images/logo.jpg" height="60" width="60" class="avatar" /></a>
                <h4><a href="blogInfo.php?blog_post_id=<?=$fetchPop['blog_post_id']?>"><?=$fetchPop['blog_post'];?></a></h4>
                <span class="info"><?php echo date('d M, Y',strtotime($fetchPop['blog_date']))?> &nbsp;|&nbsp;  <a href="blogInfo.php?blog_post_id=<?=$fetchPop['blog_post_id']?>#comment_list"><?=$count_blog?> Comments</a></span>
              </li>
        <? } ?>
        </ul>
      </div>
     <div class="sidebox">
        <h3>Tags</h3>
        <ul class="tags">
          <li><a href="blog.php?tag=Design" title="Design">Design</a></li>
          <li><a href="blog.php?tag=PHP" title="PHP">PHP</a></li>
          <li><a href="blog.php?tag=Technology" title="Technology">Technology</a></li>
          <li><a href="blog.php?tag=MySql" title="MySql">MySql</a></li>
          <li><a href="blog.php?tag=Inspiration" title="Inspiration">Inspiration</a></li>
          <li><a href="blog.php?tag=Java" title="Java">Java</a></li>
          <li><a href="blog.php?tag=HTML" title="HTML">HTML</a></li>
          <li><a href="blog.php?tag=Mobile" title="Mobile">Mobile</a></li>
          <li><a href="blog.php?tag=Books" title="Books">Books</a></li>
          <li><a href="blog.php?tag=Resources" title="Resources">Resources</a></li>
          <li><a href="blog.php?tag=Fun" title="Fun">Fun</a></li>
          <li><a href="blog.php?tag=Travel" title="Travel">Travel</a></li>
          
        </ul>
      </div>
      <div class="sidebox">
        <h3>Archive</h3>
        <ul class="post-list archive">
          <li><a href="#" title="">March 2011 (11)</a></li>
          <li><a href="#" title="">February 2011 (9)</a></li>
          <li><a href="#" title="">January 2011 (5)</a></li>
        </ul>
      </div>
     
     <!-- <div class="sidebox">
        <h3>Sponsors</h3>
        <ul class="ads">
          <li><a href="#"><img src="style/images/art/ad-1.gif" alt="" /></a></li>
          <li><a href="#"><img src="style/images/art/ad-2.gif" alt="" /></a></li>
          <li><a href="#"><img src="style/images/art/ad-3.gif" alt="" /></a></li>
          <li><a href="#"><img src="style/images/art/ad-4.gif" alt="" /></a></li>
        </ul>
      </div>-->
    </div>