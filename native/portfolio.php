<?php include('includes/header.php'); ?>   
  
  <!-- Begin Wrapper -->
  <div id="wrapper">
    <div id="portfolio"> 
      <!-- Begin Portfolio Navigation -->
      <ul class="gallerynav">
        <li class="selected-1"><a href="#" data-value="all">All<span></span></a></li>
        <li><a href="#" data-value="illustration">Illustration<span></span></a></li>
        <li><a href="#" data-value="photography">Photography<span></span></a></li>
        <li><a href="#" data-value="video">Video<span></span></a></li>
        <li><a href="#" data-value="web">Web Design<span></span></a></li>
      </ul>
      <!-- End Portfolio Navigation --> 
      
      <!-- Begin Portfolio Elements -->
      <ul id="gallery" class="grid">
        
        <!-- Begin Image 1 -->
        <li data-id="id-1" class="photography"> <a href="style/images/art/portfolio1.jpg" rel="prettyPhoto[gallery]"> <img src="style/images/art/portfolio1-th.jpg" alt="" /></a> </li>
        <!-- End Image 1 -->
        
        <li data-id="id-2" class="illustration"> <a href="style/images/art/portfolio2.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio2-th.jpg" alt="" /></a> </li>
        <li data-id="id-3" class="video"> <a href="http://vimeo.com/4887811" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio3-th.jpg" alt="" /></a> </li>
        <li data-id="id-4" class="web"> <a href="style/images/art/portfolio4.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio4-th.jpg" alt="" /></a> </li>
        <li data-id="id-5" class="photography"> <a href="style/images/art/portfolio5.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio5-th.jpg" alt="" /></a> </li>
        <li data-id="id-6" class="illustration"> <a href="style/images/art/portfolio6.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio6-th.jpg" alt="" /></a> </li>
        <li data-id="id-7" class="video"> <a href="http://www.youtube.com/watch?v=RXZY_XRjABs" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio7-th.jpg" alt="" /></a> </li>
        <li data-id="id-8" class="web"> <a href="style/images/art/portfolio8.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio8-th.jpg" alt="" /></a> </li>
        <li data-id="id-9" class="illustration"> <a href="style/images/art/portfolio9.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio9-th.jpg" alt="" /></a> </li>
        <li data-id="id-10" class="photography"> <a href="style/images/art/portfolio10.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio10-th.jpg" alt="" /></a> </li>
        <li data-id="id-11" class="video"> <a href="http://trailers.apple.com/movies/disney/up/up-tlr3r_p.640.mov?width=640&height=380" rel="prettyPhoto[gallery] 500 900" title=""> <img src="style/images/art/portfolio11-th.jpg" alt="" /></a> </li>
        <li data-id="id-12" class="web"> <a href="style/images/art/portfolio12.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio12-th.jpg" alt="" /></a> </li>
        <li data-id="id-13" class="photography"> <a href="style/images/art/portfolio13.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio13-th.jpg" alt="" /></a> </li>
        <li data-id="id-14" class="illustration"> <a href="style/images/art/portfolio14.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio14-th.jpg" alt="" /></a> </li>
        <li data-id="id-15" class="photography"> <a href="style/images/art/portfolio15.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio15-th.jpg" alt="" /></a> </li>
        <li data-id="id-16" class="illustration"> <a href="style/images/art/portfolio16.jpg" rel="prettyPhoto[gallery]" title=""> <img src="style/images/art/portfolio16-th.jpg" alt="" /></a> </li>
      </ul>
      <!-- End Portfolio Elements --> 
      
    </div>
  </div>
  
  <!-- End Wrapper -->
  <div class="clearfix"></div>
  <div class="push"></div>
</div>

<?php include('includes/footer.php'); ?> 
<script type="text/javascript">
$(document).ready(function(){
			$("#gallery a[rel^='prettyPhoto']").prettyPhoto({theme:'light_square',autoplay_slideshow: false});
			
			$("ul.grid img").hide()
			$("ul.grid img").each(function(i) {
			  $(this).delay(i * 200).fadeIn();
			});
			
});
</script>
</body>
</html>