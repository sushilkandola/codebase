<?php
        
	class user_registeration
	{
		public function email_adminuser(){
			
			$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table align='center'>
<tr>
<td><img src='http://palmerapplications.com/econnect_app/images/e_connect_logo.png' /> </td>
</tr>
</table>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>


<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><b><font style='font-size:24px'>E-Connect Card</font></b></center><p></p><div>

<p>This is an automated email sent for the purposes of a activation/reactivation of your E-Connect profile.<br><br> The following are details of your account : <br><br>";

$message .="Your UserName is: &nbsp; '".$email."'<br>";
$message .="Your Password is: &nbsp; '".$password."'<br>";
$message .="Your Account id is: &nbsp; '".$new_account_id."'<br><br>";
$message .="On clicking the link below.Your account will be activated.<br>";

$message .="<font color='#0000ff'>http://palmerapplications.com/econnect_app/activate.php?email=".urlencode($email)." </font><br><br>With safety being our primary concern, we request you to primarily change your login password and keep it in a safe and secure location.

</p>
</div></td>
</tr>

<tr>
<td align='left'>
</td></tr>
</tbody></table>


</td>
</tr>


<tr>
<td style='text-align:left;padding:10px' align='left'> 

<p style='font-size:90%'><i>Econnect Card is the easiest way to create Bussiness Card.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by Econnect Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
/*$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= "From: info@econnect.com\r\n";
*/    
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address = "info@econnect.com";

echo $message;

	    	//mail($email,"Thanks for registering with us.",$message, $headers,"-f $from_address");
			
					
				
		}
	}
	 
?>