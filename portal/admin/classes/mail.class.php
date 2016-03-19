
<?php

class admin_user
{
 public function email_adminuser($email,$password,$username)
 {
			
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>
		
		</font>
		<table align='center'>
		<tr>
		<td></td>
		</tr>
		</table>
		<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
		
		
		<tbody><tr>
		<td align='center'>
		<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>
		
		<tbody><tr>
		<td style='text-align:left;padding:0pt 20px' align='left'><div>
		</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>
		
		<p> This is an automatically generated email, please do not reply. You can activate/reactivate your 21flats profile.<br><br> The following are details of your account : <br><br>";
		
		$message .="Your UserName : &nbsp; '".$username."'<br>";
		$message .="Your Password : &nbsp; '".$password."'<br>";
		
		
		$message .="<font color='#0000ff'></font><br><br>With safety being our primary concern, we request you to primarily change your login password and keep it in a safe and secure location.
		
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
		
		<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>
		
		
		</td></tr>
		
		</tbody></table>
		
		
		
		<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
		</div>";
		/*$headers = "MIME-Version: 1.0\r\n";
		$headers .= "ent-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "From: info@econnect.com\r\n";
		*/    
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "ent-Type: text/HTML; charset=utf-8\r\n";
		$headers .= "ent-Transfer-Encoding: 8bit\r\n";
		$from_address = "members@21Flats.com";
		
		mail($email,"Thanks for registering with us.",$message, $headers,"-f $from_address");
		//mail($email,"Thanks for registering with us.",$message, $headers);
 }
 
