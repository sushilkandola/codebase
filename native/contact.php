<?php ob_start(); include('includes/header.php'); 
if(@$_POST['submit'])
	{
		if(($_POST['name'] && $_POST['email'])!="")
		{
			 $name=$_POST['name'];
			 $email=$_POST['email'];
			 $mobile=$_POST['mobile'];
			 $message=$_POST['message'];
			 $date=date("Y-m-d");
			 $insQry="insert into contact_us (name,email, mobile, message,date) values ('$name','$email', '$mobile','$message','$date')";
			 $insExe=mysql_query($insQry);
			 $mess='Thanks! We Will Contact You Soon.';
			 header('location:contact.php?mess='.urlencode($mess));
		}
	}
?>   
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
            var latitude='28.466207';
            var longtude='77.029100';
            
            setTimeout(getlocation(latitude,longtude), 100);
            function getlocation(latitude,longtude)
            {
                google.maps.event.addDomListener(window, 'load', function() 
                {
                    var map = new google.maps.Map(document.getElementById('map'), 
                    {
                      zoom: 10,
                      center: new google.maps.LatLng(latitude,longtude),
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                    });
            
                    var infoWindow = new google.maps.InfoWindow;	
                    var onMarkerClick = function() 
                    {
                        var marker = this;
                        var latLng = marker.getPosition();
                        infoWindow.setContent("<p style='color:red; font-size:13px; font-weight:bold; color:red; height : 20px;'>Native Webs Technologies<br/>Sector-12, Gurgaon  -  Haryana</p>");
                        infoWindow.open(map, marker);
                    };
                                
                    var marker1 = new google.maps.Marker(
                    {
                        position: new google.maps.LatLng(latitude,longtude),
                        map: map
                    });
                    
                    google.maps.event.addListener(marker1, 'click', onMarkerClick);
                });
            }		  
         </script>
  <!-- Begin Wrapper -->
  <div id="wrapper"> 
    
    <!-- Begin Content -->
    <div class="content">
      <h3>Our Contact Information</h3>
      <p>Please fill up the form below to provide us your details, in case you want to contact us about our products and services. We will get back to you soon. Looking forward to hear from you. You can contact us at directly at our mail id : <a href="mailto:info@nativewebs.com"><strong>info@nativewebs.com</strong></a></p>
      <div class="contact-left">
        <div id="comment-form" class="comment-form">
          <h4>Send us your query : </h4>
          <form name="form_name" method="post">
                <div class="comment-input">
                  <p><input type="text" name="name" value="" id="name" placeholder="Full Name"></p>
                  <p><input type="text" name="email" value="" id="email" placeholder="Email Id"></p>
                  <p><input type="text" name="mobile" value="" id="mobile" placeholder="Mobile Number"></p>
                  <p><input type="text" name="website" value="" id="website" placeholder="Website"></p>
                </div>           
                <div class="comment-tsextarea"><textarea name="message" id="message" rows="3" cols="10"></textarea></div>
                <div class="cb lh20"></div>
                <div align="left"><input id="submit-button" class="button gray stripe" type="submit" name="submit" value="Submit" /></div>
                <div class="cb lh0"></div>
          </form>
        </div>
        <!-- End Form --> 
      </div>
      <div class="contact-right" style="margin-right:50px;">
         <div class="fl" style="padding:0px 0px;"><div id="map" style="width: 470px;height: 522px;border:1px solid #999999;"></div></div>
      </div>
      <div class="clear"></div>
      <div class="divider"></div>
    </div>
    <!-- End Content --> 
  </div>
  <!-- End Wrapper -->
  
  <div class="clearfix"></div>
  <div class="push"></div>
</div>

<?php include('includes/footer.php'); ?> 