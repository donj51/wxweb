<?php
include_once("header.php");
include_once("shim1.php");

//Select your URLs at the following location http://feeds.enviroflash.info/
//Forecast URL
$urlForecast = "http://feeds.enviroflash.info/rss/forecast/128.xml";  //Baltimore, MD
//Action Day URL
$urlActionDay = "http://feeds.enviroflash.info/rss/actionDay/128.xml";  //Baltimore, MD
//Current Air Quality URL
$urlRealtime = "http://feeds.enviroflash.info/rss/realtime/128.xml";  //Baltimore, MD
// Your City, State Name
$cityname= "New Braunfels, TX";
// Images Directory (may not be needed, remove the // if needed)
$imagesDir = "/img/ajax/";

// Images can be found here:  http://www.airnow.gov (find your city)
// "Current AQI" image from airnow.gov found on your city page
$hourlyaqiimage = "http://www.epa.gov/airnow/today/cur_aqi_tx_ok.jpg";
// "Forecast" image from airnow.gov found on your city page
// Example: http://www.epa.gov/airnow/today/forecast_aqi_20100401_va_wv_md_de_dc.jpg  (20100401 will change daily)
// So, grab "http://www.epa.gov/airnow/today/forecast_aqi_20" then grab the end "_va_wv_md_de_dc.jpg"
// Code below will automatically insert the appropriate year, month and day (ie. "100401")
$forecastimagebegin = "http://www.epa.gov/airnow/today/forecast_aqi_20"; 
$forecastimageend = "_tx_ok.jpg"; 
// "AQI Animation" image from airnow.gov found on your city page
$hourlyaqianimation = "http://www.epa.gov/airnow/today/anim_aqi_tx_ok.gif";

/////////////////////////////////////////////////////////////////////////////
//END SETTINGS///////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
?>

<h2>Air Quality for New Braunfels, TX</h2>


<?php

/////////////////////////////////////////////////////////////////////////////
//DO NOT MODIFY BELOW THIS OR SCRIPT MAY BREAK///////////////////////////////
/////////////////////////////////////////////////////////////////////////////

// GET THE DATA FROM EACH URL
getAQIdata($urlForecast, "forecast");
getAQIdata($urlRealtime, "realtime");
getAQIdata($urlActionDay, "actionday");

// arrays for comparing levels and values
$aqiValues = array('0-50', '51-100', '101-150', '151-200', '201-300', '301-500');
$aqiLevels = array('Good', 'Moderate', 'Unhealthy for Sensitive Groups', 'Unhealthy', 'Very Unhealthy', 'Hazardous');
$aqiGraphic = array('aqi_good_text.gif', 'aqi_mod_text.gif', 'aqi_usg_text.gif', 'aqi_unh_text.gif', 'aqi_vunh_text.gif', 'aqi_haz_text.gif');  

// set the variables
$locF1 = 'N/A';
$currentFdate = 'N/A';
$currentFvalue = 'N/A';
$currentFindex = 'N/A';
$currentFmeasure = 'N/A';
$nextFdate = 'N/A';
$nextFvalue = 'N/A';
$nextFindex = 'N/A';
$nextFmeasure = 'N/A';
$forecastAgency = 'N/A';
$lastFupdate = 'N/A';
$locR1 = 'N/A';
$CAQtime = 'N/A';
$realMeasure1 = 'N/A';
$realIndex1 = 'N/A';
$realValue1 = 'N/A';
$realMeasure2 = 'N/A';
$realIndex2 = 'N/A';
$realValue2 = 'N/A';
$realUpdate = 'N/A';
$dashbrdAQI = 'N/A';
$showGI = 'N/A';
$realTitle = 'N/A';

// REALTIME DATA AQUISITION
// get the location
if(preg_match('|Location:</b> (.*)</div>|', $realtime[0]["desc"])) {
   preg_match('|Location:</b> (.*)</div>|', $realtime[0]["desc"], $r1);
   $locR1 = trim(strip_tags($r1[1]));

   // get the date and time
   preg_match('|Current Air Quality:</b>(.*)<br /><br />|Uis', $realtime[0]["desc"], $r2);
   $CAQtime = trim(strip_tags($r2[1]));

   // strip out the needed data
   preg_match('|<br /><br />\n(.*) - (.*) AQI - (.*)<br />\n|Uis', $realtime[0]["desc"], $r3);
   $realIndex2 = 'N/A';
   $realValue2 = 'N/A';
   $realMeasure2 = 'N/A';

   // get the title/location
   preg_match('|<title>(.*) - Current|Uis', $realtime[0]["desc"], $r4);
   $CAQloc = $r4[1];
   print_r($CAQloc);

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
   
   
   $real2 = '';

   // if there is no 2nd type
   if($realMeasure2 !== 'N/A') {
     $real2 = '1';	
   }
}