 //mail lead
 public function lead($user_name,$city_name,$flatname,$locationname,$buget,$created_date)
 {            
		
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>
		
		</font>
		<table align='center'>
		<tr>
		<td></td>
		</tr>
		</table>
		<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
		
		
		<tbody><tr>
		<td align='center'>
		<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>
		
		<tbody><tr>
		<td style='text-align:left;padding:0pt 20px' align='left'><div>
		</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>
		
		<p> This is an automatically generated email, please do not reply. You can activate/reactivate your 21flats profile.<br><br> The following are details of your account : <br><br>";
		
		$message .="Your User Name : &nbsp; $user_name<br>";
		$message .="Your City Name : &nbsp; $city_name<br>";
		$message .="Your Flat Size : &nbsp; $flatname<br>";
		$message .="Your Location Name : &nbsp; $locationname<br>";
		$message .="Your Budget : &nbsp; $buget<br>";
		
		
		$message .="<font color='#0000ff'></font><br><br>With safety being our primary concern, we request you to primarily change your login password and keep it in a safe and secure location.
		
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
		
		<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>
		
		
		</td></tr>
		
		</tbody></table>
		
		
		
		<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
		</div>";
		/*$headers = "MIME-Version: 1.0\r\n";
		$headers .= "ent-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "From: info@econnect.com\r\n";
		*/    
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "ent-Type: text/HTML; charset=utf-8\r\n";
		$headers .= "ent-Transfer-Encoding: 8bit\r\n";
		$from_address = "members@21Flats.com";
	
		
		mail('vikassamota@gmail.com',"21Flats user requirement",$message, $headers,"-f $from_address");
		//mail('vikassamota@gmail.com',"21Flats User Requirement",$message, $headers);
 }
 
 
		//send mail after project add to a group
		//send mail after project add to a group
 public function email_project($email,$project_id,$user_name)
 {
		global $email_id;
			$sql_project="select * from projects where project_id='".$project_id."'";
			$Execut_project=mysql_query($sql_project) or die(mysql_error());
			$data=mysql_fetch_array($Execut_project);
			//mail data 
			$Fname=$user_name;
			$project_tag_line=$data['project_tag_line'];
			
			$locality_id=$data['locality_id'];
			if(($locality_id=="") || ($locality_id=="-1"))
			{
			$location_name="";
			$city_name="";
			}else{
			
			$location_name=getname::locationname($locality_id);
			$city_name=getname::citynameFormail($locality_id);
			}
			$admin_user_id=$data['admin_user_id'];
			if($admin_user_id=="")
			{
			$conatct_person="";
			$conatct_mobile="";
			}else{
			$contact_person=getname::contact_personFormail($admin_user_id);
			$conatct_person_name=$contact_person['admin_user_name'];
			$conatct_mobile=$contact_person['phone_number'];
			}
			$type_per_square=$data['type_per_square'];
			if($type_per_square=='sf' )
				{
					$type_per_square_unit="Sq.Ft";
				}
				else 
				{
					$type_per_square_unit="Sq.Yd"; 
				}
			$current_rate_psf=$data['current_rate_psf'];
			$discounted_rate_psf=trim($data['discounted_rate_psf']);
			
			
			$total_amount=$data['total_amount'];
			$total_amount_discount=trim($data['total_amount_discount']);
			
		
			
		    $people_req=$data['people_req'];
			$bid_date= date('d-M-Y',strtotime($data['bid_date']));
			//$bid_date=$data['bid_date'];
			$project_desc=$data['project_desc'];
			$project_terms=$data['project_terms'];
            if($total_amount=="" or $total_amount==0)
			{
			}else{
			}



	
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>



<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>";
$message .="<div style='width:550px; margin:auto; border:solid 1px #000; padding:8px; text-align:justify;'>
    	<div>Dear <strong>$Fname</strong>, this project assign to you. Project located in <strong>$location_name, $city_name</strong>. </div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <div>The project details are as follows:-</div>";
		if($data['project_ele']!=''){
         $message.="
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  <div style='margin:5px 0px 0px 20px; float: left;'><img src='http://www.21flats.com/intranet/project/project_doc/".$data['project_ele']."' height='90' width='150' style='border:solid 1px #F00;'></div>
		  <div style='color:#333399; float:right; vertical-align:bottom; padding-top:65px; padding-right:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
	 	}
		else{
			$message.="
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
			  <div style='color:#333399; float:left; padding-top:5px; padding-left:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
			}
        
         $message.="<div style='background-color:#eef7fc; margin:20px; padding:5px;'>
        		<div style='color:#d31717;'><strong>$project_tag_line</strong></div>";
			if($current_rate_psf!='0')
			{
			
			
				$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	<div style='float:left; width:250px;'><strong>Market Price : $current_rate_psf/$type_per_square_unit</strong></div>";
				if(!empty($discounted_rate_psf))
				{
					$check_input=substr($discounted_rate_psf,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $discounted_rate_psf/$type_per_square_unit</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";				/*Discount Rate : $discounted_rate_psf*/
					}
				}
				
				
				
			}
			
			
			if($total_amount!='0')
			{
			
			
			
			$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	";
				if(!empty($total_amount_discount))
				{
					$check_input=substr($total_amount_discount,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $total_amount_discount</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";
					}
				}
						
						
						
			}
        $message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        </div>
        
        <p style='color:#d31717;'><strong>Project Description</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_desc</div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <p style='color:#d31717;'><strong>Project Price & Terms</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_terms</div>
        <p>Please note that the offer is on first come - first serve basis and will be available to first <strong>$people_req</strong> people's. Who give us the booking amount before <strong>$bid_date.</strong></p>
        <p>You can call 21Flats.com representative, <strong>$conatct_person_name</strong> at <strong>$conatct_mobile</strong> for any further queries.</p>
		
       
       
        
    </div>";

$message .="
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

<p style='font-size:90%'><i>21flats is the easiest way to purchase properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address = "members@21Flats.com";
//echo $_SERVER['REQUEST_METHOD'];
//echo $message;

		
	       mail($email,"Property Recommendation.",$message, $headers,"-f $from_address");
		  //mail($email,"Thanks for registering with us.",$message, $headers);	
					
				
		}
		
		
 public function email_events($email,$date,$detail)
 {
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>
		
		</font>
		<table align='center'>
		<tr>
		<td></td>
		</tr>
		</table>
		<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
		
		
		<tbody><tr>
		<td align='center'>
		<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>
		
		<tbody><tr>
		<td style='text-align:left;padding:0pt 20px' align='left'><div>
		</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>
		
		<p>This is an automatically generated email, please do not reply. The purpose is to inform you about 21flats venue.<br><br> The following details are : <br><br>";
		//$message .="Event Date: &nbsp; '".$date."'<br>";
		//$message .="Event Message: &nbsp; '".$detail."'<br><br><br>";
		$message .="Event Date: &nbsp; '". date('d-M-Y',strtotime($date))."'<br>";
		$tags = array("<p>", "</p>");
		$detail_1 = str_replace($tags, "", $detail);
		$message .="Event Message: &nbsp; ".ucfirst($detail_1)."<br><br>";
		$message .="<font color='#0000ff'></font><br><br>With safety being our primary concern, we request you to primarily fill your needs.
		
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
		
		<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>
		
		
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
		$from_address = "members@21Flats.com";
		//echo $message;
		
	     mail($email,"Event Details.",$message, $headers,"-f $from_address");
		// mail($email,"Thanks for registering with us.",$message, $headers);	
					
				
		}

