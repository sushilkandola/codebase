<?php
class SubPlace
{
	function findSubplace($postcode)
	{
		$db=new MySQL();
		// start Parse Xml File here
		$doc = new DOMDocument();
		$doc->load('http://ws.geonames.org/postalCodeSearch?postalcode='.urlencode($postcode).'&maxRows=10');
		$codes = $doc->getElementsByTagName("code");
		foreach( $codes as $code )
		  {
			$postalcode = $code->getElementsByTagName( "postalcode" );
			$postalcodeval = $postalcode->item(0)->nodeValue;
			$lat = $code->getElementsByTagName( "lat" );
			$latval = $lat->item(0)->nodeValue;
			$lng = $code->getElementsByTagName( "lng" );
			$lngval = $lng->item(0)->nodeValue;
			$latlong['lat'] =   $latval;
			$latlong['lang'] =   $lngval;
			return  $latlong;
		 }
	}
	function addSubplace($lat,$lang)
	{
		// start Parse Xml File here
		$doc = new DOMDocument();
		//http://ws.geonames.org/findNearbyPostalCodes?lat='.urlencode($lat).'&lng='.urlencode($lang).'
		$doc->load('http://ws.geonames.org/findNearbyPostalCodes?lat='.urlencode($lat).'&lng='.urlencode($lang).'&maxRows=500');
		//$doc->load('http://ws.geonames.org/findNearbyPostalCodes?postalcode='.urlencode($postcode).'&maxRows=500');
		$codes = $doc->getElementsByTagName("code");
		foreach( $codes as $code )
  		{
			$postalcode = $code->getElementsByTagName( "postalcode" );
			$postalcodeval = $postalcode->item(0)->nodeValue;
		
			$lat = $code->getElementsByTagName( "lat" );
			$latval = $lat->item(0)->nodeValue;
			
			$lng = $code->getElementsByTagName( "lng" );
			$lngval = $lng->item(0)->nodeValue;
			//check for duplicate value
			$chkduplicate="select * from outcodepostcodes where outcode='".$postalcodeval."'";
			$execselectQuery=mysql_query($chkduplicate) or die(mysql_error());
			$TotalPostcode=mysql_num_rows($execselectQuery);
			if($TotalPostcode==0)
			{
		       $queryLatLangQuery="insert into outcodepostcodes(id,outcode,lat,lng)values('','$postalcodeval','$latval','$lngval')";
			   $execLatLangQuery= mysql_query($queryLatLangQuery) or die("error in queryLatLangQuery".mysql_error());
			}
		}
   }
   
   
   
}