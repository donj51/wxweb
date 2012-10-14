<?php
$SITE 			= array();
$SITE['lang'] = 'en';                // default language for website to use
$SITE['allowLanguageSelect'] = false; // set to false to disable the use of language selector
$SITE['useLanguageFlags'] = true;    // true=show flags, false=show language 2-char abbreviations
$SITE['langavail'] = array('en');
$SITE['WXtags']			= './raw/testtags.php';  // for weather variables .. we're using the old name instead of WDtags.php
$SITE['ajaxScript']     = './ajaxWDwx.js'; // for AJAX enabled display
$SITE['clientrawfile']  = './clientraw.txt';  // directory and name of Weather-Display realtime.txt file
$SITE['graphImageDir']  = '/raw/';  // directory location for graph images with trailing /
$SITE['HistoryStartYear'] = '2000';  // start year for station operation
$SITE['HistoryFilesDir']  = './raw/';    // directory location for the [month][year].htm history files
$SITE['HistoryGraphsDir'] = './raw/';    // directory location for the YYYYMMDD.gif graphic daily report files
$SITE['DavisVP']		= true;  // set to false if not a Davis VP weather station
$SITE['UV']				= false;  // set to false if no UV sensor
$SITE['SOLAR']			= false;  // set to false if no Solar sensor
$SITE['showSnow']		= false;   // set to false if snow not recorded on WD
$SITE['showSnowTemp'] 	= 1;	  // show snow instead of rain if temp (C) is <= this amount
$SITE['WXsoftware']     = 'WD';
$SITE['WXsoftwareURL'] = 'http://www.weather-display.com/';
$SITE['WXsoftwareLongName'] = 'Weather-Display';
$SITE['ajaxDashboard'] = './dashboardrevised.php';
$SITE['trendsPage']     = 'WD-trends-inc.php';
$SITE['monthNames'] = array('January','February','March','April','May','June','July','August','September','October','November','December');

// Site Customization
$SITE['organ']			= 'New Braunfels TX Weather';
$SITE['location']       = 'New Braunfels, TX, USA';
$SITE['email']			= 'mailto:jrandow@ctetg.com';
$SITE['latitude']		= '29.6726';    //North=positive, South=negative decimal degrees
$SITE['longitude']		= '-98.11566';  //East=positive, West=negative decimal degrees
$SITE['cityname']		= 'New Braunfels';

$SITE['tz'] 			= 'America/Chicago'; //NOTE: this *MUST* be set correctly to
$SITE['timeFormat'] = 'm/d/Y g:ia';      // USA  format 03/31/2006 14:03
$SITE['timeOnlyFormat'] = 'g:ia';          // USA format h:mm[am|pm\
$SITE['dateOnlyFormat'] = 'd-M-Y';        // for 31-Mar-2008 or 'j/n/Y' for Euro format

###########################################################################
# WU-History settings
$SITE['WUID']		= 'KTXNEWBR1'; // set to Wunderground ID (upper case)
$SITE['WUunits']	= 'E';		
$SITE['WUstationname'] = 'New Braunfels, TX - County Line Road Area'; // for legend at bottom of page
$SITE['WUbirthday']	= '01-01-2005'; //Stations first day of operation format dd-mm-yyyy
###########################################################################

############################################################################
# Sitewide configuration - support scripts configuration
############################################################################

###########################################################################
# These values should reflect the units-of-measure your weather station
# uses to report the weather data when processing weather tags.
# Note: if you change them here, make sure to make the corresponding
#   changes in the ajax[WXname]wx.js AJAX script also.
###########################################################################

$SITE['WDdateMDY'] = true; // for WD date format of month/day/year.  =false for day/month/year

