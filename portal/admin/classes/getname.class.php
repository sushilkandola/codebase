<?php
Class getname
{
	public function flatname($ID)
	{
		$sectionQuery="select flat_name from flat_size_type where flat_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr1:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['flat_name'];
		return $name;
	}
	
	public function locationname($ID)
	{
		$sectionQuery="select locality_name from locality where locality_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("erorr location2:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['locality_name'];
		return $name;
	}
	public function buget($ID)
	{
		$sectionQuery="select budget_master_name from budget_master where budget_master_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr3:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['budget_master_name'];
		return $name;
	}
	
	
	public function profession_name($ID)
	{
		$sectionQuery="select pname from profession where id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr4:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['pname'];
		return $name;
	}
	
	
	public function cityname($ID)
	{
		$sectionQuery="select city_name from city where id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr5:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['city_name'];
		return $name;
	}
	
	public function citynameFormail($ID)
	{
		$sectionQuery="select city_id from locality where locality_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("erorr location2:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$city_id=$res1['city_id'];
		$sectionQuery_city="select city_name from city where city_id=$city_id";
		$execQuery_city=mysql_query($sectionQuery_city) or die("errorrrrrrrrrrr5:".mysql_error());
		$res1=mysql_fetch_array($execQuery_city);
		$name=$res1['city_name'];
		return $name;
	}
	
	public function builder_profile_path($ID)
	{
		$sectionQuery="select builder_file_path from builder_file where builder_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr6:".mysql_error());
		$res2=mysql_fetch_array($execQuery);
		$name1=$res2['builder_file_path'];
		return $name1;
	}
	public function builder_agreement_file($ID)
	{
		$sectionQuery="select builder_agreement_file from builder_file where builder_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr7:".mysql_error());
		$res2=mysql_fetch_array($execQuery);
		$name1=$res2['builder_agreement_file'];
		return $name1;
	}
	public function project_map($ID)
	{
		$sectionQuery="select project_map from project_file where project_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr8:".mysql_error());
		$res2=mysql_fetch_array($execQuery);
		$name1=$res2['project_map'];
		return $name1;
	}
	public function project_spc($ID)
	{
		$sectionQuery="select project_spec from project_file where project_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr9:".mysql_error());
		$res2=mysql_fetch_array($execQuery);
		$name1=$res2['project_spec'];
		return $name1;
	}
	
	
	
	public function username($ID)
	{
		$sectionQuery="select user_name from members where user_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr10:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['user_name'];
		return $name;
	}
	
	
	public function username_email($ID)
	{
		$sectionQuery="select email_id from members where user_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr10:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['email_id'];
		return $name;
	}
	
	public function username_phone($ID)
	{
		$sectionQuery="select phone_number from members where user_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr10:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['phone_number'];
		return $name;
	}
	
	
	public function contact_person($ID)
	{
		$sectionQuery="select * from admin_user where admin_user_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("erorr person:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name.="<p> <strong style='width:200px; color:#DA251C;'>Contact Person : </strong>".$res1['admin_user_name']."<br />
							<strong style='width:400px; color:#DA251C;'>Contact Email : </strong><span  class='mail_to'><a href=mailto:".$res1['email_id'].">".$res1['email_id']."</a></span><br />
							<strong style='width:200px; color:#DA251C;'>Contact Number : </strong>".$res1['phone_number']."<br />
						  </p>";
		
		return $name;
	}
	
	
	public function contact_person_data($ID)
	{
		$sectionQuery="select * from admin_user where admin_user_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("erorr person:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$contact_person['admin_user_name']=$res1['admin_user_name'];
		$contact_person['email_id']=$res1['email_id'];
		$contact_person['phone_number']=$res1['phone_number'];
		return $contact_person;
	}
	
	
	public function contact_personFormail($ID)
	{
		$sectionQuery="select * from admin_user where admin_user_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("erorr person:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$contact_person['admin_user_name']=$res1['admin_user_name'];
		$contact_person['phone_number']=$res1['phone_number'];
		
		return $contact_person;
	}
	
	public function project_detail($ID)
	{
		$sectionQuery="select * from projects where project_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr11:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name="<table><tr><td>Project Name=".$res1['project_name']."</td></tr>";
		$name.="<tr><td>Project Detail=".$res1['project_desc']."</td></tr>";
		$name.="<tr><td>Member Required=".$res1['people_req']."</td></tr>";
		$name.="<tr><td>Bid Date=".$res1['bid_date']."</td></tr></table>";
		return $name;
	}
	
	
	
	public function projectname($ID)
	{
		$sectionQuery="select project_name from projects where project_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr12:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['project_name'];
		return $name;
	}
	public function projectname_from_group($ID)
	{   $sql_group="select * from groups where group_id=$ID";
		 $exe_group=mysql_query($sql_group) or die(mysql_error());
		 $result_group=mysql_fetch_array($exe_group);
		 $project_id=$result_group['project_id'];
		$sectionQuery="select project_name from projects where project_id=$project_id";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr12:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['project_name'];
		return $name;
	}
	public function statusname($ID)
	{
		$sectionQuery="select status_name from status where status_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr13:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['status_name'];
		return $name;
	}
	
	
	public function groupname($ID)
	{
		$sectionQuery="select group_name from groups where group_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("erorr Group14:".mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['group_name'];
		return $name;
	}
	
	public function groupmem($ID)
	{
	$sectionQuery="select user_id from member_group where group_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("erorr mem15:".mysql_error());
		//$res1=mysql_fetch_array($execQuery);
		$name=mysql_num_rows($execQuery);
		return $name;
	}
	
	
	public function peoplebought($ID)
	{   
		echo $sectionQuery="select * from groups where project_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr16:".mysql_error());
		$group_id=mysql_fetch_array($execQuery);
		echo $sectionQuery="select * from member_group where mem_status='5' and group_id='".$group_id['group_id']."'";
		$execQuery=mysql_query($sectionQuery) or die("errorrrrrrrrrrr17:".mysql_error());
		//$res1=mysql_fetch_array($execQuery);
		$peoplebought=mysql_num_rows($execQuery);
		return $peoplebought;
	}
	
	public function mem_name($ID)
	{     
			$groupQuery="select user_id from  member_group where group_id=$ID";
			$execGroupQuery=mysql_query($groupQuery) or die("errorrrrrrrrrrr18:".mysql_error());
			while($dispaly=mysql_fetch_array($execGroupQuery))
			{
			$memberQuery="select user_name from  members where user_id='".$dispaly['user_id']."'";
			$execMemberQuery=mysql_query($memberQuery) or die("errorrrrrrrrrrr19:".mysql_error());
			$resMemberEmail=mysql_fetch_array($execMemberQuery);
			$name=$resMemberEmail['user_name'];
			}
		
		return $name;
	}
	
	function mem_full_info($ID)
	{	
			$groupQuery="select user_id from  member_group where group_id=$ID";
			$execGroupQuery=mysql_query($groupQuery) or die("errorrrrrrrrrrr18:".mysql_error());
			while($dispaly=mysql_fetch_array($execGroupQuery))
			{
			$memberQuery="select * from  members where user_id='".$dispaly['user_id']."'";
			$execMemberQuery=mysql_query($memberQuery) or die("errorrrrrrrrrrr19:".mysql_error());
			$resMemberEmail=mysql_fetch_array($execMemberQuery);
			$member['user_name'] = $resMemberEmail['user_name'];
			$member['email_id'] = $resMemberEmail['email_id'];
			$member['phone_number'] = $resMemberEmail['phone_number'];
			
			}
		
		
		return $member;
	}
	
	
	function tell_mem_full_info($ID)
	{	
		  
			$memberQuery="select * from  members where email_id='".$ID."'";
			$execMemberQuery=mysql_query($memberQuery) or die("email_id not found:".mysql_error());
			$resMemberEmail=mysql_fetch_array($execMemberQuery);
			$member['user_name'] = $resMemberEmail['user_name'];
			$member['email_id'] = $resMemberEmail['email_id'];
			$member['phone_number'] = $resMemberEmail['phone_number'];
		
		return $member;
	}
	function tell_mem_full_info_user_id($ID)
	{	
		  
			$memberQuery="select * from  members where user_id='".$ID."'";
			$execMemberQuery=mysql_query($memberQuery) or die("user_id not found:".mysql_error());
			$resMemberEmail=mysql_fetch_array($execMemberQuery);
			$member['user_name'] = $resMemberEmail['user_name'];
			$member['email_id'] = $resMemberEmail['email_id'];
			$member['phone_number'] = $resMemberEmail['phone_number'];
		
		return $member;
	}
	
	public function emailid($ID)
	{     
		   $groupQuery="select user_id from  member_group where group_id=$ID";
			$execGroupQuery=mysql_query($groupQuery) or die("errorrrrrrrrrrr20:".mysql_error());
			while($dispaly=mysql_fetch_array($execGroupQuery))
			{
			$memberQuery="select email_id from  members where user_id='".$dispaly['user_id']."'";
			$execMemberQuery=mysql_query($memberQuery) or die("errorrrrrrrrrrr21:".mysql_error());
			 $resMemberEmail=mysql_fetch_array($execMemberQuery);
			$name.=$resMemberEmail['email_id'].',';
			
			}
		
		return $name;
	}
	
	
	public function citynameloc($ID)
	{
		$sectionQuery="select locality.city_id,city.city_id,city.city_name from locality left join city on city.city_id=locality.city_id where locality.locality_id=$ID";
		$execQuery=mysql_query($sectionQuery) or die(mysql_error());
		$res1=mysql_fetch_array($execQuery);
		$name=$res1['city_name'];
		return $name;
	}
	
	function get_latlong($address,$location,$zipcode)
	{
		$address=str_replace(' ','+',$address);
		$location=str_replace(' ','+',$location);
		//$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=Huda+City+Center,+gurgaon,+Haryana,+India&sensor=false');
		$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address="'.$address.'",+"'.$location.'","'.$zipcode.'",&sensor=false');
		$output= json_decode($geocode);
		
		$lat = $output->results[0]->geometry->location->lat;
		
		$long = $output->results[0]->geometry->location->lng;
		return array('lat'=>$lat, 'lon'=>$long);
		
	}
	
	function get_meatTags($page_name)
	{
		if($page_name=='')
		{
			$sel="select * from  page_list where page_name='index'";
			$exe =mysql_query($sel) or die("Page not found:".mysql_error());
			$fet=mysql_fetch_array($exe);
			return($fet);
		}	
		else
		{
			$sel="select * from  page_list where page_name='$page_name'";
			$exe =mysql_query($sel) or die("Page not found:".mysql_error());
			$fet=mysql_fetch_array($exe);
			return($fet);
		}
	}
	
	function CalculateTotalAmount($totalCost)
	{
		//$area=explode('-',$area);
		//if(!is_numeric($price)) return false;
		//$totalCost=str_replace(",","",$price) * str_replace(",","",$area['0']);
		//$totalCost = (0+str_replace(",","",$totalCost));
		if(!is_numeric($totalCost)) return false;
		///if($n>100000000) return round(($n/100000000),1).' Tr';
		if($totalCost>10000000) return round(($totalCost/10000000),2).' Cr';
		else if($totalCost>10000) return round(($totalCost/100000),2).' Lac';
		else if($totalCost>1000) return round(($totalCost/1000),2).' Thousand';
		$totalCost=number_format($totalCost);
		return($totalCost);
	}
}
?>