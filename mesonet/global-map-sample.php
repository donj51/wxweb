<?php
// Settings
  $condIconsDir = './MESO-images/';
  $doLinkTarget = true; // =true to add target="_blank" to links in popups
  $netLinksPath = './';  // relative path for including the network links files
//end settings
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Global Affiliated Regional Weather Networks</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $googleKey; ?>" type="text/javascript"></script>
    <script src="ClusterMarker.js" type="text/javascript"></script>
    <script src="mapiconmaker.js" type="text/javascript"></script>
    <script src="HtmlControl.js" type="text/javascript"></script>
    <script src="global-conditions-json.php" type="text/javascript"></script>
<style type="text/css">
body {
  color: black;
  background-color: #F3F2EB;
  font-family: verdana, helvetica, arial, sans-serif;
  font-size: 73%;  /* Enables font size scaling in MSIE */
  margin: 0;
  padding: 0;
}

html > body {
  font-size: 9pt;
}

#page {
        margin: 20px auto;
        color: black;
        background-color: white;
        padding: 0 0 0 2em;
        width: 800px;
        border: 1px solid #959596;
}

.htmlControl
{
	border:solid black 1px;
	background-color:white;
	color:black;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	text-align:center;
}

.htmlButton
{
	cursor:pointer;
	margin:1px;
	padding:1px;
}
</style>
<?php
	print '<script type="text/javascript">';
	print "\n var doLinkTarget = ";
	print $doLinkTarget?'true':'false';
	print "; // generate links with target=\"_blank\"\n\n";
	print "</script>\n";
?>
</head>
<body onunload="GUnload()">
<div id="page">
<h1>Global Station Map of Affiliated Weather Networks</h1>
  
    <div id="map" style="width: 620px; height: 480px"></div>

    <noscript><p><b>JavaScript must be enabled in order for you to use Google Maps.</b> 
      However, it seems JavaScript is either disabled or not supported by your browser. 
      To view Google Maps, enable JavaScript by changing your browser options, and then 
      try again.</p>
    </noscript>
 
    <script type="text/javascript">
    //<![CDATA[
    var condIconsDir = '<?php echo $condIconsDir; ?>';
    if (GBrowserIsCompatible()) {
      var n=0;
      var icon = new GIcon();
      icon.image = condIconsDir+"mm_20_red.png";
      icon.shadow = condIconsDir+"mm_20_shadow.png";
      icon.iconSize = new GSize(12, 20);
      icon.shadowSize = new GSize(22, 20);
      icon.iconAnchor = new GPoint(6, 20);
      icon.infoWindowAnchor = new GPoint(5, 1);      

      var iconblue = new GIcon(icon,condIconsDir+"mm_20_blue.png"); 
      var icongreen = new GIcon(icon,condIconsDir+"mm_20_green.png"); 
      var iconyellow = new GIcon(icon,condIconsDir+"mm_20_yellow.png"); 


      function createMarker(point,name,html,icon) {
        var marker = new GMarker(point, {icon:icon});
        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html, {maxWidth:250});
        });
        return marker;
      }

		var markersArray=[];
          
        for (var i = 0; i < data.markers.length; i++) {
          // obtain the attribues of each marker
		  /*
		   {"town":"Swakopmund, Erongo, Namibia, Africa",
		   "lat":"-22.679005",
		   "long":"14.531050",
		   "surl":"other.weather.namsearch.com/swakop/wxindex.php",
		   "fcode":"cam",
		   "nets":"NAMWN",
		   "conds":"fog.gif,Fog,13 C,90%,12 C,WSW,0 kmh,,0.0 mm,1019.2 hPa,Steady"}
		  */
          var lat = parseFloat(data.markers[i].lat);
          var lng = parseFloat(data.markers[i].long);
          var point = new GLatLng(lat,lng);
          var town = data.markers[i].town;
		  var stationURL = "http://"+data.markers[i].surl;
		  var rawnets = data.markers[i].nets;
		  var nets = gen_netlinks(rawnets);
		  var fcode = data.markers[i].fcode;
          var features = gen_features(fcode);
		  var rawconds = data.markers[i].conds;
		  var conds = gen_conds(rawconds);
          // use different gicons for each type of station
		  var tgt = '';
		  if(doLinkTarget) {tgt = ' target="_blank"'; }
		  var popupHtml = "<small><a href=\""+stationURL+"\""+tgt+">"+town+"</a><br/>"+features+" Nets: "+nets+"<br clear=\"left\"/><hr/></small>"+
		  conds+"<br/>&nbsp;<br clear=\"left\"/>"
          if (fcode == 'all') {
             var marker = createMarker(point,town,popupHtml,icon);
			 features = "<img src=\""+condIconsDir+"feat_all.jpg\" alt=\"Weather, Lightning, WebCam\" title=\"Weather, Lightning, WebCam\" align=\"left\" />";
             markersArray.push(marker);
          }
          else if (fcode == 'lgt') {
             var marker = createMarker(point,town,popupHtml,iconyellow);
			 features = "<img src=\""+condIconsDir+"feat_li.jpg\" alt=\"Weather, Lightning\" title=\"Weather, Lightning\" align=\"left\" />";
             markersArray.push(marker);
          }
          else if (fcode == 'cam') {
             var marker = createMarker(point,town,popupHtml,icongreen);
			 features = "<img src=\""+condIconsDir+"feat_cam.jpg\" alt=\"Weather, WebCam\" title=\"Weather, WebCam\" align=\"left\" />";
             markersArray.push(marker);
          }
          else {
             var marker = createMarker(point,town,popupHtml,iconblue);
			 features = "<img src=\""+condIconsDir+"feat_we.jpg\" alt=\"Weather\" title=\"Weather\" align=\"left\" />";
             markersArray.push(marker);
          }
        }

        // Display the map, with some controls and set the initial location 

        var map = new GMap2(document.getElementById("map") ,
             { size: new GSize(620,480) } );
		map.addControl(new GMapTypeControl(), new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(7, 7)));
		map.addControl(new GLargeMapControl(), new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(7, 28)));
		map.addControl(new GScaleControl());
		cluster=new ClusterMarker(map, { markers:markersArray } );
		cluster.fitMapToMarkers();
		map.setCenter(new GLatLng(29.67,-98.11), 6, G_NORMAL_MAP);
		//	add an HtmlControl to enable toggling of the ClusterMarker cluster function
		//	see http://googlemapsapi.martinpearman.co.uk/htmlcontrol for more info on HtmlControl
		var html='<div class="htmlControl" style="padding:0px 3px 3px 3px">Enable clustering: <input type="checkbox" checked="checked" onclick="toggleClustering()" /></div>';