 public function email_mem_send($email,$detail)
 {
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>
		
		</font>
		<table align='center'>
		<tr>
		<td></td>
		</tr>
		</table>
		<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
		
		
		<tbody><tr>
		<td align='center'>
		<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>
		
		<tbody><tr>
		<td style='text-align:left;padding:0pt 20px' align='left'><div>
		</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>
		
		<p>This is an automatically generated email, please do not reply. The purpose is to inform you about 21flats venue.<br><br> The following details are : <br><br>";
		
		$message .="Message: &nbsp; '".$detail."'<br><br><br>";
		$message .="<font color='#0000ff'></font><br><br>With safety being our primary concern, we request you to primarily fill your needs.
		
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
		
		<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>
		
		
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
		$from_address = "members@21Flats.com";
		//echo $message;
		
	   mail($email,"21flats Message.",$message, $headers,"-f $from_address");
		//mail($email,"Thanks for registering with us.",$message, $headers);	
					
				
		}


		
public function registeremail($email,$password)
{
			$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table align='center'>
<tr>
<td></td>
</tr>
</table>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>


<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>

<p> This is an automatically generated email, please do not reply. You can activate/reactivate your 21flats profile.<br><br> The following are details of your account : <br><br>";

$message .="Your UserName : &nbsp; '".$email."'<br>";
$message .="Your Password : &nbsp; '".$password."'<br>";

$message .="On clicking the link below.Your account will be activated.<br>";

$message .="<font color='#0000ff'><a href='http://www.21flats.com/activate.php?email=".urlencode($email)."'>".$_SERVER['HTTP_HOST']."/activate.php?email=".urlencode($email)."</a> </font><br><br>With safety being our primary concern, we request you to primarily change your login password and keep it in a safe and secure location.

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

<p style='font-size:90%'><i>21flats is the easiest way to Buy Properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


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
$from_address = "members@21Flats.com";


//echo $_SERVER['REQUEST_METHOD'];
	    	mail($email,"Thanks for registering with us.",$message, $headers,"-f $from_address");
			//mail($email,"Thanks for registering with us.",$message, $headers);
		}
		
		
		
function forgetpass_mail($email,$password)
{
	
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>



<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>";


$message .="Your Password 		:   '".$password."'<br>";							
$message .="
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

<p style='font-size:90%'><i>21flats is the easiest way to purchase properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
//echo $message;

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address = "members@21Flats.com";
//echo $_SERVER['REQUEST_METHOD'];

mail($email,"Your 21flats profile password.",$message, $headers,"-f $from_address");
			//mail($email,"Your Password Has Been Send.",$message, $headers);
}

function expressmail($email,$project_id,$urlsend)
{         
   global $email_id;
			$sql_project="select * from projects where project_id='".$project_id."'";
			$Execut_project=mysql_query($sql_project) or die(mysql_error());
			$data=mysql_fetch_array($Execut_project);
			//mail data 
			$Fname=$_SESSION["userdata"]['user_name'];
			$project_tag_line=$data['project_tag_line'];
			
			$locality_id=$data['locality_id'];
			if($locality_id=="")
			{
			$location_name="";
			$city_name="";
			}else{
			
			$location_name=getname::locationname($locality_id);
			$city_name=getname::citynameFormail($locality_id);
			}
			$admin_user_id=$data['admin_user_id'];
			if($admin_user_id=="")
			{
			$conatct_person="";
			$conatct_mobile="";
			}else{
			$contact_person=getname::contact_personFormail($admin_user_id);
			$conatct_person_name=$contact_person['admin_user_name'];
			$conatct_mobile=$contact_person['phone_number'];
			}
			$type_per_square=$data['type_per_square'];
			if($type_per_square=='sf' )
				{
					$type_per_square_unit="Sq.Ft";
				}
				else 
				{
					$type_per_square_unit="Sq.Yd"; 
				}
			
			$current_rate_psf=$data['current_rate_psf'];
			$discounted_rate_psf=trim($data['discounted_rate_psf']);				/**/
			
			$total_amount=$data['total_amount'];
			$total_amount_discount=trim($data['total_amount_discount']);				/**/
			
		    $people_req=$data['people_req'];
			$bid_date= date('d-M-Y',strtotime($data['bid_date']));
			//$bid_date=$data['bid_date'];
			$project_desc=$data['project_desc'];
			$project_terms=$data['project_terms'];
            if($total_amount=="" or $total_amount==0)
			{
			}else{
			}



	
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>



<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>";
$message .="<div style='width:550px; margin:auto; border:solid 1px #000; padding:8px; text-align:justify;'>
    	<div>Dear <strong>$Fname</strong>,<br /><br />
		 Thank You for expressing interest in 21Flats.com.
		</div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <div>The project details are as follows:- <br /><br />";
		
		if($data['project_ele']!='')
		{
         $message.="
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  <div style='margin:5px 0px 0px 20px; float: left;'><img src='http://www.21flats.com/intranet/project/project_doc/".$data['project_ele']."' height='90' width='150' style='border:solid 1px #F00;'></div>
		  <div style='color:#333399; float:left; padding-left:30px; vertical-align:bottom; padding-top:65px; padding-right:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
	 	}
		else{
			$message.="
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
			  <div style='color:#333399; float:left; padding-top:5px; padding-left:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
		}
      
			$message.="</div>";
		
        
         $message.="<div>
        		<div style='color:#d31717;padding-top:10px;'><strong>$project_tag_line</strong></div></div>";
			if($current_rate_psf!='0')
			{
			
			
				$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	<div style='width:250px;padding-top:10px;'><strong>Market Price : $current_rate_psf/$type_per_square_unit</strong></div>";
				if(!empty($discounted_rate_psf))
				{
					$check_input=substr($discounted_rate_psf,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='width:250px;padding-top:10px;'><strong>Best Offer Price : Rs. $discounted_rate_psf/$type_per_square_unit</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='width:250px;padding-top:10px;'><strong>Best Offer Price</strong></div>
                ";
					}
				}
				
				
				
			}
			
			
			if($total_amount!='0')
			{
			
			
			
			$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	<";
				if(!empty($total_amount_discount))
				{
					$check_input=substr($total_amount_discount,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='width:250px; padding-top:10px;'><strong>Best Offer Price : Rs. $total_amount_discount</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='width:250px; padding-top:10px;'><strong>Best Offer Price</strong></div>
                ";
					}
				}
						
				 
						
			}
        $message.="<div style='clear:both; height:5px; line-height:5px;'>&nbsp;</div>
        
        
        <p style='color:#d31717;'><strong>Project Description</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_desc</div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <p style='color:#d31717;'><strong>Project Price & Terms</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_terms</div>
       
        <p>You can call 21Flats.com representative, <strong>$conatct_person_name</strong> at <strong>$conatct_mobile</strong> for any further queries.</p>
		 <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
       
       
        
    </div>";

$message .="
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

<p style='font-size:90%'><i>21flats is the easiest way to purchase properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address = "members@21Flats.com";
//echo $_SERVER['REQUEST_METHOD'];
//echo $message;

	    mail($email,"Your Project Details.",$message, $headers,"-f $from_address");
			//mail($email,"Project Detail Has Been Send.",$message, $headers);
}


function exp_int_for_reg($email,$project_id,$Fname,$urlsend)
{         
   global $email_id;
			$sql_project="select * from projects where project_id='".$project_id."'";
			$Execut_project=mysql_query($sql_project) or die(mysql_error());
			$data=mysql_fetch_array($Execut_project);
			//mail data 
			$Fname=$Fname;
			$project_tag_line=$data['project_tag_line'];
			
			$locality_id=$data['locality_id'];
			if($locality_id=="")
			{
			$location_name="";
			$city_name="";
			}else{
			
			$location_name=getname::locationname($locality_id);
			$city_name=getname::citynameFormail($locality_id);
			}
			$admin_user_id=$data['admin_user_id'];
			if($admin_user_id=="")
			{
			$conatct_person="";
			$conatct_mobile="";
			}else{
			$contact_person=getname::contact_personFormail($admin_user_id);
			$conatct_person_name=$contact_person['admin_user_name'];
			$conatct_mobile=$contact_person['phone_number'];
			}
			$type_per_square=$data['type_per_square'];
			if($type_per_square=='sf' )
				{
					$type_per_square_unit="Sq.Ft";
				}
				else 
				{
					$type_per_square_unit="Sq.Yd"; 
				}
			
			$current_rate_psf=$data['current_rate_psf'];
			$discounted_rate_psf=trim($data['discounted_rate_psf']);
			
			$total_amount=$data['total_amount'];
			$total_amount_discount=trim($data['total_amount_discount']);
		
			
		    $people_req=$data['people_req'];
				$bid_date= date('d-M-Y',strtotime($data['bid_date']));
			$project_desc=$data['project_desc'];
			$project_terms=$data['project_terms'];
           



	
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>



<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>";
$message .="<div style='width:550px; margin:auto; border:solid 1px #000; padding:8px; text-align:justify;'>
</hr>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
    	<div>Dear <strong>$Fname</strong>,<br /> Thanks for expressing your interest in this project - <strong>$location_name, $city_name</strong>. </div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <div>The project details are as follows:-</div>";
		if($data['project_ele']!=''){
         $message.="
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  <div style='margin:5px 0px 0px 20px; float: left;'><img src='http://www.21flats.com/intranet/project/project_doc/".$data['project_ele']."' height='90' width='150' style='border:solid 1px #F00;'></div>
		  <div style='color:#333399; float:right; vertical-align:bottom; padding-top:65px; padding-right:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
	 	}
		else{
			$message.="
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
			  <div style='color:#333399; float:left; padding-top:5px; padding-left:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
			}
        
          $message.="<div style='background-color:#eef7fc; margin:20px; padding:5px;'>
        		<div style='color:#d31717;'><strong>$project_tag_line</strong></div>";
			if($current_rate_psf!='0')
			{
			
			
				$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	<div style='float:left; width:250px;'><strong>Market Price : $current_rate_psf/$type_per_square_unit</strong></div>";
				if(!empty($discounted_rate_psf))
				{
					$check_input=substr($discounted_rate_psf,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $discounted_rate_psf/$type_per_square_unit</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";
					}
				}
				
				
				
			}
			
			
			if($total_amount!='0')
			{
			
			
			
			$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	";
				if(!empty($total_amount_discount))
				{
					$check_input=substr($total_amount_discount,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $total_amount_discount</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";
					}
				}
						
						
						
			}
        $message.="<div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        </div>
        
        <p style='color:#d31717;'><strong>Project Description</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_desc</div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <p style='color:#d31717;'><strong>Project Price & Terms</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_terms </div>
        <p>Please note that the offer is on first come - first serve basis and will be available to first <strong>$people_req</strong> people's. Who give us the booking amount before <strong>$bid_date.</strong></p>
        <p>You can call 21Flats.com representative, <strong>$conatct_person_name</strong> at <strong>$conatct_mobile</strong> for any further queries.</p>
		 
    </div>";

$message .="
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

<p style='font-size:90%'><i>21flats is the easiest way to purchase properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address = "members@21Flats.com";
//echo $_SERVER['REQUEST_METHOD'];
//echo $message;
//die;
	    	mail($email,"Project detail information and your password.",$message, $headers,"-f $from_address");
			//mail($email,"Project Detail Has Been Send.",$message, $headers);
}

function exp_int_not_reg($email,$password,$project_id,$Fname,$urlsend)
{         
   global $email_id;
			$sql_project="select * from projects where project_id='".$project_id."'";
			$Execut_project=mysql_query($sql_project) or die(mysql_error());
			$data=mysql_fetch_array($Execut_project);
			//mail data 
			$Fname=$Fname;
			$project_tag_line=$data['project_tag_line'];
			
			$locality_id=$data['locality_id'];
			if($locality_id=="")
			{
			$location_name="";
			$city_name="";
			}else{
			
			$location_name=getname::locationname($locality_id);
			$city_name=getname::citynameFormail($locality_id);
			}
			$admin_user_id=$data['admin_user_id'];
			if($admin_user_id=="")
			{
			$conatct_person="";
			$conatct_mobile="";
			}else{
			$contact_person=getname::contact_personFormail($admin_user_id);
			$conatct_person_name=$contact_person['admin_user_name'];
			$conatct_mobile=$contact_person['phone_number'];
			}
			$type_per_square=$data['type_per_square'];
			if($type_per_square=='sf' )
				{
					$type_per_square_unit="Sq.Ft";
				}
				else 
				{
					$type_per_square_unit="Sq.Yd"; 
				}
			
			$current_rate_psf=$data['current_rate_psf'];
			$discounted_rate_psf=trim($data['discounted_rate_psf']);
			
			$total_amount=$data['total_amount'];
			$total_amount_discount=trim($data['total_amount_discount']);
	
		    $people_req=$data['people_req'];
			$bid_date= date('d-M-Y',strtotime($data['bid_date']));
			$project_desc=$data['project_desc'];
			$project_terms=$data['project_terms'];
           
	
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>



<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>";
$message .="<div style='width:550px; margin:auto; border:solid 1px #000; padding:8px; text-align:justify;'>";
$message .="<p> This is an automatically generated email, please do not reply. You can activate/reactivate your 21flats profile.<br><br> The following are details of your account : <br><br>";

$message .="Your UserName : &nbsp; '".$email."'<br>";
$message .="Your Password : &nbsp; '".$password."'<br>";

$message .="On clicking the link below.Your account will be activated.<br>";

$message .="<font color='#0000ff'><a href='http://www.21flats.com/activate.php?email=".urlencode($email)."'>".$_SERVER['HTTP_HOST']."/activate.php?email=".urlencode($email)."</a> </font><br><br>With safety being our primary concern, we request you to primarily change your login password and keep it in a safe and secure location.

</p>
<hr>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
    	<div>Dear <strong>$Fname</strong>,<br /> Thanks for expressing your interest in this project - <strong>$location_name, $city_name</strong>.</div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <div>The project details are as follows:-</div>";
		if($data['project_ele']!=''){
         $message.="
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  <div style='margin:5px 0px 0px 20px; float: left;'><img src='http://www.21flats.com/intranet/project/project_doc/".$data['project_ele']."' height='90' width='150' style='border:solid 1px #F00;'></div>
		  <div style='color:#333399; float:right; vertical-align:bottom; padding-top:65px; padding-right:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
	 	}
		else{
			$message.="
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
			  <div style='color:#333399; float:left; padding-top:5px; padding-left:20px;'><strong><a href='$urlsend' style='text-decoration:none;'>Go to the project!</a></strong></div>
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
			}
        
          $message.="<div style='background-color:#eef7fc; margin:20px; padding:5px;'>
        		<div style='color:#d31717;'><strong>$project_tag_line</strong></div>";
			if($current_rate_psf!='0')
			{
			
			
				$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	<div style='float:left; width:250px;'><strong>Market Price : $current_rate_psf/$type_per_square_unit</strong></div>";
				if(!empty($discounted_rate_psf))
				{
					$check_input=substr($discounted_rate_psf,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $discounted_rate_psf/$type_per_square_unit</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";
					}
				}
				
				
				
			}
			
			
			if($total_amount!='0')
			{
			
			
			
			$message.=" <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
				<div>
                	";
				if(!empty($total_amount_discount))
				{
					$check_input=substr($total_amount_discount,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $total_amount_discount</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";
					}
				}
						
						
						
			}
        $message.="<div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        </div>
        
        <p style='color:#d31717;'><strong>Project Description</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_desc</div>
        <div style='clear:both; height:10px; line-height:10px;'>&nbsp;</div>
        <p style='color:#d31717;'><strong>Project Price & Terms</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_terms</div>
        <p>Please note that the offer is on first come - first serve basis and will be available to first <strong>$people_req</strong> people's. Who give us the booking amount before <strong>$bid_date.</strong></p>
        <p>You can call 21Flats.com representative, <strong>$conatct_person_name</strong> at <strong>$conatct_mobile</strong> for any further queries.</p>
		
    </div>";

$message .="
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

<p style='font-size:90%'><i>21flats is the easiest way to purchase properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address = "members@21Flats.com";
//echo $_SERVER['REQUEST_METHOD'];
//echo $message;

mail($email,"your User name and password and Project detail information.",$message, $headers,"-f $from_address");
			//mail($email,"Project Detail Has Been Send.",$message, $headers);
}



/*function exp_int_notreg($user_email,$name,$mobile,$project_url)
{
$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>



<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>";
$message .="User Name  : $name <br>";
$message .="User Email id  : $user_email <br>";
$message .="User Mobile Number  : $mobile <br>";
$message .="Project url  : $project_url <br><br><br>";							
$message .="
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

<p style='font-size:90%'><i>21flats is the easiest way to purchase properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address = "members@21Flats.com";
//echo $_SERVER['REQUEST_METHOD'];

mail($user_email,"User and Project Details.",$message, $headers,"-f $from_address");
			//mail($email,"Project Detail Has Been Send.",$message, $headers);

}
*/
function tellfriend($email,$fromuser,$project_id,$urlsend)
{         
   global $email_id;
			$sql_project="select * from projects where project_id='".$project_id."'";
			$Execut_project=mysql_query($sql_project) or die(mysql_error());
			$data=mysql_fetch_array($Execut_project);
			//mail data 
			$Fname=$_SESSION["userdata"]['user_name'];
			$project_tag_line=$data['project_tag_line'];
			
			$locality_id=$data['locality_id'];
			if($locality_id=="")
			{
			$location_name="";
			$city_name="";
			}else{
			
			$location_name=getname::locationname($locality_id);
			$city_name=getname::citynameFormail($locality_id);
			}
			$admin_user_id=$data['admin_user_id'];
			if($admin_user_id=="")
			{
			$conatct_person="";
			$conatct_mobile="";
			}else{
			$contact_person=getname::contact_personFormail($admin_user_id);
			$conatct_person_name=$contact_person['admin_user_name'];
			$conatct_mobile=$contact_person['phone_number'];
			}
			$type_per_square=$data['type_per_square'];
			if($type_per_square=='sf' )
				{
					$type_per_square_unit="Sq.Ft";
				}
				else 
				{
					$type_per_square_unit="Sq.Yd"; 
				}
			
			$current_rate_psf=$data['current_rate_psf'];
			$discounted_rate_psf=trim($data['discounted_rate_psf']);
			
			
			$total_amount=$data['total_amount'];
			$total_amount_discount=trim($data['total_amount_discount']);
						
		    $people_req=$data['people_req'];
			$bid_date= date('d-M-Y',strtotime($data['bid_date']));
			$project_desc=$data['project_desc'];
			$project_terms=$data['project_terms'];
            


	
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>

</font>
<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>



<tbody><tr>
<td align='center'>
<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>

<tbody><tr>
<td style='text-align:left;padding:0pt 20px' align='left'><div>
</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>";
$message .="<div style='width:550px; margin:auto; border:solid 1px #000; padding:8px; text-align:justify;'>
    	<div>Your friend $Fname has recommended your name for a real estate project on 21Flats.com - Be in group, Buy in group ( <a href='$urlsend' style='text-decoration:none; color:#333399'>Go to the project!</a> ).</div>
        <div style='clear:both; height:3px; line-height:3px;'>&nbsp;</div>
        <div>The project details are as follows:-</div>";
		if($data['project_ele']!=''){
         $message.="
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  <div style='margin:5px 0px 0px 20px; float: left;'><img src='http://www.21flats.com/intranet/project/project_doc/".$data['project_ele']."' height='90' width='150' style='border:solid 1px #F00;'></div>
		  <div style='color:#333399; float:right; vertical-align:bottom; padding-top:65px; padding-right:20px;'><strong><a href='$urlsend' style='text-decoration:none;'></a></strong></div>
		  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
	 	}
		else{
			$message.="
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
			  <div style='color:#333399; float:left; padding-top:5px; padding-left:20px;'><strong><a href='$urlsend' style='text-decoration:none;'></a></strong></div>
			  <div style='clear:both; height:0px; line-height:0px; font-size:0px;'>&nbsp;</div>
		  ";
			}
        
        $message.="<div style='background-color:#eef7fc; margin:20px; padding:5px;'>
        		<div style='color:#d31717;'><strong>$project_tag_line</strong></div>";
			if($current_rate_psf!='0')
			{
			
			
				$message.=" <div style='clear:both; height:3px; line-height:3px;'>&nbsp;</div>
				<div>
                	<div style='float:left; width:250px;'><strong>Market Price : $current_rate_psf/$type_per_square_unit</strong></div>";
				if(!empty($discounted_rate_psf))
				{
					$check_input=substr($discounted_rate_psf,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $discounted_rate_psf/$type_per_square_unit</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";
					}
				}
				
				
				
			}
			
			
			if($total_amount!='0')
			{
			
			
			
			$message.=" <div style='clear:both; height:3px; line-height:3px;'>&nbsp;</div>
				<div>
                	";
				if(!empty($total_amount_discount))
				{
					$check_input=substr($total_amount_discount,-1);
					if($check_input!="%")
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price : Rs. $total_amount_discount</strong></div>
                </div>";
					}
					else 
					{
						 $message.=" <div style='float:left; width:250px;'><strong>Best Offer Price</strong></div>
                </div>";
					}
				}
						
						
						
			}
        $message.="<div style='clear:both; height:3px; line-height:3px;'>&nbsp;</div>
        </div>
        <p style='color:#d31717;'><strong>Project Description</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_desc</div>
        <div style='clear:both; height:3px; line-height:3px;'>&nbsp;</div>
        <p style='color:#d31717;'><strong>Project Price & Terms</strong></p>
        <div style=' width:550px;  overflow:hidden'>$project_terms</div>
        <p>You can call 21Flats.com representative, <strong>$conatct_person_name</strong> at <strong>$conatct_mobile</strong> for any further queries.</p>
		
