<?php
include_once("header.php");
include_once("shim1.php");
?>
<style type="text/css">
.quake {
  width: 620px;
}
#map-container {
  padding: 5px;
  border-width: 1px;
  border-style: solid;
  border-color: #ccc #ccc #999 #ccc;
  -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
  -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
  box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
  width: 620px;
  display: none;

}

#map {
  width: 620px;
  height: 480px;
}

#actions {
  list-style: none;
  padding: 0;
}

#inline-actions {
  padding-top: 10px;
}

.item {
  margin-left: 20px;
}

</style>
<h3>Nearby Earthquake Activity</h3>
<?php
$lang = $SITE['lang'];
if(isset($SITE['ISOLang'][$lang])) { $lang = $SITE['ISOLang'][$lang]; }
?>
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=<?php echo $lang; ?>" type="text/javascript"></script>
    <script src="quake-json.js" type="text/javascript"></script>

<div id="main-copy">
  
 <div align="center">
 
  <?php 
  $doIncludeQuake = true;
# uncomment ONE of the $setDistanceDisplay lines to use as template for distance displays  
#  $setDistanceDisplay = 'mi (km)';
  $setDistanceDisplay = 'mi';
#  $setDistanceDisplay = 'km (mi)';
#  $setDistanceDisplay = 'km';

  $setDistanceRadius  = 1000;  // same units as first unit in $setDistanceDisplay
# NOTE: quakes of magnitude 1.0+ are available for USA locations only.
#    non-USA location earthquakes of magnitude 4.0+ are the only ones available from the USGS
  $setMinMagnitude = '2.0';  // minimum Richter Magnitude to display
  $setHighMagnitude = '4.0';  // highlight this Magnitude and greater
  
  $setMapZoomDefault = 5;    // default zoom for Google Map 1=world to 13=street
# script will use your $SITE[] values for latitude, longitude, timezone and time display format

  $setDoLinkTarget = 1;   // =1 to have links open in new page, =0 for XHTML 1.0-Strict

  include_once("quake-json.php");
  ?>
  <p style="width:620px;background-color:white">
  <img src="http://earthquake.usgs.gov/eqcenter/recenteqsww/Maps/world_moll/world_moll.gif" height="306" width="601" 
  alt="United States Geological Survey - World Earthquake Map - Last 7 days"/><br/>
  <img src="http://earthquake.usgs.gov/eqcenter/recenteqsww/Maps/Legends/world_legend.gif" height="60" width="513"
  alt="USGS World Earthquake Map Legend" />
  </p>
  <p style="align: center"><?php langtrans('Map and data courtesy of');?> 
  <a href="http://earthquake.usgs.gov/earthquakes/map/"><?php langtrans('United States Geological Survey');?></a>.</p>
 </div>
</div><!-- end main-copy -->

<?php
############################################################################
include("footer.php");
############################################################################
# End of Page
############################################################################
?>
