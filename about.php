<?php
$title = 'About This Site';
include_once("header.php");
include_once("shim1.php");
?>
<h2>About This Site</h2>

<h3>About Jeffrey</h3>
<p>I'm a former Environmental Engineer (now computer professional) who has had an interest in weather,
storms, and flooding for many years.  I've completed the requirements to be a storm spotter for the National
Weather Service, am a member of the Rain Net on the San Antonio 146.94 repeater during storm events, report
rainfall data via CoCoRAHS, and share data with Weather Underground (and others) for the past decade and more.
I'm also a Certified Floodplain Manager and am a Texas Professional Engineer.</p>
<p>More information about me can be found on my Personal and Networking blogs listed under the Website Menu.</p>


<h3>Technical Details</h3>

<p>This station is powered by a Vantage Vue weather station mounted in a field located on County Line Road.
It is situated at least 150 feet from any obstruction that could impact the wind speed or direction.  As this
site is located on the tallest hill on the southeast side of New Braunfels, the wind speeds tend to be higher
than at other locations around town.  In addition, this additional wind also tends to temper the temperature
extremes. </p>

<a class="btn btn-info" data-toggle="modal" href="#currentstation" >See Current Weather Station</a>

<div class="modal hide" id="currentstation">
<img src="https://lh4.googleusercontent.com/-aHAHatXFIuc/TxCs0xzAhFI/AAAAAAAAJT8/hryBBCKqcvY/s811/12+-+3"/>
</div>
<p> </p>
<h3>Site History</h3>

<p>There has been a weather station on these premises since late 1999.  The first station was a custom built
AAG One-Wire Weather station that was wired to a computer system.  This station was retired in 2003 due to
damages as a result of a lightning static discharge.  This system was replaced with a Davis Vantage Pro
wireless weather station that functioned until this past January when the ISS and solar panel had failure.
In 2007, Davis Instruments had replaced my original Vantage Pro with a similar refurbished Vantage Pro2 due
to technical problems with my original model.  In January, I replaced the outdoor unit with a Vantage Vue
all-in-one solution (and kept the original components inside) which is currently functioning.</p>


<a class="btn btn-info" data-toggle="modal" href="#oldstation" >See Vantage Pro Weather Station</a>
<div class="modal hide" id="oldstation">
<img src="https://lh6.googleusercontent.com/-iS2vXMvhsQ0/TxCs1X7-fWI/AAAAAAAAJUc/Kv0IJribxBY/s608/12+-+5"/>
</div>
<p> </p>
<h3>Data Services</h3>

<p>Data from my station is supplied to the following organizations:</p>
<ul>
  <li>Weather Underground</li>
  <li>CWOP Program (through the APRS system) - N5SNT-2<li>
  <li>MidSouth Mesonet</li>
</ul>

<?php include_once("footer.php");