		 <div style='clear:both; height:3px; line-height:3px;'>&nbsp;</div>
        <p style='color:#333399;'><strong><a href='http://21flats.com/register.php?user_id=".base64_encode($fromuser)."' style='text-decoration:none;'>Click here for registration !</a></strong></p>
    </div>";

$message .="
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

<p style='font-size:90%'><i>21flats is the easiest way to purchase properties.</i></p>

<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>


</td></tr>

</tbody></table>



<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
</div>";
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
$headers .= "Content-Transfer-Encoding: 8bit\r\n";
$from_address =$fromuser;

mail($email,"Property Recommendation",$message, $headers,"-f $from_address");

}

 public function email_group_comm($email,$comm)
 {
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>
		
		</font>
		<table align='center'>
		<tr>
		<td></td>
		</tr>
		</table>
		<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
		
		
		<tbody><tr>
		<td align='center'>
		<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>
		
		<tbody><tr>
		<td style='text-align:left;padding:0pt 20px' align='left'><div>
		</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>
		
		<p>This is an automatically generated email, please do not reply. The purpose is to inform you about 21flats venue.<br><br> The following details are : <br><br>";
		$message .="Event Message: &nbsp; '".$comm."'<br><br><br>";
		$message .="<font color='#0000ff'></font><br><br>With safety being our primary concern, we request you to primarily fill your needs.
		
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
		
		<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>
		
		
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
		$from_address = "members@21Flats.com";
		//echo $message;
		
	   mail($email,"Group communication",$message, $headers,"-f $from_address");
			
		//mail($email,"Thanks for registering with us.",$message, $headers);			
				
		}
		// after assign group

 public function assgingrp($email,$grpname)
 {
		$message ="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>
		
		</font>
		<table align='center'>
		<tr>
		<td></td>
		</tr>
		</table>
		<table style='margin-top:20px;width:600px;border:1px solid rgb(204, 204, 204);padding:20px;background-color:rgb(208, 239, 249);color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
		
		
		<tbody><tr>
		<td align='center'>
		<table style='width:560px;border:1px solid rgb(204, 204, 204);background-color:rgb(255, 255, 255)' cellpadding='0' cellspacing='0'>
		
		<tbody><tr>
		<td style='text-align:left;padding:0pt 20px' align='left'><div>
		</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>
		
		<p>This email is auto genrated and purpose is to inform you, that you are now the member of <b>".$grpname."</b> group.<br><br><br><br>";
		
		$message .="<font color='#0000ff'></font><br><br>With safety being our primary concern, we request you to primarily fill your needs.
		
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
		
		<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>
		
		
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
		$from_address = "members@21Flats.com";
		//echo $message;
		
	     mail($email,"Group Assign",$message, $headers,"-f $from_address");
		// mail($email,"Thanks for registering with us.",$message, $headers);	
					
				
		}
