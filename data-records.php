<?php
include_once("header.php");
include_once("shim1.php");
$TITLE = $SITE['organ'] . " - ". langtransstr("Daily Records");
$showGizmo = true;  // set to false to exclude the gizmo 
$path_dailynoaa = "./raw/";             # path to NOAA reports 
$path_climatedata = "./raw/";            # WD ONLY - Location of climatedataout*.html files
$first_year_of_data = "2011";  # First year of dailynoaareport & climatedataout data that is available
$heading_name = 'New Braunfels - County Line Road Area';            # Text to be displayed on page
$recording_start_date = '2011'; # Text to be displayed on page
$show_today = true; # Set to true if you want today's info to be included. Info for today will come from custom tags in your testtags file.
$rain_season_start = 1; # Set to first month of rain season (1 for January, 7 for July, etc). Used for ytd calcuations
$snow_season_start = 7; # WD ONLY - Set to first month of snow season (1 for January, 7 for July, etc). Used for ytd calcuations
$show_snow_records = true; # WD ONLY - Set to false to not diplay snow, snow month to date, and snow year to date records
$show_baro_records = true; # WD ONLY - Set to false to not display barometer records
function add_language_functions (){
if(!function_exists('langtransstr')) {    
function langtransstr ( $item ) {
  global $LANGLOOKUP,$missingTrans;
  
  if(isset($LANGLOOKUP[$item])) {
     return $LANGLOOKUP[$item];
  } else {
      if(isset($item) and $item <> '') {$missingTrans[$item] = true; }
     return $item;
  }
}
}
#####################################################################
if(!function_exists('langtrans')) {    
function langtrans ( $item ) {
  global $LANGLOOKUP,$missingTrans;

  if(isset($LANGLOOKUP[$item])) {
     echo $LANGLOOKUP[$item];
  } else {
     if(isset($item) and $item <> '') {$missingTrans[$item] = true; }
     echo $item;
    }
 
}
}
}

?>
<link rel="stylesheet" href="data-records.css" type="text/css" />

<?php
include_once("data-records-include.php");
include_once("footer.php");?>
