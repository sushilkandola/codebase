<?php  
error_reporting(E_ALL ^ E_NOTICE);
class MySQL
{
var $_hostname;
var $_username;
var $_password;
var $_database;var $_resultType;    // 1-array , 2-object, 0-row
var $_link;
var $_query;
var $_result;
var $_errorstr;
var $_success;

function MySQL($hostname="", $username="", $password="", $database="",$return_result_type=1) {


   $this->_hostname = "localhost";
   $this->_username = "root";
   $this->_password = "bluepi";
   $this->_database = "portal";

   if($return_result_type < 0 || $return_result_type > 2 )
	  $this->_resultType = 1;

   else
	  $this->_resultType = $return_result_type;
   $this->_success = false;
 // connect to database
	if ( ! MySQL::connectDB() )
	{	
     echo $dbcon->show_error();
	
     exit;
	}	
}

function destroy() {
   unset($this->_hostname);
   unset($this->_username);
   unset($this->_password);
   unset($this->_database);
   unset($this->_link);
   unset($this->_resultType);
   unset($this->_query);
   unset($this->_result);
   unset($this->_errorstr);
   unset($this->_success);
}


function connectDB() {
   $ret = true;
   $this->_link = @mysql_connect( $this->_hostname, $this->_username, $this->_password);
  
   if( ! $this->_link ) {
	   $this->_errorstr = "Couldn't connect to database server :".mysql_error($this->_link) ;
	   $ret = false;
   }
   else
   {
	   if(!empty($this->_database)){
		  if( ! mysql_select_db($this->_database, $this->_link) ) {
			   
			 $this->_errorstr = "Couldn't connect database: ".$this->_database." My-SQL Error ".mysql_error($this->_link);
			 $ret = false;
		  }
	   }
   }
   return $ret;
}

function changeDatabase($dbname="")
{
  $ret = true;
  if(!empty($dbname)){
	 if( ! mysql_select_db($dbname, $this->_link) ) {
		 $this->_errorstr = "Couldn't change database: ".$this->_database." My-SQL Error ".mysql_error($this->_link);
		 $ret = false;
	 }
	 else
	   $this->_database = $dbname;
  }
  return $ret;
}

function changeReturnResultType($return_result_type=1)
{
  if($return_result_type < 0 || $return_result_type > 2 )
	  $this->_resultType = 1;
   else
	  $this->_resultType = $return_result_type;
}

function changeUser( $user="", $passwd="", $database="" )
{
  if(@mysql_change_user($user,$passwd,$database,$this->_link)){
	 $this->_username = $user;
	 $this->_password = $passwd;
	 $this->_database = $database;
	 return true;
  }
  else
	 return false;
}

function getActiveUser()
{
  return $this->_username;
}

function getActiveDatabase()
{
  return $this->_database;
}

function showLastQuery()
{
  echo "<BR>Last Executed Query = ".$this->_query;
  echo "<BR>Execution Status = ".$this->_success."<BR>";
  
}

function show_error(){
		  echo $this->_errorstr;
}

function disconnectDB() {
   if($this->_link)
	   @mysql_close( $this->_link );
}

function execute_query( $query )
{
	
   if(!empty($this->_database)){
	  if(!mysql_select_db($this->_database, $this->_link) ) {
		 $this->_errorstr = "Couldn't change database: ".$this->_database." My-SQL Error ".mysql_error($this->_link);
	  }
   }
   $this->_errorstr = "";
   $this->_query = $query;
   $this->_result = mysql_query( $this->_query, $this->_link );
   if ( ! $this->_result )
   {
		$this->_errorstr = "Error : ".mysql_error( $this->_link );
		$this->_success = false;
   }
   else
   {
	   $this->_success = true;
	   $this->_query = trim("$this->_query");
	   $temp=explode(" ","$this->_query");
	  /* if($temp[0]=="delete" || $temp[0]=="Delete")
	   {
	   		$this->logEvent("delete");
	   }*/
   }
   return $this->_success;
}

