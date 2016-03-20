<?php

class admin
{
 public function send_password($email,$pass)
 {
			
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br></font>
			<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
			
			
				<tr>
					<td style='text-align:left;padding:0pt 20px' align='left'>
							<div>
								<p>It is the email, which is generated automatcally, please do not reply. You can profile.<br><br> The following is the password of your account : <br><br>";
								$message .="Your Password : &nbsp; '".$pass."'<br>";
								$message .="Due to safety concern, we request you to change your password and keep it safe and secure.
								</p>
							</div>
					</td>			
				</tr>
				<tr>
					<td style='text-align:left;padding:10px' align='left'> 
						<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>		
					</td>
				</tr>
			</table>
			<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
		</div>";
	   
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "ent-Type: text/HTML; charset=utf-8\r\n";
		$headers .= "ent-Transfer-Encoding: 8bit\r\n";
		$from_address = "members@techminds.com";
		
		mail($email,"Password Change",$message, $headers,"-f $from_address");
 	}
 }
 ?>
 