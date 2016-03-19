<?php
function checkIfRecordExist($table, $column, $col1=false, $val1=false,  $col2=false,  $val2=false) {
	$sel = "select $column from $table";
	if($col1 && $val1) {
		 $sel .=" where $col1='$val1' ";
	}
	if($col2 && $val2) {
		 $sel .=" and $col2='$val2' ";
	}
	$exe = mysql_query($sel);
	$count = mysql_num_rows($exe); 
	return $count ;
}

function getSingleRecord($table, $column, $col1=false, $val1=false,  $col2=false,  $val2=false) {
	$sel = "select $column from $table";
	if($col1 && $val1) {
		 $sel .=" where $col1='$val1' ";
	}
	if($col2 && $val2) {
		 $sel .=" and $col2='$val2' ";
	}
	$exe = mysql_query($sel);
	$arrray = mysql_fetch_array($exe); 
	return $arrray ;
}


function sendMail($to,$subject,$message)
{ 
	$from=$from?$from:"support@heygetmeajob.com";
	$from_name=$from_name?$from_name:"Support Team";
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers.="From: ".$from_name."<".$from."> .\n";
	$headers.="Reply-To: $from \n";//echo $to;echo "-f" .$from;
	$body  = "
		<div style='width:600px; padding:10px; margin:auto; font-size:14px; color:#000; background-color:#f0f0f0; border:solid 2px #ccc; line-height:25px;'>
			$message
			<p><br/><strong>With Regsrds:-</strong></p>
			<p>HeyGetMeaJob Team</p>
		</div>	
	"; 
	//echo $body; die;
	$sent = @mail($to,$subject,$body,$headers);
}

?>