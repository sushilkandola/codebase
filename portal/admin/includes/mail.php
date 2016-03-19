<?php
function forgot_password_mail($email, $password) {
	$message = "
		<table cellspacing='5' cellpadding='5' border='0' width='100%' style='border: solid 4px #ccc; background-color:#f0f0f0;'>
			<tr><td colspan='2'><br/>Dear User,<br/><br/>Your password details are mentioned below. Please keep secure your password details and do not share with anybody.</td></tr>
			<tr>
				<td>Email ID: </td>
				<td>$email</td>
			</tr>
			<tr>
				<td>New Password: </td>
				<td>$password</td>
			</tr>
			<tr><td colspan='2'><br/><br/>Thank You!</td></tr>
		</table>
	";
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: HeyGetMeaJob Team <info@heygetmeajob.com>' . "\r\n";
	$subject = 'Forgot Password Mail.';

	mail($email, $subject, $message, $headers);
}

function registration_mail($email, $password, $mobile, $type) {
	$message = "
		<table cellspacing='5' cellpadding='5' border='0' width='100%' style='border: solid 4px #ccc; background-color:#f0f0f0;'>
			<tr><td colspan='2'><br/>Dear User,<br/><br/>Thanks for the registration.  Please keep secure your password details and do not share with anybody. <br/> <br/> Your Personal details are as mentioned below: </td></tr>
			<tr>
				<td>Email ID: </td>
				<td>$email</td>
			</tr>
			<tr>
				<td>Password: </td>
				<td>$password</td>
			</tr>
			<tr>
				<td>Mobile: </td>
				<td>$mobile</td>
			</tr>
			<tr>
				<td>Account Type: </td>
				<td>$type</td>
			</tr>
			<tr><td colspan='2'><br/><br/>Thank You!</td></tr>
		</table>
	";
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: HeyGetMeaJob Team <info@heygetmeajob.com>' . "\r\n";
	$subject = 'Thank you for registration with www.heygetmeajob.com.';

	mail($email, $subject, $message, $headers);
}

function job_posted_mail($email, $emp_email, $job_title, $city) {
	$message = "
		<table cellspacing='5' cellpadding='5' border='0' width='100%' style='border: solid 4px #ccc; background-color:#f0f0f0;'>
			<tr><td colspan='2'><br/>Dear Administrator, <br/><br/>New job has been posted as following:</td></tr>
			<tr>
				<td>Employer Emails: </td>
				<td>$emp_email</td>
			</tr>
			<tr>
				<td>Job Title: </td>
				<td>$job_title</td>
			</tr>
			<tr>
				<td>City: </td>
				<td>$city</td>
			</tr>
			<tr><td colspan='2'><br/><br/>Thank You!</td></tr>
		</table>
	";
	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: HeyGetMeaJob Team <info@heygetmeajob.com>' . "\r\n";
	$subject = 'New Job posted by Employer';

	mail($email, $subject, $message, $headers);
}
?>
