<?php
class SiteManager
{
	function checkIfExists($tblname,$field,$val)
	{
	  global $dbcon;
 	  $dbcon->execute_query("select * from $tblname where $field='$val'");
      $res=$dbcon->fetch_one_record();
	  if($res)
	   {
		  return true;
	   }
	   else
	   {
	      return false;
	   }
	}
	
	function checkInGroup($tblname,$field,$val,$groupId)
	{
	  global $dbcon;
 	  $dbcon->execute_query("select * from $tblname where $field='$val' and groupId = '$groupId'");
      $res=$dbcon->fetch_one_record();
	  if($res)
	   {
		  return true;
	   }
	   else
	   {
	      return false;
	   }
	}
}