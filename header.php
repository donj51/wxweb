<?php
include_once("settings.php");
include_once("common.php");
include_once($SITE['WXtags']);
function strip_units ($data) {
  preg_match('/([\d\,\.\+\-]+)/',$data,$t);
  return $t[1];
}
global	$TITLE;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="ISO-8859-2">
    <title>New Braunfels TX Weather</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="New Braunfels TX Weather, New Braunfels, Weather, ">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Stylesheets -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <!-- Scripts -->
    <script type="text/javascript" src="ajaxWDwx-packed.js"></script>
    <script type="text/javascript" src="ajaxWDwx-settings.js"></script>
     

  </head>

  <body class="preview" data-spy="scroll" data-target=".subnav" data-offset="50">

  <!-- Top Navigation Bar -->
  <div class="navbar navbar-fluid-top navbar-inverse">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
              <a class="brand" href="../">New Braunfels TX Weather</a>
       <ul class="nav">
            <li><a href="about.php">About</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Websites<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://www.networkblog.net">Jeffrey's Network & Security Blog</a></li>
                <li><a href="http://www.jeffreyrandow.org">Jeffrey's Personal Blog</a></li>
                <li><a href="http://www.ctetg.com">CTETG</a></li>
              </ul>
       </ul>

       <div class="nav-collapse hidden-phone" id="main-menu">
          <ul class="nav pull-right">
            <li><p class="btn btn-warning"><span class="ajax" id="gizmotemp"><?php echo strip_units($maxtemp);?>&#176;</span></p></li>
            <li class="divider-vertical"></li>
            <li><p class="btn btn-danger">Rain: <span class="ajax" id="gizmorain"<?php echo $dayrn;?></span></p></li>
            <li class="divider-vertical"></li>
            <li><p class="btn btn-info">Last update: <span class="ajax" id="gizmodate"><?php echo $date;?></span> @ <span class="ajax" id="gizmotime"><?php echo $time;?></span></p></li>
          </ul>
       </div>
     </div>
   </div>
  </div>


<div class="container-fluid">

  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a href="#" class="brand visible-phone visible-tablet">Click for Menu</a>
        <div class="nav-collapse">
          <ul class="nav">
            <li><a href="/">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forecasts<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="for-nwsweek.php">NWS Weather Forecast</a></li>
                <li><a href="for-nwsarea.php">NWS Area Discussion</a></li>
                <li><a href="for-aq.php">Air Quality Forecast</a></li>
                <li><a href="for-uv.php">UV Forecast</a></li>
                <li><a href="advisories.php">Weather Advisories</a></li>
                <li class="divider"></li>
                <li class="hidden-phone"><a href="http://www.wunderground.com/cgi-bin/findweather/getForecast?query=zmw:78130.1.99999">Weather Underground Forecast</a></li>
                <li class="hidden-phone"><a href="http://www.weather.com/weather/tenday/New+Braunfels+TX+78130:4:US">The Weather Channel 10 Day Forecast</a></li>
                <li class="hidden-phone"><a href="http://www.accuweather.com/en/us/new-braunfels-tx/78130/daily-weather-forecast/335925">Accuweather Extended Forecast</a></li>
                <li class="divider hidden-phone"></li>
                <li class="hidden-phone"><a href="http://www.woai.com/weather/default.aspx">WOAI (San Antonio) Forecast</a></li>
                <li class="hidden-phone"><a href="http://http://www.kens5.com/weather/forecast/seven-day">KENS (San Antonio) Extended Forecast</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="data-trends.php">Weather Trends and Statistics</a></li>
                <li><a href="data-records.php">Daily Records</a></li>
                <li><a href="raindetail.php">Rain Records</a></li>
                <li><a href="historical.php">Historical Data</a></li>
                <li><a href="cwopstats.php">CWOP Data Quality</a></li>
                <li><a href="cocorahs-map.php">CoCoRAHS Data</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hydrology<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Lakes and River</a></li>
                <li class="divider"></li>
                <li><a href="#">Edwards Aquifer Level</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Radar<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/rad-wurad.php">Weather Underground - Area</a></li>
                <li class="divider"></li>
                <li><a href="http://radar.weather.gov/radar.php?rid=ewx&product=N0R&overlay=11101111&loop=no">Austin/San Antonio NWS Radar</a></li>
                <li><a href="http://radar.weather.gov/radar.php?rid=grk&product=N0R&overlay=11101111&loop=no">Central Texas NWS Radar</a></li>
              </ul>
            </li>
            <li class="dropdown visible-desktop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mesonet<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/mesonet/mesonet.php">Mid-South Weather Mesonet WX Map</a></li>
                <li class="divider"></li>
                <li><a href="http://www.northamericanweather.net/about.php">About the NAWN Mesonet</a></li>
                <li><a href="http://www.midsouthweather.net/">Mid-South Mesonet Home</a></li>
              </ul>
            </li>
            <li class="dropdown visible-desktop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Extreme<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="earthquake.php">Earthquakes</a></li>
                <li><a href="#">Tsunamis</a></li>
              </ul>
            </li>
            <li class="dropdown visible-desktop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Space<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/spaceweather.php">Space Weather</a></li>
                <li><a href="astronomy.php">Astronomical Data</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tropical<b class="caret"></b></a>
              <ul class="dropdown-menu">
              </ul>
            </li>            
            <li class="dropdown visible-desktop">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Information<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">What is CWOP?</a></li>
                <li><a href="#">What is CoCoRAHS?</a></li>
                <li><a href="#">Credits</a></li>
              </ul>
            </li>
          </ul>  
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->