// TODAYS FORECAST DATA AQUISITION
// get the location
if(preg_match('|Location:</b> (.*)</div>|', $forecast[0]["desc"])) {
	
   preg_match('|Location:</b> (.*)</div>|', $forecast[0]["desc"], $f1);
   $locF1 = trim($f1[1]);

   // strip out the needed data
   preg_match('|Today,(.*):(.*) - (.*)<br />|', $forecast[0]["desc"], $f2);
   $currentFdate = trim($f2[1]);

   // get the correct data between listed and NA values
   if(preg_match('|(.*) - (.*)|', $f2[2])) {
      $f2[2] = preg_replace('| - .*|', '', $f2[2]);
   }

   $currentFindex = trim($f2[2]);
   $currentFvalue = trim($f2[3]);
   $currentFmeasure = 'N/A';

   // get Acency
   preg_match('|Agency:</b> (.*) </div>|', $forecast[0]["desc"], $f4);
   $forecastAgency = trim($f4[1]);

   // get last update
   preg_match('|Last Update: (.*)</i>|', $forecast[0]["desc"], $f5);
   $lastFupdate = trim($f5[1]);
	  
   // get the correct data between listed and NA values
   if(preg_match('|Today,(.*):(.*) - (.*) - (.*)<br />|', $forecast[0]["desc"])) {
      preg_match('|Today,.*:.* - (.*) - (.*)<br />|', $forecast[0]["desc"], $f2a);	
      $currentFvalue = trim($f2a[2]);
      $currentFmeasure = trim($f2a[1]);
   }

   // remove AQI
   $currentFmeasure = preg_replace('| AQI|', '', $currentFmeasure);
   

   // if the value is N/A then replace it with a range of values according to the level
   if($currentFmeasure == 'N/A') {
      $key = array_search($currentFindex, $aqiLevels);
      $currentFmeasure = $aqiValues["$key"];  
   }

// TOMORROWS FORECAST DATA AQUISITION
   // strip out the needed data
   if(preg_match('|Tomorrow,(.*):(.*) - (.*)<br />|', $forecast[0]["desc"], $f3)) {

      preg_match('|Tomorrow,(.*):(.*) - (.*)<br />|', $forecast[0]["desc"], $f3);
      $nextFdate = trim($f3[1]);
   
      // get the correct data between listed and NA values
      if(preg_match('|(.*) - (.*)|', $f3[2])) {
         $f3[2] = preg_replace('| - .*|', '', $f3[2]);
      }

      $nextFindex = trim($f3[2]);
      $nextFvalue = trim($f3[3]);
      $nextFmeasure = 'N/A';

      // get the correct data between listed and NA values
      if(preg_match('|Tomorrow,(.*):(.*) - (.*) - (.*)<br />|', $forecast[0]["desc"])) {
         preg_match('|Tomorrow,.*:.* - (.*) - (.*)<br />|', $forecast[0]["desc"], $f3);
         $nextFvalue = trim($f3[2]);
         $nextFmeasure = trim($f3[1]);
      }

      // remove AQI
      $nextFmeasure = preg_replace('| AQI|', '', $nextFmeasure);

      // if the value is N/A then replace it with a range of values according to the level
      if($nextFmeasure == 'N/A') {
         $key = array_search($nextFindex, $aqiLevels);
         $nextFmeasure = $aqiValues["$key"];  
      }
   }
     
   $fore2 = '';

   // if there is no 2nd type
   if($nextFvalue !== 'N/A') {
     $fore2 = '1';	
   }
}


// ACTION DAY DATA AQUISITION
// get action day text
$adtext = '';

// grab data if there is an Action Day
if(preg_match('|<td valign="top">\s+(.*)\s+</td>|', $actionday[0]["desc"])) {
   preg_match('|<td valign="top">\s+(.*)\s+</td>|', $actionday[0]["desc"], $ad1);
   $adtext = trim($ad1[1]);
}

// grab data if there is NO Action Day alerts
if(preg_match('|<td valign="top">\s+(.*)\s+<div>|', $actionday[0]["desc"])) {
   preg_match('|<td valign="top">\s+(.*)\s+<div>|', $actionday[0]["desc"], $ad1);
   $adtext = trim($ad1[1]);
}


//// FUNCTIONS ////
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

// Associate AQI level with graphic icon
function getGraphic($value, $levels, $graphic, $iDir) {
   global $levelImage;
   
   $var = array_search($value, $levels);
   if($value !== 'N/A') {
	   $levelImage = "<img src=\"".$iDir.$graphic["$var"]."\" alt=\"  ".$levels["$var"]."\" title=\"  ".$levels["$var"]."\" border=\"0\" />";
	   echo $levelImage;
   }
   else {
	   $levelImage = "<img src=\"".$iDir."aqi_nodata_text.gif\" alt=\"  No Data\" title=\"  No Data\" border=\"0\" />";
	   echo $levelImage;
   }
}
	
