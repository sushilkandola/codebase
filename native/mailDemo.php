<html>
<body>
<?php
echo "<h2>Mail Sent Successfully</h2>";
  $subject = "NativeWebs.com";
  
  $email='abc@gmail.com';
  $iam='Engineer ';
  $reqname='Sushil kandola';
  $project='NativeWebs';
  $reqphone='9582484715';
  $reqcity='Gurgaon';
  $reqaddress='Hey, How r u??';
 
    $message = "<div style='background-color:#f00; color:#fff; height:30px; padding : 10px;'><ul><li>I Am:".$iam."</li><li>Project:".$project."</li><li>Name:".$reqname."</li><li>Phone:".$reqphone."</li><li>Message:".$reqaddress."</li><li>City:".$reqcity."</li></div> ";
    $headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    mail("sushilkandola.88@gmail.com", $subject,$message, $headers);
	//mail("nikhilgoyal229@gmail.com", $subject,$message, $headers);
 ?> 
</body>

</html>