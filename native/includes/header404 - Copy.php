<? error_reporting(E_ALL ^ E_NOTICE); 
include('conn/db_connect.php');	
include('includes/siteUrls.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Website Design, Website Development, Mobile Applications, Facebook Applications | NativeWebs Technologies, Gurgaon</title>
<meta name="description" content="Native Webs Technologies is a professional web applications based company based in India. We provide custom Website Design and Development. Mobile Application Development, Facebbok Applications Development, SEO Services, Web Hosting services to our clients across India. We are specialized in Website Design, E-Commerce Websites, Open Source CMS, Frameworks and Mobile Applications. Our Website Design and Development services are reasonably affordable." />
<meta name="keywords" content="Website Design, Website Development, Mobile Applications, Facebook Applications | Native Webs Technologies" />
<link rel="canonical" href="http://www.NativeWebs.com/" />
<meta name="Author" content="www.NativeWebs.com" />
<meta name="page-topic" content="Website Design, Website Development, Mobile Applications, Facebook Applications" />
<meta name="Copyright" content="Website Design and Development in Gurgaon" />
<meta name="geo.placename" content="Gurgaon, Chandigarh, Greater Noida, New Delhi, Delhi, Noida, India" />
<meta name="ROBOTS" content="INDEX, FOLLOW" />
<meta name="googlebot" content="INDEX, FOLLOW" />
<meta name="YahooSeeker" content="INDEX, FOLLOW" />
<meta name="msnbot" content="INDEX, FOLLOW" />
<meta name="reply-to" content="admin@nativewebs.com" />
<meta name="allow-search" content="yes" />
<meta name="revisit-after" content="daily" />
<meta name="distribution" content="global" />
<meta name="expires" content="never" />
<meta name="language" content="english" />

<link rel="stylesheet" type="text/css" href="<?=$siteurl?>/style.css" media="all" />
<link rel="stylesheet" media="all" href="<?=$siteurl?>/style/type/folks.css" />
<link rel="stylesheet" type="text/css" href="<?=$siteurl?>/style/css/style.css" media="all" />
<link rel="stylesheet" href="<?=$siteurl?>/css/skin.css">
<link rel="stylesheet" media="all" href="<?=$siteurl?>/style/css/prettyPhoto.css" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<script type="text/javascript" src="<?=$siteurl?>/style/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="style/js/jquery.cycle.all.min.js"></script>
<script type="text/javascript" src="<?=$siteurl?>/style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?=$siteurl?>/style/js/scripts.js"></script>
<script type="text/javascript" src="<?=$siteurl?>/scripts/slidedeck.jquery.lite.js" /></script>
<script type="text/javascript" src="<?=$siteurl?>/scripts/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?=$siteurl?>/style/js/quicksand.js"></script>
<script type="text/javascript" src="<?=$siteurl?>/style/js/portfolio.js"></script>
<script type="text/javascript" src="<?=$siteurl?>/style/js/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="<?=$siteurl?>/style/js/jquery.infieldlabel.min.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34293265-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script language="JavaScript">
<!-- Original:  Eddie Traversa (psych3@primus.com.au) -->
<!-- Web Site:  http://dhtmlnirvana.com/ -->
<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
window.onerror = null;
var topMargin = 100;
var slideTime = 1200;
var ns6 = (!document.all && document.getElementById);
var ie4 = (document.all);
var ns4 = (document.layers);
function layerObject(id,left) {
if (ns6) {
this.obj = document.getElementById(id).style;
this.obj.left = left;
return this.obj;
}
else if(ie4) {
this.obj = document.all[id].style;
this.obj.left = left;
return this.obj;
}
else if(ns4) {
this.obj = document.layers[id];
this.obj.left = left;
return this.obj;
   }
}
function layerSetup() {
floatLyr = new layerObject('floatLayer', pageWidth * .5);
window.setInterval("main()", 10)
}
function floatObject() {
if (ns4 || ns6) {
findHt = window.innerHeight;
} else if(ie4) {
findHt = document.body.clientHeight;
   }
} 
function main() {
if (ns4) {
this.currentY = document.layers["floatLayer"].top;
this.scrollTop = window.pageYOffset;
mainTrigger();
}
else if(ns6) {
this.currentY = parseInt(document.getElementById('floatLayer').style.top);
this.scrollTop = scrollY;
mainTrigger();
} else if(ie4) {
this.currentY = floatLayer.style.pixelTop;
this.scrollTop = document.body.scrollTop;
mainTrigger();
   }
}
function mainTrigger() {
var newTargetY = this.scrollTop + this.topMargin;
if ( this.currentY != newTargetY ) {
if ( newTargetY != this.targetY ) {
this.targetY = newTargetY;
floatStart();
}
animator();
   }
}
function floatStart() {
var now = new Date();
this.A = this.targetY - this.currentY;
this.B = Math.PI / ( 2 * this.slideTime );
this.C = now.getTime();
if (Math.abs(this.A) > this.findHt) {
this.D = this.A > 0 ? this.targetY - this.findHt : this.targetY + this.findHt;
this.A = this.A > 0 ? this.findHt : -this.findHt;
}
else {
this.D = this.currentY;
   }
}
function animator() {
var now = new Date();
var newY = this.A * Math.sin( this.B * ( now.getTime() - this.C ) ) + this.D;
newY = Math.round(newY);
if (( this.A > 0 && newY > this.currentY ) || ( this.A < 0 && newY < this.currentY )) {
if ( ie4 )document.all.floatLayer.style.pixelTop = newY;
if ( ns4 )document.layers["floatLayer"].top = newY;
if ( ns6 )document.getElementById('floatLayer').style.top = newY + "px";
   }
}
function start() {
if(ns6||ns4) {
pageWidth = innerWidth;
pageHeight = innerHeight;
layerSetup();
floatObject();
}
else if(ie4) {
pageWidth = document.body.clientWidth;
pageHeight = document.body.clientHeight;
layerSetup();
floatObject();
   }
}
//  End -->
</script>
</head>
<body onload="start()" > 
<!--Social Icons End -->
<div>
	<div align="center" id="floatLayer" style=" background-image:url(../images/bg_fb.png); background-repeat:no-repeat;position: absolute; height: 400px; float: left; width: 76px; top: 100px;-moz-border-radius:15px;border-radius:15px; background-color:#f0f0f0; text-align:center;">
    	<div style="clear:both; height:20px;">&nbsp;</div>
        <div style="height:80px; margin-left:2px;"><a href="#"><div class="fb-like" data-href="http://www.nativewebs.com" data-send="false"  data-count="true" data-layout="box_count" data-width="100" data-show-faces="false"></div></a></div>
       
        <div style="clear:both">&nbsp;</div>
        <div style="height:80px;"><a href="https://twitter.com/share" data-count="vertical" class="twitter-share-button" data-text="A fast growing industry in IT.Expertise in Web Design,Web Development and Mobile Apps"  data-via="<?= $siteurl ?>">&nbsp;</a></div>	<!--,<?= date('d-M');?>.-->
        <div style="clear:both">&nbsp;</div>
        <div style="height:80px; margin-left:3px;"><a href="#"><g:plusone  size="Tall" href="<?php echo $siteurl ?>"></g:plusone></a></div>
        <div style="clear:both">&nbsp;</div>
        <div style="height:40px;"><script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="www.nativewebs.com" data-counter="false"></script></div>	<!-- data-counter="false"-->
		<!--http://developer.linkedin.com/plugins/share-plugin-generator-->
        <!-- Digg share button -->
   
   <!-- / Digg Share Button -->  
        
        <div style="clear:both">&nbsp;</div>
        <div style="height:40px;"><a href="javascript:void(window.open('http://www.myspace.com/Modules/PostTo/Pages/?u=' +encodeURIComponent(document.location.toString()), 'ptm','height=450,width=550').focus())"><img src="http://cms.myspacecdn.com/cms//ShareOnMySpace/Myspace_btn_Share.png" border="0" alt="Share on Myspace" /></a></div>
      <!--  <div style="clear:both">&nbsp;</div>
        <div style="height:80px; margin-left:3px;">
            <script type="text/javascript">
				(function() {
				var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
				s.type = 'text/javascript';
				s.async = true;
				s.src = 'http://widgets.digg.com/buttons.js';
				s1.parentNode.insertBefore(s, s1);
				})();
            </script>
            <a class="DiggThisButton DiggMedium"></a></if></div>-->
    </div>
<!-- Place this tag after the last plusone tag -->
	<script type="text/javascript">
    (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
    </script>
<!-- Google Plus Code  Ends-->
<!-- Twitter Code  Starts-->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- Twitter Code  Ends-->

<!-- Facebook Code  Starts-->
	<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook Code  Ends-->
</div>
<!--Social Icons End -->
<div id="container"> 
  <!-- Begin Header Wrapper -->
  <div id="page-top" style="margin-bottom:10px;">
    <div id="header-wrapper"> 
      <!-- Begin Header -->
      <div id="header">
        <div style="padding-top:5px;"><a href="index.php"><img src="style/images/logo.png" alt="Native Webs Technologies" title="Native Webs Technologies" width="171" height="95" /></a></div>
        <!-- Logo --> 
        <!-- Begin Menu -->
        <div id="menu-wrapper">
          <div id="smoothmenu1" class="ddsmoothmenu">
            <ul>
              <li><a href="http://www.nativewebs.com"<?php if (basename($_SERVER['SCRIPT_FILENAME'])=='') { echo 'class="selected"'; }?>>Home</a></li>
              <li ><a href="<?=$siteurl?>/about.php" <?php if (basename($_SERVER['SCRIPT_FILENAME'])=='about.php') { echo 'class="selected"'; }?>>About Us</a></li>
              <li><a href="<?=$siteurl?>/career.php" <?php if (basename($_SERVER['SCRIPT_FILENAME'])=='career.php') { echo 'class="selected"'; }?>>Careers</a></li>
              <li><a href="<?=$siteurl?>/blog.php" <?php if ((basename($_SERVER['SCRIPT_FILENAME'])=='blog.php') || (basename($_SERVER['SCRIPT_FILENAME'])=='blogInfo.php') || (basename($_SERVER['SCRIPT_FILENAME'])=='news.php') || (basename($_SERVER['SCRIPT_FILENAME'])=='newsInfo.php')) { echo 'class="selected"'; }?>	>Blog</a>
                <ul>
                  <li><a href="<?=$siteurl?>/blog.php">Blog</a></li>
                  <li><a href="<?=$siteurl?>/news.php">News</a></li>
                </ul>
              </li>
              <!--<li><a href="portfolio.php">Portfolio</a></li>-->
              <li><a href="<?=$siteurl?>/services.php"<?php if (basename($_SERVER['SCRIPT_FILENAME'])=='services.php') { echo 'class="selected"'; }?>>Services</a>
              	<!--<ul>
                  <li><a href="#">Portfolio with Lightbox</a></li>
                  <li><a href="#">Portfolio with Details</a></li>
                  <li><a href="#">Single Portfolio Post</a></li>
                </ul>-->
              </li>
              <li><a href="<?=$siteurl?>/contact.php" <?php if (basename($_SERVER['SCRIPT_FILENAME'])=='contact.php') { echo 'class="selected"'; }?>>Contact Us</a></li>
            </ul>
          </div>
        </div>
        <!-- End Menu --> 
      </div>
      <!-- End Header --> 
    </div>
  </div>
  <!-- End Header Wrapper --> 