//// END OF FUNCTIONS

?>
 
<table class="table table-bordered">
      <tr>
        <td width="50%"><strong>Realtime Air Quality Data</strong></td>
        <td width="50%"><strong>Realtime AQI - Pollutant Details</strong></td>
      </tr>
      <tr>
        <td width="50%">
          <strong>Realtime Location:</strong> <?php print $locR1; ?><br />
          <strong>Issue Date:</strong> <?php print $CAQtime; ?></span><br />
          <strong>Current Air Quality Index</strong><br /><br />
          <?php getGraphic($realIndex1, $aqiLevels, $aqiGraphic, $imagesDir); ?><br/><p> </p>
          <span class="btn btn-inverse btn-large">AQI:  <?php
          if ($realValue1 == "N/A") {
            echo "Data Not<br />Available";
          } else {
	          echo $realValue1;
	        }
          ?></span>
          <p> </p>
          <?php
          if ($adtext == "") {
            echo "";
          } else {
          echo "<strong>Action Day Alert</strong>:<br /><span>".$adtext."</span>";
          }
        ?>
        </td>
        <td width="50%">
          <strong>Type:</strong>  <?php print $realMeasure1; ?><br />
          <strong>Index:</strong>  <?php print $realIndex1; ?><br />
          <strong>AQI Value:</strong>  <?php print $realValue1; ?><br/><br/>

          <?php  if($real2) { ?>
          <strong>Type:</strong>  <?php print $realMeasure2; ?><br />
          <strong>Index:</strong>  <?php print $realIndex2; ?><br />
          <strong>AQI Value:</strong>  <?php print $realValue2; ?><br/><?php } ?>
        </td>
        </tr>
    </table>


<h2>Air Quality Index Levels</h2>
<table class="table table-bordered table-condensed">
<thead>
<th><strong>Index Value</strong></th>
<th><strong>Effect</strong></th>
</thead>
<tr>
<td><span style="font-size: 80%; color: black;">0-50</span></td>
    <td><span style="font-size: 80%; color: black;">Good</span></td>
  </tr>
 <tr bgcolor="#FFFF00">
    <td><span style="font-size: 80%; color: black;">51-100</span></td>
    <td><span style="font-size: 80%; color: black;">Moderate</span></td>
  </tr>
  <tr bgcolor="#FF6600">
    <td><span style="font-size: 80%; color: black;">101-150</span></td>
    <td><span style="font-size: 80%; color: black;">Unhealthy for Sensitive Groups</span></td>
  </tr>
  <tr bgcolor="#FF0000">
    <td><span style="font-size: 80%; color: black;">151-200</span></td>
    <td><span style="font-size: 80%; color: black;">Unhealthy</span></td>
  </tr>
  <tr bgcolor="#99004C">
    <td><span style="font-size: 80%; color: white;">201-300</span></td>
    <td><span style="font-size: 80%; color: white;">Very Unhealthy</span></td>
  </tr>
  <tr bgcolor="#7E0023">
    <td><span style="font-size: 80%; color: white;">301-500</span></td>
    <td><span style="font-size: 80%; color: white;">Hazardous</span></td>
  </tr>
</table>
</p>

<table class="table table-bordered">
  <tr>
    <td colspan="<?php if($fore2) { echo "2" ;} else { echo "1" ;} ?>" class="table-top" style="text-align:center;"><strong>Air Quality Forecast</strong></td>
  </tr>
  <tr class="column-dark">
    <td height="47" colspan="<?php if($fore2) { echo "2" ;} else { echo "1" ;} ?>" align="center"><span style="font-size: 75%; color: black;"><strong>Forecast Location:</strong> <?php print $locF1; ?><br />
      <strong>Forecast Agency:</strong> <?php print $forecastAgency; ?></span></td>
  </tr>
<?php  if($fore2) { ?>
  <tr>
    <td colspan="2" class="table-top" style="text-align:center;"><strong>Two Day Forecast</strong></td>
  </tr>
<?php  ;}?>
  <tr>
    <td class="table-top" style="text-align:center;"><strong><?php if($fore2) { echo "Day One Forecast" ;} else { echo "Todays Forecast" ;} ?></strong></td>
<?php  if($fore2) { ?>
    <td class="table-top" style="text-align:center;"><strong>Day Two Forecast</strong></td>
<?php  ;}?>
  </tr>
  <tr class="column-dark">
    <td width="50%" align="center" valign="middle" style="text-align:center;">
    	<strong>Date:</strong> <?php print $currentFdate; ?><br />
      <strong>Type:</strong> <?php print $currentFvalue; ?><br />
      <strong>Index:</strong> <?php print $currentFindex; ?><br />
      <strong>AQI Value:</strong> <?php print $currentFmeasure; ?><br />
      <br />
      <?php getGraphic($currentFindex, $aqiLevels, $aqiGraphic, $imagesDir); ?>
      <br />
    </td>