//		'Show USA Radar: <input type="checkbox" checked="checked" onclick="toggleUSARadar(showUSARadar)" /></div>';
		var control=new HtmlControl(html);
		map.addControl(control, new GControlPosition(G_ANCHOR_TOP_LEFT, new GSize(7,7)));
    }

    // display a warning if the browser was not compatible
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }
  
function toggleClustering() {
	cluster.clusteringEnabled=!cluster.clusteringEnabled;
	cluster.refresh(true);	//	true required to force a full update of the markers - otherwise the update would occur next time that the map is zoomed or the active markers change
}

function gen_features(fcode) {
	// generate HTML for features based on fcode (only four options there)
	var features = '';
	      if (fcode == 'all') {
			 features = "<img src=\""+condIconsDir+"feat_all.jpg\" alt=\"Weather, Lightning, WebCam\" title=\"Weather, Lightning, WebCam\" align=\"left\" />";
          }
          else if (fcode == 'lgt') {
			 features = "<img src=\""+condIconsDir+"feat_li.jpg\" alt=\"Weather, Lightning\" title=\"Weather, Lightning\" align=\"left\" />";
          }
          else if (fcode == 'cam') {
			 features = "<img src=\""+condIconsDir+"feat_cam.jpg\" alt=\"Weather, WebCam\" title=\"Weather, WebCam\" align=\"left\" />";
          }
          else {
			 features = "<img src=\""+condIconsDir+"feat_we.jpg\" alt=\"Weather\" title=\"Weather\" align=\"left\" />";
          }
  return(features);
}

function gen_netlinks(rawnets) {
	// generate HTML for network links based on rawnets net membership
	var nets = rawnets.split(',');
	var netHtml = '';
	var tgt = '';
	if(doLinkTarget) {tgt = ' target="_blank"'; }
	// JSON "AKWN":{"name":"Alaskan Weather Network","url":"http://alaskanweather.net/","short":"Alaska","region":"USA","units":"F,mph,inHg,in,ft"}
	for (var i = 0;i<nets.length;i++) {
		var net = nets[i];
		netHtml += "<a href=\""+data.nets[net]['url']+"\" title=\""+data.nets[net]['name']+"\""+tgt+">"+data.nets[net]['short']+"</a> ";
	}
	
	return(netHtml);
}