$SITE['uomTemp'] = '&deg;F';  // ='&deg;C', ='&deg;F'
$SITE['uomBaro'] = ' inHg';    // =' hPa', =' mb', =' inHg'
$SITE['uomWind'] = ' mph';   // =' km/h', =' kts', =' m/s', =' mph'
$SITE['uomRain'] = ' in';     // =' mm', =' in'
$SITE['uomSnow'] = ' in';     // =' cm', =' in'
$SITE['uomDistance'] = ' miles';  // or ' km' -- used for Wind Run display
$SITE['uomPerHour'] = '/hr';
//
$SITE['imagesDir'] = './ajax-images/';  // directory for ajax-images with trailing slash
// 
$SITE['cacheFileDir']   =  './cache/';   // directory to use for scripts cache files .. use './' for doc.root.dir
// 
$SITE['UVscript']		= 'get-UV-forecast-inc.php'; // worldwide forecast script for UV Index
$SITE['WXSIM']			= false;  // Set to false if you have not installed WXSIM
$SITE['fcsturlNWS']		= 'http://forecast.weather.gov/MapClick.php?site=ewx&smap=1&textField1=29.67&textField2=-98.115&TextType=2';
$SITE['fcsticonsdir'] = './img/'; // NOAA-style icons for NWS, WU, WXSIM forecast scripts
$SITE['fcsticonstype']= '.jpg'; // default type='.jpg' -- use '.gif' for animated icons from http://www.meteotreviglio.com/

$SITE['fcstscript']		= 'forecastscript.php';  // USA-only NWS Forecast script
$SITE['fcstorg']		= 'NWS';    // set to 'NWS' for NOAA NWS

$SITE['NWSforecasts']   = array( "TXZ206|New Braunfels|http://forecast.weather.gov/MapClick.php?site=ewx&smap=1&textField1=29.67&textField2=-98.115&TextType=2");

$SITE['noaazone'] 		= 'TXZ206'; // used for NOAA advisories and advforecast2.php forecasts
$SITE['hurlURL']		= "advisories.php"; // page to launch for details on NOAA advisories
$SITE['noaaradar']		= 'EWX';   		// LAST 3 characters of NOAA Radar Site ID
$SITE['WUregion']	= 'sp';				// Wunderground regional maps
// GRLevel3 Radar image settings (for wxgr3radar.php and radar-status.php scripts
$SITE['GR3radar']	= 'kewx';	// set to lower-case full name of NEXRAD radar site
$SITE['GR3DIR']		= '/GR3'; 	// set to directory for GRLevel3 images (or '.' for root directory
$SITE['GR3type']	= 'cr';		// radar image type 'cr','br','cr248','br1' etc.
$SITE['GR3img']		= 'jpg';	// GR3 image type 'jpg' or 'png'
$SITE['GR3cnt']		= 10;		// number of images in series 10=(_0 ... _9 in name of file)
$SITE['GR3width']	= 512;		// width of GR3 images
$SITE['GR3height']  = 512;		// height of GR3 images
$SITE['showradarstatus'] = true; // set to false to suppress 'active' message by radar-status.php

