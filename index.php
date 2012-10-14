<?php include_once("header.php");?>
  <div class="row-fluid hidden-desktop">
    <div class="span12">
      <h4>Current Conditions (Mobile View)</h4>
      <table class="table table-condensed table-striped" style="tr:hover td,tr:hover th {background-color: inherit;}">
        <tr>
          <td>Temperature:</td>
          <td><?php echo $tempnodp;?>&#176;</td>
        </tr>
        <tr>
          <td>Temperature Extremes:</td>
          <td><?php echo strip_units($maxtemp);?>&#176; (High) <?php echo strip_units($mintemp);?>&#176; (Low)</td>
        </tr>        
        <tr>
          <td>Feels-Like Temperature:</td>
          <td><?php echo $feelslike;?>&#176;</td>
        </tr>
        <tr>
          <td>Wind:</td>
          <td><?php echo $avgspd;?> (Gust <?php echo $gstspd;?>) from the <?php echo $dirlabel;?></td>
        </tr>        
        <tr>
          <td>Rain:</td>
          <td><?php echo $dayrn;?></td>
        </tr>
        <tr>
          <td>Barometer:</td>
          <td><?php echo $baro;?></td>
        </tr>        
        <tr>
          <td>Humidity:</td>
          <td><?php echo $humidity;?></td>
        </tr>
        <tr>
          <td>Last Update Time:</td>
          <td><?php echo $date;?> @ <?php echo $time;?></td>
        </tr>
      </table>
    </div>    
  </div>
  <div class="row-fluid">
    <div class="span12">
      <h4>Weather Warnings / Alerts / Advisories / Statements:</h4>
      <div>
        <?php include_once("atom-top-warning.php");?>
      </div>
    <div>
  </div>

  <div class="row-fluid">
    <div class="span4">
      <h4>Site News:</h4>
      <p><?php include("news.txt");?></p>
    </div>
    <div class="span4">
      <h3>Short Term Forecast</h3>
      <?php $doPrintNWS=false; require("forecastscript.php");?>
      <table class="table table-striped table-bordered">
      <tr class="success">
        <?php print "<td><strong>$forecasttitles[0]</strong></td>\n"; ?>
        <?php print "<td><strong>$forecasttext[0]</strong></td>\n"; ?>
      </tr>
      <tr>
        <?php print "<td><strong>$forecasttitles[1]</strong></td>\n"; ?>
        <?php print "<td>$forecasttext[1]</td>\n"; ?>
      </tr>
      <tr>
        <?php print "<td><strong>$forecasttitles[2]</strong></td>\n"; ?>
        <?php print "<td>$forecasttext[2]</td>\n"; ?>
      </tr>
      <tr>
        <?php print "<td><strong>$forecasttitles[3]</strong></td>\n"; ?>
        <?php print "<td>$forecasttext[3]</td>\n"; ?>
      </tr>
      </table>
      <?php print "<small>Weather Forecast from Austin/San Antonio NWS Office in New Braunfels, TX as of <strong>$forecastupdated </strong></small>\n"; ?>
    </div>
    <div class="span4">
      <h3>WeatherCams</h3>
      <div class="tabbable">
        <ul class="nav nav-tabs">
         <li class="active"><a href="#tab1" data-toggle="tab"><span class="btn btn-small btn-primary">South Webcam</span></a></li>
         <li><a href="#tab2" data-toggle="tab"><span class="btn btn-small btn-primary">ESE Webcam</span"></a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab1">
            <a href="webcam.php"><img src="http://jeffreycentex.is-a-geek.com/webcam.jpg"/></a>
          </div>
          <div class="tab-pane" id="tab2">
            <a href="webcam.php"><img src="http://jeffreycentex.is-a-geek.com/webcam2.jpg"/></a>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span8">
      <h3>Realtime Weather Data for Today</h3>
      <span class="label">Last Updated at:  <span class="ajax" id="ajaxndate"><?php echo $date;?></span> @ <span class="ajax" id="ajaxntimess"><?php echo $time;?></span></span>  (Updates every 30 seconds for 125 minutes)
      <table class="table table-bordered table-condensed" style="tr:hover td,tr:hover th {background-color: inherit;}">
        <tr style="background-color:#000000; color=white;">
          <td><font style="color: #ffffff;"><strong>Temperature</strong></font></td>
          <td><font style="color: #ffffff;"><strong>Humidity/Dewpoint</strong></font></td>
          <td><font style="color: #ffffff;"><strong>Precipitation</strong></font></td>
        </tr>
        <tr>
          <td>Temperature:  <span class="pull-right"><span class="ajax" id="ajaxtemparrow"><?php echo $temperature;?></span><span class="ajax" id="ajaxtempcolor">Temp</span><span></td>
          <td>Humidity:  <span class="pull-right"><strong><span class="ajax" id="ajaxhumidity"><?php echo $humidity;?></span>%</strong></span></td>
          <td>Rain Today:  <strong><span class="ajax pull-right" id="ajaxrain"><?php echo $dayrn;?></span></strong></td>
        </tr>
        <tr>
          <td>High Temperature:  <span class="pull-right"><span class="ajax label label-important" id="ajaxtempmax"><?php echo $maxtemp;?></span><font style="font-size: 7pt;"> (<?php echo $maxtempt;?>)</font></span></td>
          <td>Dewpoint Today: <span class="ajax pull-right" id="ajaxdew"><?php echo $dewpt;?></span></td>
          <td>Rain Yesterday:  <span class="ajax pull-right" id="ajaxrainYes"><?php echo $yesterdayrain;?></span></td>
        </tr>
        <tr>
          <td>Low Temperature:  <span class="pull-right"><span class="ajax label label-info" id="ajaxtempmin"><?php echo $mintemp;?></span><font style="font-size: 7pt;"> (<?php echo $mintempt;?>)</font></span></td>
          <td>High Dewpoint: <span class="ajax pull-right" id="ajaxdewmax"></span></td>
          <td>Rain this Month:  <span class="ajax pull-right" id="ajaxrainmo"><?php echo $monthrn;?></span></td>
        </tr>
        <tr>
          <td>"Feels-Like" Temperature:  <span class="ajax label label-warning pull-right" id="ajaxfeelslike"><?php echo $feelslike;?></span></td>
          <td>Low Dewpoint: <span class="ajax pull-right" id="ajaxdewmin"></span></td>
          <td>Rain this Year:  <span class="ajax pull-right" id="ajaxrainyr"><?php echo $yearrn;?></span></td>
        </tr>              
        <tr>
          <td>Record High Temperature:  <span class="pull-right"><span class="label label-important"><?php echo $WUmaxtempr;?></span><font style="font-size: 7pt;"> (<?php echo $WUmaxtempryr;?>)</font><span></td>
          <td>Wetbulb Temperature: <span class="ajax pull-right" id="ajaxwetbulb">WetBulb</span></td>
          <td># Days of Rain This Month:  <span class="pull-right"><?php echo $dayswithrain;?></span></td>
        </tr> 
        <tr>
          <td>Record Low Temperature:  <span class="pull-right"><span class="label label-info"><?php echo $WUmintempr;?></span><font style="font-size: 7pt;"> (<?php echo $WUmintempryr;?>)</font></span></td>
          <td>Current Humidex: <span class="ajax pull-right" id="ajaxhumidex">Humidex</span></td>
          <td># Days w/o Rain:  <span class="pull-right"><?php echo $dayswithnorain;?></span></td>
        </tr> 
        <tr style="background-color:#000000; color=white;">
          <td><font style="color: #ffffff;">Heat/Chill Indices</font></td>
          <td><font style="color: #ffffff;">Wind</font></td>
          <td><font style="color: #ffffff;">Snow</font></td>
        </tr>
        <tr>
          <td>Current Heat Index:  <span class="ajax label label-important pull-right" id="ajaxheatidx"><?php echo $heati;?></span></td>
          <td>Current Wind Speed: <span class="ajax pull-right" id="ajaxwind"><?php echo $avgspd;?></span></td>
          <td>Total Snow Today:  <span class="pull-right"><?php echo $snowtodayin;?></span></td>
        </tr>
        <tr>
          <td>High Heat Index:  <span class="pull-right"><span class="ajax label label-important" id="ajaxheatidxmax"></span><font style="font-size: 7pt;"> (<?php echo $maxheatt;?>)</font></span></td>
          <td>Direction: <span class="ajax pull-right" id="ajaxwinddir"><?php echo $dirlabel;?></span></td>
          <td>Total Snow this Month:  <span class="pull-right"><?php echo $snowmonthin;?></span></td>
        </tr>        
        <tr>
          <td>Current Wind Chill:  <span class="ajax label label-info pull-right" id="ajaxwindchill"><?php echo $windch;?></span></td>
          <td>Current Gust Speed: <span class="ajax pull-right" id="ajaxgust"><?php echo $gstspd;?></span></td>
          <td style="background-color:#000000; color=white;"><font style="color: #ffffff;">Barometer</font></td>
        </tr>
        <tr>
          <td>Low Wind Chill:  <span class="pull-right"><span class="ajax label label-info" id="ajaxwindchillmin"></span><font style="font-size: 7pt;"> (<?php echo $maxheatt;?>)</font></span></td>
          <td>Maximum Gust: <span class="pull-right"><span class="ajax" id="ajaxwindmaxgust"><?php echo $maxgst;?></span><font style="font-size: 7pt;"> (<span class="ajax" id="ajaxwindmaxgusttime">Wind</span>)</font></span></td>
          <td>Current Barometer:  <span class="ajax pull-right" id="ajaxbaro"><?php echo $baro;?></span><span class="ajax pull-right" id="ajaxbaroarrow"><?php echo $pressuretrendname;?></span></td>
        </tr>        
        <tr>
          <td>Apparent Temperature:  <span class="pull-right"><span class="ajax label label-success" id="ajaxapparenttemp"><?php echo $apparenttemp;?></span></span></td>
          <td>Maximum Average Wind: <span class="pull-right"><span class="ajax" id="ajaxwindmaxavg"></span></span></td>
          <td>Max Barometer:  <span class="ajax pull-right" id="ajaxbaromax"></span></td>
        </tr> 
        <tr>
          <td>Apparent Temperature in Sun:  <span class="pull-right"><span class="label label-important"><?php echo $apparentsolartemp;?></span></span></td>
          <td>Beaufort Scale: <span class="pull-right"><span class="ajax" id="ajaxbeaufort"><?php echo $bftspeedtext;?></span></span></td>
          <td>Min Barometer:  <span class="ajax pull-right" id="ajaxbaromin"></span></td>
        </tr> 
        <tr>
          <td style="background-color:#000000; color=white;"><font style="color: #ffffff;">Heat/Cool Degree Days</font></td>
          <td>Wind Run Today: <span class="pull-right"><?php echo $windruntoday;?> miles</span></td>
          <td>Trend:  <span class="pull-right"><?php echo $trend;?></span></td>
        </tr>
        <tr>
          <td>Heating for Today:  <span class="pull-right"><?php echo $hddday;?></span></td>
          <td>Wind Run This Month: <span class="pull-right"><?php echo $windruntodatethismonth;?></span></td>
          <td>3 Hr Trend:  <span class="pull-right"><?php echo $pressuretrendname3hour;?></span></td>
        </tr>         
        <tr>
          <td>Heating for this Month:  <span class="pull-right"><?php echo $hddmonth;?></span></td>
          <td style="background-color:#000000; color=white;"colspan="2"><font style="color: #ffffff;">Almanac</font></td>
        </tr>
        <tr>
          <td>Heating for this year:  <span class="pull-right"><?php echo $hddyear;?></span></td>
          <td>Sunrise: <span class="pull-right"><?php echo $sunrise;?></span></td>
          <td>Moonrise:  <span class="pull-right"><?php echo $moonrise;?></span></td>
        </tr> 
        <tr>
          <td>Cooling Today:  <span class="pull-right"><?php echo $cddday;?></span></td>
          <td>Sunset: <span class="pull-right"><?php echo $sunset;?></span></td>
          <td>Moonset:  <span class="pull-right"><?php echo $moonset;?></span></td>
        </tr> 
        <tr>
          <td>Cooling this month:  <span class="pull-right"><?php echo $cddmonth;?></span></td>
          <td>Length of Day: <span class="pull-right"><?php echo $hoursofpossibledaylight;?></span></td>
          <td>Moon Phase:  <span class="pull-right"><?php echo $moonphasename;?></span></td>
        </tr> 
        <tr>
          <td>Cooling this year:  <span class="pull-right"><?php echo $cddyear;?></span></td>
          <td>Change in Day Length:  <span class="pull-right"><?php echo $changeinday;?></span></td>
          <td>Full Moon Date: <span class="pull-right"><?php echo $fullmoondate;?></span></td>
        </tr> 
      </table>
    </div>
    <div class="span4 pull-right">
      <h3>Regional Radar View</h3>
      <img src="http://icons.wunderground.com/data/640x480/2xradard3.gif"/>
      <h3>Fronts and Gradients</h3>
      <img src="http://icons-ak.wxug.com/data/640x480/2xsp_sf.gif"/>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span3">
      <h3>Comal County Rain Map</h3>
      <a href="http://cocorahs.org/Maps/GetMap.aspx?state=TX&county=CML&type=precip"><img src="http://cocorahs.org/Maps/GetMap.aspx?state=TX&county=CML&type=precip"/></a><br/>Click for Larger Version
    </div>
    <div class="span3">
      <h3>Yesterday's Weather Data</h3>
      <table class="table table-condensed table-bordered" style="tr:hover td,tr:hover th {background-color: inherit;}">
        <tr>
          <td>Maximum Temperature:  <span class="pull-right"><span class="label label-important"><?php echo $maxtempyest;?></span><font style="font-size: 7pt;"> (<?php echo $maxtempyestt;?>)</font><span></td>
        </tr>
        <tr>
          <td>Minimum Temperature:  <span class="pull-right"><span class="label label-info"><?php echo $mintempyest;?></span><font style="font-size: 7pt;"> (<?php echo $mintempyestt;?>)</font><span></td>
        </tr>
        <tr>
          <td>Maximum Heat Factor:  <span class="pull-right"><span class="label label-important"><?php echo $maxheatyest;?></span><span></td>
        </tr>
        <tr>
          <td>Maximum Dewpoint:  <span class="pull-right"><span class="label label-success"><?php echo $maxdewyest;?></span><font style="font-size: 7pt;"> (<?php echo $maxdewyestt;?>)</font><span></td>
        </tr>
        <tr>
          <td>Minimum Dewpoint:  <span class="pull-right"><span class="label label-success"><?php echo $mindewyest;?></span><font style="font-size: 7pt;"> (<?php echo $mindewyestt;?>)</font><span></td>
        </tr>
        <tr>
          <td>Rain:  <span class="pull-right"><?php echo $yesterdayrain;?><span></td>
        </tr>
        <tr>
          <td>Maximum Gust:  <span class="pull-right"><?php echo $maxgustyest;?><span></td>
        </tr>
        <tr>
          <td>Maximum Average Wind:  <span class="pull-right"><?php echo $maxaverageyest;?><span></td>
        </tr>
      </table>
    </div>
    <div class="span3">
       <script type="text/javascript"><!--
        google_ad_client = "ca-pub-6991471741674731";
        /* Weather Web Ad - Square */
        google_ad_slot = "2424567121";
        google_ad_width = 200;
        google_ad_height = 200;
        //-->
      </script>
      <script type="text/javascript"
       src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
      </script>
    </div>
    <div class="span3">
      <h3>General Stats</h3>
      <table class="table table-condensed table-bordered" style="tr:hover td,tr:hover th {background-color: inherit;}">
        <tr>
          <td>Fire Weather Index:  <span class="pull-right"><?php echo $firewi;?><span></td>
        </tr>
        <tr>
          <td>Air Density:  <span class="pull-right"><?php echo $airdensity;?><span></td>
        </tr>
        <tr>
          <td>Cloud Height:  <span class="pull-right"><?php echo $cloudheightfeet;?><span></td>
        </tr>
        <tr>
          <td>Battery Level:  <span class="pull-right"><?php echo $vpconsolebattery;?><span></td>
        </tr>
        <tr>
          <td>Reception:  <span class="pull-right"><?php echo $vpreception2;?><span></td>
        </tr>
        <tr>
          <td>Status:  <span class="pull-right"><?php echo $vpisstatus;?><span></td>
        </tr>
      </table>
<?php include_once("footer.php");?>
