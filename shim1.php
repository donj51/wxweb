  <div class="row-fluid">
    <div class="span2 visible-desktop">
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
      <a href="http://www.tfma.org"><img src="/img/tadd.gif"/></a>
      <a href="http://www.cocorahs.org"><img src="/img/cocorahs.jpg"/></a>
      <a href="http://www.srh.noaa.gov/ewx"><img src="/img/NWS_Logo.png"/></a>
      <a href=""><img src="/img/skywarn.gif"/></a>
    </div>
    
    
    <!-- Mobile Version-->
    <div class="span12 hidden-desktop">
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
    <div class="span10">