 // for insertion
function insert_query($tblName,$queryArr)
{
	if(!empty($this->_database)){
	  if(!mysql_select_db($this->_database, $this->_link) ) {
		 $this->_errorstr = "Couldn't change database: ".$this->_database." My-SQL Error ".mysql_error($this->_link);
	  }
   }
	$fields= array_keys($queryArr);
	$values=array_values($queryArr);

	$values2="";
	for($i=0;$i<count($values);$i++)
	{
		#$values2=trim($values2);


		$values2.="'".addslashes(trim($values[$i]))."',";
	}
	$fields2=implode(",",$fields);
	$values2=substr($values2,0,-1);
	$query="insert into $tblName ($fields2) values ($values2)";
	 
//echo  $query."<br>";
	//die();
	
   $this->_errorstr = "";
   $this->_query = $query;

	//echo $query;
	
  $this->_result = mysql_query( $this->_query, $this->_link );


   if ( ! $this->_result )
   {
		$this->_errorstr = "Error : ".mysql_error( $this->_link );
		$this->_success = false;
   }
   else
   {
	   $this->_success = true;
   	   //$this->logEvent("insert");
   }
   return $this->_success;
}

function insert_query_simple($tblName,$queryArr)
{
	if(!empty($this->_database)){
	  if(!mysql_select_db($this->_database, $this->_link) ) {
		 $this->_errorstr = "Couldn't change database: ".$this->_database." My-SQL Error ".mysql_error($this->_link);
	  }
   }
	$fields= array_keys($queryArr);
	$values=array_values($queryArr);

	$values2="";
	for($i=0;$i<count($values);$i++)
	{
		$values2.="'".addslashes($values[$i])."',";
	}
	$fields2=implode(",",$fields);
	$values2=substr($values2,0,-1);
	$query="insert into $tblName ($fields2) values ($values2)";
   $this->_errorstr = "";
   $this->_query = $query;
   $this->_result = mysql_query( $this->_query, $this->_link );
   if ( ! $this->_result )
   {
		$this->_errorstr = "Error : ".mysql_error( $this->_link );
		$this->_success = false;
   }
   else
	   $this->_success = true;
   return $this->_success;
}

function logEvent($activity){
	//global $_SERVER;
	global $dbcon, $GLOBAL_USER_INFO;
	$dt=date("y-m-d H:i:s");
	$arr=array("iLoginid"=>$GLOBAL_USER_INFO['iLoginid'],
	"sLogIP"=> $_SERVER['REMOTE_ADDR'],
	"sLogBrowser"=>$_SERVER["HTTP_USER_AGENT"], 
	"sLogOS"=>$_SERVER["HTTP_USER_AGENT"], 
	"dLogDateTime"=>$dt, 
	"sActivity"=>$activity, 
	"sPageName"=>$_SERVER["PHP_SELF"], 
	"sPageURL"=>$_SERVER["PHP_SELF"]);
	$table="tblLog";
	return $this->insert_query_simple($table,$arr);
}

// for updation
function update_query($tblName,$queryArr,$condition)
{
	if(!empty($this->_database)){
	  if(!mysql_select_db($this->_database, $this->_link) ) {
		 $this->_errorstr = "Couldn't change database: ".$this->_database." My-SQL Error ".mysql_error($this->_link);
	  }
   }
	$fields=@array_keys($queryArr);
	$values=@array_values($queryArr);
	$update="";
	for($i=0;$i<count($values);$i++)
	{
		$update.="$fields[$i]='".addslashes($values[$i])."',";
	}
	$update=substr($update,0,-1);
	  $query="update $tblName set $update $condition";
	 
	
//echo  $query."<br>";
//die;
   $this->_errorstr = "";
   $this->_query = $query;
   $this->_result = mysql_query( $this->_query, $this->_link );
   if ( ! $this->_result )
   {
		$this->_errorstr = "Error : ".mysql_error( $this->_link );
		$this->_success = false;
   }
   else
   {
	   $this->_success = true;
	 
   }
   return $this->_success;
}

function inserted_id()
{
   return @mysql_insert_id($this->_link);
}
function affected_rows()
{
   return @mysql_affected_rows($this->_link);
}
function free_result()
{
	   @mysql_free_result( $this->_result );
}

function fetch_records()
{
   $records = false;
   if( $this->count_records() != 0 )
   {
	  if($this->_resultType == 2){
		while ( $rec = mysql_fetch_object( $this->_result ) )
		{
			   $records[] = $rec;
		}
	  }
	  elseif($this->_resultType == 1 ){
		while ( $rec = mysql_fetch_array( $this->_result ) )
		{
			   $records[] = $rec;
		}
	  }
	  elseif($this->_resultType == 0 ){
		while ( $rec = mysql_fetch_row( $this->_result ) )
		{
			   $records[] = $rec;
		}
	  }
   }
   else
	   $this->_errorstr = "Error: Empty Result Set ";
   unset( $rec );
   return $records;
}

function fetch_one_record()
{
   $records = false;
   if( $this->count_records() > 0 ){
		if($this->_resultType == 2 )
		   $records =  mysql_fetch_object( $this->_result );
		elseif($this->_resultType == 1 )
		   $records =  mysql_fetch_array( $this->_result );
		elseif($this->_resultType == 0 )
		   $records =  mysql_fetch_row( $this->_result );
   }
   else
	   $this->_errorstr = "Error: Empty Result Set ";
   return $records;
}

function count_records()
{
   if( $this->_result )
	   return @mysql_num_rows( $this->_result );
   else
	   return 0;
}

function table_fields_length($tableName){
	$query = "SELECT * FROM $tableName";
	$this->_errorstr = "";
   	$this->_query = $query;
   	$this->_result = mysql_query( $this->_query, $this->_link );
   	if ( ! $this->_result ){
		$this->_errorstr = "Error : ".mysql_error( $this->_link );
		$this->_success = false;
		return $this->_success;
    }
   else
	   $this->_success = true;
	// store the names and max lengths of the fields in array
	for ($offset = 0; $offset < mysql_num_fields ($this->_result); ++$offset) {
   		$key=mysql_field_name ($this->_result, $offset);
   		$arr[$key] =  mysql_field_len ($this->_result, $offset);
	}
	return $arr;
}

function objectDestroy() {
if( $this->count_records() !=0 )
  $this->free_result();
  $this->disconnectDB();
  $this->destroy();
}



function update_id_table($ID){
	$nextId=$ID+1;
	$qArr=array("iLoginid" => $nextId);
	$this->update_query("tblUserLoginid",$qArr,"where iLoginid=$ID");
	return true;
}


}

// Class Ends
/*
$_GLOBALS['db'];
$db = new MySQL($dbconfig['host'], $dbconfig['user'], $dbconfig['pass'], $dbconfig['dbname']);
$_GLOBALS['db'];
*/

////////////////////////////////////////////////////////////////////////////////
?>
