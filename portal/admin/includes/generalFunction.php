<?php

function substr_words ($paragraph, $num_words) {
  $paragraph = explode (' ', $paragraph);
  $paragraph = array_slice ($paragraph, 0, $num_words);
  return implode (' ', $paragraph);
}
function redirectPage($url) {

		echo '<SCRIPT language="JavaScript">window.location="'.$url.'";</SCRIPT>';
		return true;
	
}
function current_user()
{
	$db =  new MySQL();
	$user_id=$_SESSION['userdata']['user_id'];
	$qry_curr="select user_name from members where user_id='$user_id'";
	$qry_curr_exe=mysql_query($qry_curr);
	$i=mysql_fetch_array($qry_curr_exe);
	$user_name=$i['user_name'];
	return $user_name;
}

function get_user($uid) {
	$qry = "select uid, fullname, emailid, utype from users where uid='$uid'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch;
	return $return;
}
function user_info($uid, $table) {
	$qry = "select * from $table where uid='$uid'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch;
	return $return;
}

function return_country($cid)
{
	$qry = "select id, country from country where 1";
	$get = mysql_query($qry);
	echo "<option value=''>Select Country</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($cid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['country']."</option>";
	}
}

function return_country_name($id)
{
	$qry = "select country from country where id='$id'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['country'];
	return $return;
}

function return_state($sid)
{
	$qry = "select id, state from state where 1";
	$get = mysql_query($qry);
	echo "<option value=''>Select State</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($sid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['state']."</option>";
	}
}

function return_state_name($id)
{
	$qry = "select state from state where id='$id'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['state'];
	return $return;
}

function return_city($cid)
{
	$qry = "select id, city_name from city where 1";
	$get = mysql_query($qry);
	echo "<option value=''>Select City</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($cid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['city_name']."</option>";
	}
}

function return_city_name($id)
{
	$qry = "select city_name from city where id='$id'"; 
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['city_name'];
	return $return;
}

function return_category($cid, $pid=false)
{
	
	if($pid==false) {
		$qry = "select id, cname from category where pid=0"; 
	} else {
		$qry = "select id, cname from category where pid=$pid"; 
	}
	$get = mysql_query($qry);
	echo "<option value=''>-- None --</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($cid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['cname']."</option>";
	}
}

function return_category_name($id)
{
	$qry = "select cname from category where id='$id'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['cname'];
	return $return;
}

function return_qualification($qid)
{
	$qry = "select id, qname from qualification where 1";
	$get = mysql_query($qry);
	echo "<option value=''>Please Select</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($qid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['qname']."</option>";
	}
}

function return_qualification_name($id)
{
	$qry = "select qname from qualification where id='$id'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['qname'];
	return $return;
}

function return_specialization($sid)
{
	$qry = "select id, sname from specialization where 1";
	$get = mysql_query($qry);
	echo "<option value=''>Please Select</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($sid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['sname']."</option>";
	}
}

function return_specialization_name($id)
{
	$qry = "select sname from specialization where id='$id'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['sname'];
	return $return;
}

function return_industry($qid)
{
	$qry = "select id, iname from industry where 1";
	$get = mysql_query($qry);
	echo "<option value=''>Please Select</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($qid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['iname']."</option>";
	}
}

function return_industry_name($id)
{
	$qry = "select iname from industry where id='$id'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['iname'];
	return $return;
}

function return_functionalarea($fid)
{
	$qry = "select id, fname from functionalarea where 1";
	$get = mysql_query($qry);
	echo "<option value=''>Please Select</option>";
	while($fetch = mysql_fetch_array($get))
	{
		$id = $fetch['id'];
		if($fid==$id) { $selected='selected';} else {$selected='';}
		echo "<option value='$id' $selected>" . $fetch['fname']."</option>";
	}
}

function return_functionalarea_name($id)
{
	$qry = "select fname from functionalarea where id='$id'";
	$get = mysql_query($qry);
	$fetch = mysql_fetch_array($get);
	$return = $fetch['fname'];
	return $return;
}

?>