public function send_news_letter($email)
{
		$sqlDropDown="select * from groups as gr left join projects as prj on gr.project_id=prj.project_id where prj.project_status='4' and gr.group_status='2' order by serial asc";
		$ExecuteQuery=mysql_query($sqlDropDown) or die(mysql_error());
		$record=mysql_num_rows($ExecuteQuery);
		$Fname=$_SESSION["userdata"]['user_name'];
		$message="<div style=margin:0px;font-family:'Lucida Sans Unicode','Lucida Grande','Verdana','Arial','sans-serif'><font size='3'><br>
		</font>
		<table align='center'>
		<tr>
		<td></td>
		</tr>
		</table>
		<table style='margin-top:20px;width:600px;padding:20px;color:#000000;line-height:130%;font-size:14px' align='center' border='0' cellpadding='0' cellspacing='0'>
		<tbody><tr>
		<td align='center'>
		<table style='width:560px;' cellpadding='0' cellspacing='0'>
		<tbody><tr>
		<td style='text-align:left;padding:0pt 20px' align='left'><div>
		</div><p></p><center><img src='http://21flats.com/images/s_logo.gif' alt='21FLATS' /></center><p></p><div>
		
		<p>
		<table width='684' cellpadding='2' cellspacing='2' border='0' align='center'>
		<tr><td>Your friend $Fname has recommended your name for 21Flats.com. ( <a href='http://www.21flats.com' style='text-decoration:none;'>www.21flats.com</a>)</td></tr>
		  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td style='background-color:#DA251C;
	height:31px; font-weight:bold;
	line-height:30px;
	font-size:14px;
	padding-left:15px;
	color:#FFFFFF;font-family:Verdana,Geneva,sans-serif;'>Live Property Deals</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>";


if($record > 0) {
				while($countDropDown=mysql_fetch_array($ExecuteQuery)) 
				{            
				//$project_desc=strip_tags($countDropDown['project_desc']);
				//$sub_project_desc=substr($project_desc,0,110);
				//$cityname=getname::citynameloc($countDropDown['locality_id']);
				
				$project_desc=strip_tags(trim($countDropDown['project_desc']));
				$sub_project_desc=substr($project_desc,0,150);
				$locname=getname::locationname($countDropDown['locality_id']);
				$locname_fnl=strtolower(str_replace(" ","_",$locname));
				$address=trim($countDropDown['address']);
				$area=trim($countDropDown['area']);
				$type=trim($countDropDown['type_per_square']); 
				if($type=='sf') {$type='Sq.Ft';}
				if($type=='sy') {$type='Sq.Yd';}
				$price=trim($countDropDown['current_rate_psf']);
				$bedroom=trim($countDropDown['bedroom']);
				if($price!='' && $type!='') { $separator_price='/';}
				if($address!='' && $locname!='') { $separator=', ';}
				$totalCost=trim($countDropDown['total_cost']); 
               
$message.="<tr>
    <td width='684' align='left'><table width='684' cellpadding='0' cellspacing='0' border='0' style='background-color:#F9F9F9; border:solid 2px #EDE7E7;'>
        <tr>
          <td align='left' width='100' style='padding:5px 5px 5px 5px;'>";
		if($countDropDown['project_ele']!=''){
         $message.="<img src='http://www.21flats.com/intranet/project/project_doc/".$countDropDown['project_ele']."' height='90' width='90' style='border:solid 1px #F00;'>";
	 }else{
        $message.="<img src='http://www.21flats.com/images/no_imaes.png'   height='90' width='90' style='border:solid 1px #F00;'/>";
		 
		 }
         
         
         $message.="</td><td align='left' width='600'><table border='0'>
              <tr>
                <td  style='font-size:14px; font-weight:bold; color:#da251c; padding:2px 15px 0px 15px; text-align:left; font-family:Verdana,Geneva,sans-serif;'>";
				$message.="<a href='http://www.21flats.com/property/".$countDropDown['project_id']."/".$countDropDown['group_id']."/".strtolower(str_replace(" ","_",$locname))."/".strtolower(str_replace(" ","_",str_replace("%","_",$countDropDown['project_tag_line']))).".html' style='color:#da251c; text-decoration:none;'>".$countDropDown['project_tag_line']."</a>";
				$message.="</td>
              </tr>
			  <tr>
                <td style='font-size:11px; padding-top:2px; text-align:left; padding-left:15px;font-family:Verdana,Geneva,sans-serif;'>".$locname."</td>
              </tr>
			  <tr>
			  	<td>";
                        $message.="<div style='color:#000; font-size:12px; padding-left:15px;'>Area : ". $area;  
			$message.="</td>
			  </tr>
			  <tr>
			  	<td>";
                        $message.="<div style='color:#000; font-size:12px; padding-left:15px;'>Price : ". $price;  
			$message.="</td>
			  </tr>
			  <tr>
			  	<td>";
                        $message.="<div style='color:#000; font-size:12px; padding-left:15px;'>Bedroom : ". $bedroom;  
			$message.="</td>
			  </tr>
			  <tr>
			  	<td>";
                        $message.="<div style='color:#000; font-size:12px; padding-left:15px;'> ". $sub_project_desc;  
			$message.=" ...<a href='http://www.21flats.com/property/".$countDropDown['project_id']."/".$countDropDown['group_id']."/".strtolower(str_replace(" ","_",$locname))."/".strtolower(str_replace(" ","_",str_replace("%","_",$countDropDown['project_tag_line']))).".html' style='color:#da251c; text-decoration:none;'>Read More</a></td>
			  </tr>
            </table></td>
        </tr>";
      
      $message.=" <tr><td height='5' colspan='3'>&nbsp;</td></tr>
	 
  </table>
</td>
  </tr>
  <tr>
    <td height='5' colspan='3'>&nbsp;</td>
  </tr>
      </table></td>
  </tr>";
  } }else{
 $message.="<tr>
    <td>There is no news letter</td>
  </tr>";
   }
$message.="</table></p>
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
		
		<p style='font-size:90%'><i>This E-mail was sent by 21flats Team.</i></p>
		
		
		</td></tr>
		
		</tbody></table>
		
		
		
		<font color='#000000'><span style='line-height:130%;font-size:14px'><img></span></font>
		</div>";
//echo $message;
        $headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/HTML; charset=utf-8\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
		$from_address = "members@21Flats.com";
		//echo $message;
		
	   mail($email,"21flats News Letter.",$message, $headers,"-f $from_address");
	  }

public function generateRandStr($length){ 
      $randstr = ""; 
      for($i=0; $i<$length; $i++){ 
         $randnum = mt_rand(0,61); 
         if($randnum < 10){ 
            $randstr .= chr($randnum+48); 
         }else if($randnum < 36){ 
            $randstr .= chr($randnum+55); 
         }else{ 
            $randstr .= chr($randnum+61); 
         } 
      } 
      return $randstr; 
	} 
	
	public function sendMailUserToAdmin($name, $mobile, $message1, $prj_name, $location)
   {            
		$message .="Name of interested person : ".$name." , ";
		$message .="Mobile no. : ".$mobile." , ";
		$message .="Message : ".$message1." , ";
		$message .="Project Name : ".$prj_name." , ";
		$message .="Location  : ".$location.".";
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "ent-Type: text/HTML; charset=utf-8\r\n";
		$headers .= "ent-Transfer-Encoding: 8bit\r\n";
		$from_address = "members@21Flats.com";
		mail('deepak@21flats.com',"21Flats : Member is Interested to Buy Flat.",$message, $headers,"-f $from_address");
		mail('abhimanyu@21flats.com',"21Flats : Member is Interested to Buy Flat.",$message, $headers,"-f $from_address");
    }

		
}
	 
?>