<?php  if($fore2) { ?>
    <td width="50%" align="center" valign="middle" style="text-align:center;">
      <strong>Date:</strong> <?php print $nextFdate; ?><br />
      <strong>Type:</strong> <?php print $nextFvalue; ?><br />
      <strong>Index:</strong> <?php print $nextFindex; ?><br />
      <strong>AQI Value:</strong> <?php print $nextFmeasure; ?><br />
      <br />
      <?php getGraphic($nextFindex, $aqiLevels, $aqiGraphic, $imagesDir); ?>
      <br />
    </td>
<?php  ;}?>
  </tr>
  <tr class="column-dark">
    <td colspan="<?php if($fore2) { echo "2" ;} else { echo "1" ;} ?>"><strong><span style="font-size: 75%; color: black;"> Last Update:</span></strong><span style="font-size: 75%; color: black;"><?php print $lastFupdate; ?></span></td>
  </tr>
</table>

<span style="font-size: 105%; color: black;"><strong>Current Hourly Air Quality Index Map</strong></span><br/>
<img src="<?php print $hourlyaqiimage ?>" border="0" width="525" height="400" alt="" />
<table>
<tr align="center">
<td><img src="<?php print ${imagesDir}?>aqi_good_text.gif" alt="AQI: Good" title="AQI: Good" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_mod_text.gif" alt="AQI: Moderate" title="AQI: Moderate" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_usg_text.gif" alt="AQI: Unhealthy for Sensitive Groups" title="AQI: Unhealthy for Sensitive Groups" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_unh_text.gif" alt="AQI: Unhealthy" title="AQI: Unhealthy" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_vunh_text.gif" alt="AQI: Very Unhealthy" title="AQI: Very Unhealthy" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_haz_text.gif" alt="AQI: Hazardous" title="AQI: Hazardous" border="0" /></td>
</tr>
</table>
<br/>
<br/>
<span style="font-size: 105%; color: black;"><strong>Today's Air Quality Forecast</strong></span><br/>
<img src="<?php print $forecastimagebegin ?><?php print date("y"); ?><?php print date("m"); ?><?php print date("d"); ?><?php print $forecastimageend ?>" border="0" width="525" height="400" alt="" />
<table width="540">
<tr align="center">
<td><img src="<?php print ${imagesDir}?>aqi_good_text.gif" alt="AQI: Good" title="AQI: Good" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_mod_text.gif" alt="AQI: Moderate" title="AQI: Moderate" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_usg_text.gif" alt="AQI: Unhealthy for Sensitive Groups" title="AQI: Unhealthy for Sensitive Groups" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_unh_text.gif" alt="AQI: Unhealthy" title="AQI: Unhealthy" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_vunh_text.gif" alt="AQI: Very Unhealthy" title="AQI: Very Unhealthy" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_haz_text.gif" alt="AQI: Hazardous" title="AQI: Hazardous" border="0" /></td>
</tr>
</table>
<br/>
<br/>
<span style="font-size: 105%; color: black;"><strong>Today's Air Quality Timed Animation</strong></span><br/>
<img src="<?php print $hourlyaqianimation ?>" border="0" width="525" height="400" alt="" />
<table width="540">
<tr align="center">
<td><img src="<?php print ${imagesDir}?>aqi_good_text.gif" alt="AQI: Good" title="AQI: Good" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_mod_text.gif" alt="AQI: Moderate" title="AQI: Moderate" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_usg_text.gif" alt="AQI: Unhealthy for Sensitive Groups" title="AQI: Unhealthy for Sensitive Groups" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_unh_text.gif" alt="AQI: Unhealthy" title="AQI: Unhealthy" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_vunh_text.gif" alt="AQI: Very Unhealthy" title="AQI: Very Unhealthy" border="0" /></td>
<td><img src="<?php print ${imagesDir}?>aqi_haz_text.gif" alt="AQI: Hazardous" title="AQI: Hazardous" border="0" /></td>
</tr>
</table>
<br/>
<br/>
<table width="650">
<tr><td style="font-size: 9px; color: #CCC">Script courtesy of &nbsp;Michael Holden of  
<a href='http://www.relayweather.com/'><strong>Relay Weather</strong></a>. Data courtesy of <a href='http://www.airnow.gov/'><strong> Airnow.gov </strong></a></td></tr>
</table>
</center>
<br/>
<br/>




<?php   

############################################################################
include("footer.php");
############################################################################
# End of Page
############################################################################
?>