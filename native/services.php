<?php include('includes/header.php'); ?>     
  <!-- Begin Wrapper -->
  <div id="wrapper">
  	<div class="post" style="line-height:26px; width:920px;">
  				<div class="fl" style="width:610px; text-align:justify; float:left;"><?= $siteName; ?> is working for software development services in India from last two years. We offers a wide range of services for Website Design, Website Development, Website Maintenance, Web Hosting, Search Engine Optimizations and Mobile Applications. We have team of experienced and qualified professionals software engineers who use the most advanced technologies and their skills along with their approach for each project.<br><br> Our Website Design services includes static  websites, web graphics, design of logos and templates, 2-D and 3-D animations. Website Development services includes new website development, database optimization and website maintenance. We have an infrastructure, able to develop static and dynamic websites, e-commerce websites, web graphics websites, open source content management systems. Our team works with a single minded focus to develop applications which are a successful achievement.</div>
                <div class="fr" style="float:right">
					<?php
                        include('includes/fb_like_box.php');
                    ?>
                </div>
                <div class="clear"></div>
     </div>
    <div class="tab-wrapper">
      <ul id="tab-menu">
        <li class="selected"><img src="images/service1.png" width="35" height="35"  alt="" /> Website Design</li>
        <li><img src="images/service2.png" width="35" height="35" alt="" /> Website Development</li>
        <li><img src="images/service3.png" width="35" height="35"  alt="" /> Mobie Applications</li>
        <li><img src="images/service4.png" width="35" height="35"  alt="" /> SEO Services</li>
        <li><img src="images/service5.png" width="35" height="35"  alt="" />Web Hosting</li>
      </ul>
      <div class="tab-content">
        <div class="tab show">
          <h3><a href="#">Website Design</a></h3>
          <div><img src="images/web1.jpg" width="250" height="250" class="right">We are experts in various types of websites design. We have a team of well experienced and experts professional, which are involved in websites design in html, designing of templates, logo's, mobile applications and 2-D and 3-D graphics. <br /> <br />
            <em><strong>We are expertise in following areas of Website Design :</strong></em>
            <ul style="margin-left:30px">
                <li>Designing of Logos</li>
                <li>Designing of Templates</li>
                <li>2-D and 3-D Graphics</li>
                <li>Design of Mobile Applications</li>
                <li>Wesite Design in HTML</li>
                <li>Website Maintenance</li>
                <li>Website Customization</li>
                <li>SEO Friendly Websites</li>
              </ul>
         </div>
        </div>
        <div class="tab">
         <div>
                        <h3><a href="#">Website Development</a></h3>
                        <div><img src="images/web2.jpg" width="250" height="250" class="right">Our website development areas includes websites development in PHP and Java and database optimization. Our team is experts in various content management system and frameworks like joomla, wordpress, drupal, zend and codeigniter framework. <br /> <br />
                            <em><strong>We are expertise In following areas Website Development :</strong></em>
                            <ul style="margin-left:30px">
                                <li>Website Development in PHP and Java</li>
                                <li>Content Management Systems Joomla, Wordpress, Drupal</li>
                                <li>Frameworks Codeigniter and Zend</li>
                                <li>Facebbok Applications</li>
                                <li>Maintenance of Websites</li>
                                <li>Customization of Website</li>
                                <li>E-commerce Websites</li>
                                <li>SEO Friendly Environment</li>
                                <li>Database Management</li>
                                <li>Database Optimization</li>
                                <li>iPhone Web Services</li>
                              </ul>
                          </div>
                    </div>
        </div>
        <div class="tab">
            <h3><a href="#">Mobie Applications</a></h3>
            <div> <img src="images/web3.jpg" width="250" height="250" class="right"><?=$siteName?> works only on some specific mobile technologies. Our main focus is on android application development and J2ME application development. We are also working on iPhone applications Development.<br /> <br />
                <em><strong>We are expertise In following areas Mob Apps :</strong></em>
                <ul style="margin-left:30px">
                    <li>Android Application Development</li>
                    <li>J2ME Application Development</li>
                    <li>Mobile Application Development</li>
                    <li>iPhone Application Development</li>
                  </ul> 
            </div>
        </div>
        <div class="tab">
            <h3><a href="#">Search Engine Optimization</a></h3>
            <div>  <img src="images/web4.jpg" width="250" height="250" class="right">SEO services are used for ranking of websites at google. The SEO services play a significant role for the websites to be crawled by search engines. We follow the specific criteria for search engine optimization.<br /> <br />
                <em><strong>Some of the SEO sevices are of following types :</strong></em>
                <ul style="margin-left:30px">
                    <li>On Page Optimization</li>
                    <li>Off Page Optimization</li>
                    <li>Article Submission</li>
                    <li>Directory submission</li>
                    <li>Social Bookmarking</li>
                  </ul> 
             </div>
        </div>
        <div class="tab">
            <h3><a href="#">Web Hosting</a></h3>
            <div> <img src="images/web5.jpg" width="250" height="250" class="right">A web hosting service is a type of Internet hosting service that allows individuals and organizations to make their website accessible via the World Wide Web. Web hosts are companies that provide space on a server owned or leased for use by clients, as well as providing Internet connectivity, typically in a data center.  <br><br>
  The host may also provide an interface or control panel for managing the Web server and installing scripts, as well as other modules and service applications like e-mail.<br><br>
  			<em><strong>Types of Hosting :</strong></em>
            <ul style="margin-left:30px">
                <li>Free Web Hosting Service</li>
                <li>Shared Web Hosting Service</li>
                <li>Reseller Web Hosting</li>
                <li>Virtual Dedicated Server</li>
                <li>Dedicated Hosting Service</li>
                <li>Managed Hosting Service</li>
                <li>Cloud Hosting</li>
                <li>Clustered Hosting</li>
              </ul>
             </div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <!-- End Wrapper -->
  
  <div class="clearfix"></div>
  <div class="push"></div>
</div>

<?php include('includes/footer.php'); ?> 
<script type="text/javascript">

$(document).ready(function() {	
  //Get all the LI from the #tabMenu UL
  $('#tab-menu > li').click(function(){
    //remove the selected class from all LI    
    $('#tab-menu > li').removeClass('selected');
    //Reassign the LI
    $(this).addClass('selected');
    //Hide all the DIV in .tab-content
    $('.tab-content div.tab').slideUp('slow');
    //Look for the right DIV in boxBody according to the Navigation UL index, therefore, the arrangement is very important.
    $('.tab-content div.tab:eq(' + $('#tab-menu > li').index(this) + ')').slideDown('slow');
  }).mouseover(function() {
    //Add and remove class, Personally I dont think this is the right way to do it, anyone please suggest    
    $(this).addClass('mouseover');
    $(this).removeClass('mouseout');   
  }).mouseout(function() {
    //Add and remove class
    $(this).addClass('mouseout');
    $(this).removeClass('mouseover');    
  });
});


/*$(function() 
{
            var offset = $("#tab-menu").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $("#tab-menu").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $("#tab-menu").stop().animate({
                        marginTop: 0
                    });
                };
            });
});*/
</script>