##########################################################################
# end of configurable settings
##########################################################################
# Multilanguage support constants - please do NOT change the settings below
#DO NOT CHANGE THESE SETTINGS
$SITE['installedLanguages'] = array (
  'af' => 'Afrikaans',
  'bg' => '&#1073;&#1098;&#1083;&#1075;&#1072;&#1088;&#1089;&#1082;&#1080; &#1077;&#1079;&#1080;&#1082;',
  'ct' => 'Catal&agrave;',
  'dk' => 'Dansk',
  'nl' => 'Nederlands',
  'en' => 'English',
  'fi' => 'Suomi',
  'fr' => 'Fran&ccedil;ais',
  'de' => 'Deutsch',
  'el' => '&Epsilon;&lambda;&lambda;&eta;&nu;&iota;&kappa;&#940;',
  'ga' => 'Gaeilge',
  'hu' => 'Magyar',
  'it' => 'Italiano',
  'no' => 'Norsk',
  'pl' => 'Polski',
  'pt' => 'Portugu&ecirc;s',
  'ro' => 'limba rom&#00226;n&#00259;',
  'es' => 'Espa&ntilde;ol',
  'se' => 'Svenska',
);
# DO NOT CHANGE THESE SETTINGS
$SITE['ISOLang'] = array ( // ISO 639-1 2-character language abbreviations from country domain 
  'af' => 'af',
  'bg' => 'bg',
  'ct' => 'ca',
  'dk' => 'da',
  'nl' => 'nl',
  'en' => 'en',
  'fi' => 'fi',
  'fr' => 'fr',
  'de' => 'de',
  'el' => 'el',
  'ga' => 'ga',
  'it' => 'it',
  'hu' => 'hu',
  'no' => 'no',
  'pl' => 'pl',
  'pt' => 'pt',
  'ro' => 'ro',
  'es' => 'es',
  'se' => 'sv',
);
# DO NOT CHANGE THESE SETTINGS
$SITE['langCharset'] = array( // for languages that DON'T use ISO-8859-1 (latin) set
 'bg' => 'ISO-8859-5',
 'el' => 'ISO-8859-7',
 'hu' => 'ISO-8859-2',
 'ro' => 'ISO-8859-2',
 'pl' => 'ISO-8859-2',
 'ru' => 'UTF-8',
 'gr' => 'UTF-8'
);
# DO NOT CHANGE THESE SETTINGS
$SITE['WULanguages'] = array ( // for WeatherUnderground forecast supported languages
  'af' => 'afrikaans',
  'bg' => 'bulgarian',
  'ct' => 'catalan',
  'dk' => 'danish',
  'nl' => 'dutch',
  'en' => 'english',
  'fi' => 'finnish',
  'fr' => 'french',
  'de' => 'deutsch',
  'el' => 'greek',
  'ga' => 'gaelic',
  'hu' => 'hungarian',
  'it' => 'italian',
  'no' => 'norwegian',
  'pl' => 'polish',
  'pt' => 'portuguese',
  'ro' => 'romanian',
  'es' => 'espanol',
  'se' => 'swedish',
);
# End - multilanguage support constants
# Now prune the installedLanguages based on langavail selection
$tarray = array(); 
foreach ($SITE['langavail'] as $n => $k) {
  if(isset($SITE['installedLanguages'][$k])) {
    $tarray[$k] = $SITE['installedLanguages'][$k];
  }
}
$SITE['installedLanguages'] = $tarray;
# end prune the installedLanguages based on langavail selection
#
# set the Timezone abbreviation automatically based on $SITE['tzname'];
# Set timezone in PHP5/PHP4 manner
  if (!function_exists('date_default_timezone_set')) {
	 putenv("TZ=" . $SITE['tz']);
//	 print "<!-- using putenv(\"TZ=". $SITE['tz']. "\") -->\n";
    } else {
	 date_default_timezone_set($SITE['tz']);
//	 print "<!-- using date_default_timezone_set(\"". $SITE['tz']. "\") -->\n";
   }

$SITE['tzname']	= date("T",time());
############################################################################
if(isset($_SERVER['REMOTE_ADDR']))   {$SITE['REMOTE_ADDR']	= $_SERVER['REMOTE_ADDR'];}
if(isset($_SERVER['REMOTE_HOST']))   {$SITE['REMOTE_HOST']	= $_SERVER['REMOTE_HOST'];}
if(isset($_SERVER['DOCUMENT_ROOT'])) {$SITE['WEBROOT']		= $_SERVER['DOCUMENT_ROOT'];}
if(isset($_SERVER['REQUEST_URI']))   {$SITE['REQURI']		= $_SERVER['REQUEST_URI'];}
if(isset($_SERVER['SERVER_NAME']))   {$SITE['SERVERNAME']	= $_SERVER['SERVER_NAME'];}
$SITE['remote']			= "onclick=\"window.open(this.href,'_blank');return false;\"";
$SITE['PHPversion'] = phpversion();
?>
