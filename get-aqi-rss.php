<?php
//Current Air Quality URL
$urlRealtime = "http://feeds.enviroflash.info/rss/realtime/128.xml";  //Baltimore, MD
// Images Directory
$imagesDir = "./ajax-images";

// GET THE DATA FROM URL
getAQIdata($urlRealtime, "realtime");


//// FUNCTIONS
// Data aquisition
function getAQIdata($AQIurl,$type) {
	global $$type;

	$$type = array();
	$typeA = $type;
	$typeA = new DOMDocument();
	$typeA->load($AQIurl);
	foreach ($typeA->getElementsByTagName('item') as $node) {
		$itemRSS = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			);
		array_push($$type, $itemRSS);
	}
}	

// strip out the needed data
preg_match('|<br /><br />\n(.*) - (.*) AQI - (.*)<br />\n|Uis', $realtime[0]["desc"], $r3);
$realIndex2 = 'N/A';
$realValue2 = 'N/A';
$realMeasure2 = 'N/A';

// search for two AQI types
if(preg_match('|<br /><br />\n(.*) - (.*) AQI - (.*)<br />(.*) - (.*) AQI - (.*)</div>|Uis', $realtime[0]["desc"])) {
   preg_match('|<br /><br />\n(.*) - (.*) AQI - (.*)<br />(.*) - (.*) AQI - (.*)</div>|Uis', $realtime[0]["desc"], $r3);
   $realIndex2 = trim(strip_tags($r3[4]));
   $realValue2 = trim(strip_tags($r3[5]));
   $realMeasure2 = trim(strip_tags($r3[6]));
}

$realIndex1 = trim(strip_tags($r3[1]));
$realValue1 = trim(strip_tags($r3[2]));
$realMeasure1 = trim(strip_tags($r3[3]));

// get the last update
preg_match('|Last Update: (.*)</i>|', $realtime[0]["desc"], $r4);
$realUpdate = trim(strip_tags($r4[1]));

// arrays for comparing levels and values
$aqiValues = array('0-50', '51-100', '101-150', '151-200', '201-300', '301-500');
$aqiLevels = array('Good', 'Moderate', 'Unhealthy for Sensitive Groups', 'Unhealthy', 'Very Unhealthy', 'Hazardous');
$aqiGraphic = array('aqi_good_text.gif', 'aqi_mod_text.gif', 'aqi_usg_text.gif', 'aqi_unh_text.gif', 'aqi_vunh_text.gif', 'aqi_haz_text.gif');  ////////////////////////////////////////////


// Associate AQI level with graphic icon
function getGraphic($value, $levels, $graphic, $iDir) {
   global $levelImage;
   
   $var = array_search($value, $levels);
   if($value !== 'N/A') {
	   $levelImage = "<img src=\"".$iDir."/".$graphic["$var"]."\" alt=\"".$levels["$var"]."\" title=\"".$levels["$var"]."\" border=\"0\" />";
	   echo $levelImage;
   }
   else {
	   $levelImage = "<img src=\"".$iDir."/aqi_nodata_text.gif\" alt=\"No Data\" title=\"No Data\" border=\"0\" />";
	   echo $levelImage;
   }
}
	
////  END OF FUNCTIONS

?>