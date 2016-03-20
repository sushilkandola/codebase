<?php
/*
develop by durg vijay singh
*/
class Pager {
	
/***********************************************************************************
* int findStart (int limit)
* Returns the start offset based on $_GET['page'] and $limit
***********************************************************************************/
function pageSize($size) 
{
	if(!empty($size)) 
	{
		return $size;
	}else{
		return 10;
	}	
}

function findStart($limit) {
	if ((!isset($_GET['page'])) || ($_GET['page'] == "1")) 	{
		
		$start = 0;
		$_GET['page'] = 1;
	}
	else {
		
		$start = ($_GET['page']-1) * $limit;
	}
	
	return $start;
}
/***********************************************************************************
* int findPages (int count, int limit)
* Returns the number of pages needed based on a count and a limit
***********************************************************************************/
function findPages($count, $limit) {
		
		$pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;

		return $pages;
}
/***********************************************************************************
* string pageList (int curpage, int pages)
* Returns a list of pages in the format of "« < [pages] > »"
***********************************************************************************/
function pageList($curpage, $pages,$pagesize,$queryString=false) 
{
$page_list = "";
if (($curpage-1) > 0) 
{
	$page_list .= "<a href=\"".parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)."?page=".($curpage-1)."&".$queryString."&pagesize=".$pagesize."\" title=\"Previous Page\">Previous</a>&nbsp; ";
}
/* Print the numeric page list; make the current page unlinked and bold */
for ($i=1; $i<=$pages; $i++) 
{
	if ($i == $curpage) 
	{
	 $page_list .= "<b>".$i."</b>";
	}
	else 
	{
	$page_list .= "<a href=\"".parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)."?page=".$i."&".$queryString."&pagesize=".$pagesize."\" title=\"Page ".$i."\">".$i."</a>";
    }
	$page_list .= " ";
}

/* Print the Next and Last page links if necessary */
	if (($curpage+1) <= $pages) {
		
		$page_list .= "&nbsp;<a href=\"".parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH)."?page=".($curpage+1)."&".$queryString."&pagesize=".$pagesize."\" title=\"Next Page\">Next</a> ";
	}
/*
if (($curpage != $pages) && ($pages != 0)) {
	
	$page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".$pages."\" title=\"Last Page\">»</a> ";
}*/

	$page_list .= "</td>\n";

	return $page_list;
}
/***********************************************************************************
* string nextPrev (int curpage, int pages)
* Returns "Previous | Next" string for individual pagination (it's a word!)
***********************************************************************************/
function nextPrev($curpage, $pages,$pagesize) {
	
	$next_prev = "";

	if (($curpage-1) <= 0) {
		
		$next_prev .= "Previous";
}else {
	
	$next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."&pagesize=".$pagesize."\">Previous</a>";
}

	$next_prev .= " | ";

if (($curpage+1) > $pages) {
	
	$next_prev .= "Next";
	
}else {
	
	$next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."&pagesize=".$pagesize."\">Next</a>";
}

	return $next_prev;
}
/**************************************************

* Record Showing Like as Showing Records: 1 to 3 of 3

***************************************************/

function showingRecords($start,$limit,$count) {

	$toEnd=$start+$limit;
	
	if($toEnd>$count) {
		
		$endPoint=$count;
		
	}else {
		
		$endPoint=$toEnd;
	}
	
	return ($start+1)." to ".$endPoint." of ".$count;
}

}
?>