function gen_conds(rawconds) {
	// generate HTML from the rawconds JSON input
	// 'day_partly_cloudy.gif,Partly Cloudy,78 F,67%,66 F,ENE,10 mph,11,0.00 in,29.94 inHg,Steady'
	//   0                     1             2    3  4    5   6       7  8       9          10
	
  var conds = rawconds.split(',');
  if (conds[0] == 'Offline') {
	  return ("<small>Conditions not available.</small>");
  }

  // var condsHtml = rawconds;
  
  var condsHtml = '<small>';
  var testPattern = /.gif$/;
  if (testPattern.test(conds[0]) && condIconsDir) {
    condsHtml += "<img src=\""+condIconsDir+conds[0]+"\" height=\"25\" width=\"25\" alt=\""+conds[1]+"\" title=\""+conds[1]+"\" align=\"left\" /> "+conds[1]+" <br clear=\"left\"/> ";
  } else {
    condsHtml += "";
  }
  
    condsHtml += "Temp: <b>"+conds[2]+"</b>, Hum: <b>"+conds[3]+"</b>,";
  if(conds[4] != '') {
    condsHtml += " DewPT: <b>"+conds[4]+"</b>";
  }
  condsHtml += "<br/>";
  
  condsHtml += "Wind: ";
  
  if (conds[5] == '') {
    condsHtml += "n/a "; 
  } else {
    condsHtml += "<b>"+conds[5]+"</b> <img src=\""+condIconsDir+conds[5]+".gif\" height=\"14\" width=\"14\" alt=\"Wind from "+conds[5]+"\" title=\"Wind from "+conds[5]+"\" />";
    condsHtml +=  " <b>"+conds[6]+"</b>, ";
	if(conds[7] != '') {condsHtml +=  "Gust: <b>"+conds[7]+"</b>, ";}
  }

  condsHtml += "Rain: <b>"+conds[8]+"</b><br/>";
  
  condsHtml += "Baro: <b>"+conds[9]+"</b> ("+conds[10]+")";

  condsHtml += "</small>";
  return(condsHtml)
}
    //]]>
    </script>
    
<p><small>[<img src="<?php echo $condIconsDir; ?>mm_20_red.png" height="20" width="12" alt="Weather, Webcam, Lightning" style="vertical-align:middle"/>] Weather, Lightning, WebCam, 

[<img src="<?php echo $condIconsDir; ?>mm_20_yellow.png" height="20" width="12" alt="Weather, Lightning" style="vertical-align:middle"/>] Weather, Lightning,

[<img src="<?php echo $condIconsDir; ?>mm_20_green.png" height="20" width="12" alt="Weather, Webcam" style="vertical-align:middle"/>] Weather, WebCam, 

[<img src="<?php echo $condIconsDir; ?>mm_20_blue.png" height="20" width="12" alt="Weather"  style="vertical-align:middle"/>] Weather</small></p>

  <h3>About the Global Map</h3>
<p>This <a href="http://maps.google.com/">Google Map</a> shows the locations of current affiliated regional weather network member stations.</p>
<p>Green markers with numbers indicate clusters of stations - click to zoom the map to show station markers.
If you click on a marker for a station, a descriptive window will open and show the station features,
a link to the station's homepage, the regional network affiliations for the station, 
and current conditions at the station (where available).</p>
<p>Click on the home button in the map navigation controls to restore the map to the initial zoom level.<br/>
Click on the "Enable clustering" check box to toggle the clustering of stations display.</p>
<h3>Affiliated Regional Weather Networks</h3>

<?php
   include_once($netLinksPath."get-links.php");
   print "<p>"; include($netLinksPath."member-count.txt"); print "</p>\n";
   include($netLinksPath."network-list-inc.html"); ?>

<p><small>Map data from <a href="http://www.northamericanweather.net/">Affiliated Regional Networks</a> and scripts from
<a href="http://saratoga-weather.org/">Saratoga-Weather.org</a>.<br/>
If you have a personal weather station publishing to a personal weather website, you can submit a request to have your
data included in this display by visiting the network for your geography from the list above.</small></p>
</div>
</body>
</html>
