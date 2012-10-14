<?php
// By Scott Thompson from Webster Weather LIVE!
// Version 6.00 10-Nov-2010 - Initial Version 6 release
// Version 6.01 14-Nov-2010 - Changes to remove snow season months and add more choices to display
// Version 6.20 25-Jun-2011 - Changes to remove some configuration confusion and add abilities for future
// Version 6.50 13-Nov-2011 - Change to add LEAF and SOIL measurements option.
// Configuration for Alternative Ajax-Dashboard6.php
//
// Important!  All file paths are in relation to the web root folder.  See Below.
//
// Settings for Feels Like Section (FUTURE ADDITION ***ONLY ONE OF THE FOLLOWING TWO MUST BE TRUE!!!)
$useFL     = true;            // Set to false if you do not want to show the "Feels Like" colored word under the Temperature
$useHC     = false;           // Set to true if you want to show Heat Index and Wind Chill here instead
//
// Settings for FIRE INDEX - TOP ROW UNDER FORECAST     (***ONLY ONE OF THE FOLLOWING MUST BE TRUE!!!)
$useFWI    = false;           // Set to true to display Fire Weather Index
                              // (MUST BE FALSE IF CHANDLER BURNING INDEX IS ON!!!)
$useCBI    = true;            // Set to true to display Chandler Burning Index
                              // (MUST BE FALSE IF FIRE WEATHER INDEX IS ON!!!)

//  Settings for THIRD SECTION - SECOND COLUMN  (***ONLY ONE CAN BE SET TO TRUE!!!!)

$useLIGT   = false;            // set to true to show lightning counts when there is no snow on the ground.
                              // (if true, Snow must be false)
$useSNOW   = false;           // Normally always FALSE unless you don't have Lightning and this will force snow here.
                              // Snow will over-ride the lightning section if you have snow on the ground.

// Settings for LAST ROW - COLUMN TWO     (***ONLY ONE OF THE FOLLOWING SHOULD BE TRUE!!!!)
$useET     = false;            // Set to true if you want ET to show *AND* you have solar!!!
                              // (ET Does NOT calculate if you don't have solar!!)
$useBCH    = false;           // Set to true if you don't want ET or don't have solar and can't show ET.
                              // It will put in a blank colum heading and a blank column.
$useDNT    = true;           // Set to true if you don't want ET or don't have solar and can't show ET.
                              // But want to use the DONATION option for the column instead
                              // NOTE if all three are false, nothing will display and your headings will be messed up.
                              // If more then one are ture, you will have one messed up display!
$useSNOW2  = false;           // set to false to never show snow here section (if true, $useDONATE below must be false or the display will be screwed up!)
                              // NORMALLY not ever true as SNOW is in row 3 Column 2 normally


//  NOTE if both FWI and CBI are false, nothing will display.  If both are ture, you will have one messed up display!

$FireImage   = 'gif';         // Set to match the images you have for the Fire Index (jpg, gif, png)
$useCloudImg = true;          // Set to true to replace Outlook to Bashewa Weather's Cloud-base Image routines

$useWU     = true;            // set to false if you do not want to use "new record High/low" image
                              // based on Weather Underground Records.  (Setup WU under View, Wunderground Almanac) UseSRS
                              // must be set to false if you use this setting!
$useAQI    = true;            // Must be set to true if using Air Quality Index, set to False to leave blank or put in your own code!
$coolVal   = '65';            // Temperature to Switch view to Cooling Degree Days rather then Heating usually 18.33C or 65F
$useVPfc   = false;           // Set to true if you wish to display the Vantage Pro Forecast
$useEXTf   = true;            // Set to false to not display the extra forecast days
$useVPst   = true;            // Set to false to not display Vantage Pro status messages below snow section.
$use1WIR   = true;            // Set to false if you use NexStorm lightning detection rather then 1-wire.
$useNEX    = false;           // Set to true to display NexStorm's Distance and direction of last strike.
$useLEAF   = false;            // Set to true to display LEAF #1 Moisture readings.
$useSOIL   = false;            // Set to true to display SOIL moisture.
$SOILcnt   = '4';             // Set to number of soil moisture/temp sensor pairs you have in use (0-4)
$SOILlvl1  = '4';             // Set to the level of your first soil probe (shallowest)
$SOILlvl2  = '10';            // Set to the level of your second soil probe     |
$SOILlvl3  = '18';            // Set to the level of your third soil probe      V 
$SOILlvl4  = '36';            // Set to the level of your fourth soil probe (Deepest)
$uomMoist  = ' cb';           // Unit of measure for moisture in soil (cb or Kpa).  Default is cb = centibar (Include space before)
$wrHeight = '74';             // windrose graphic height=  (default is 74)
$wrWidth  = '74';             // windrose graphic width=   (default is 74)
$SStartYr = '2005';           // Year station first started collecting data.  (ie: 2007)
$showSnowTemp  = '33';	      // display Snow instead of Rain when temp (F) is <= this temperature.
$useDONATE = true;            // Set to true and fill in the paypal setting in the main script to use a donation button under
                              // the ET section.  Make sure this is FALSE if you have useDNT set to TRUE above or
                              // If using SNOW2 in place of ET, this MUST be FALSE!!!!
$useSTAhilo = false;           // Set to True for Station High/Low (Must have 2 years data to use) or False for WU High/Low
$MonDayOnlyFormat = 'M-d';    // Set to M-d for USA, d-M for Most other areas
                              // NOTE:  Be sure the $dateOnlyFormat setting in about line #74 of the main code is set
                              // for the correct date format for your country too!
// optional settings for the Wind Rose graphic in ajaxwindiconwr as wrName . winddir . wrType
$wrName        = 'wr-';              // first part of the graphic filename (followed by winddir to complete it)
$wrType        = '.png';             // extension of the graphic filename
$wrCalm        = 'wr-calm.png';      // set to full name of graphic for calm display ('wr-calm.gif')
//
//  NOTE:  The following are the footnotes specified in the code.  Replace each footnote with your wording.
//         The text here is NOT translated so be sure to put it in your language!

$Foot1    = 'Rain season: Jan 1st to Dec 31st';  // Rain season is usually Jan-Dec
$Foot2    = 'Snow season July 1st to June 30th'; // Snow season is usually July to June or Jan to Dec
$Foot3    = 'Snow manually measured usually around 7AM and 7PM';  // What times you measure snow
$Foot4    = 'Updated at Noon Central Time';  // Time ET is updated.  In WD it is at NOON!
//           Footnote 5 is the description of the Irrigation Index
$Foot5    = 'Estimated amount of water needed to replace the water used by plants and evaporation from the past week. (Negative numbers mean amount of water needed, positive numbers mean excess water is present.)';
//           Footnote 6 is the description of the Air Quality Index.  Be sure to give credit to the agency you get your reading from!
$Foot6    = 'Air Quality Index is provided by Texas Commission on Enviornmental Quality (TCEQ).';
$Foot7    = 'Leaf Wetness is surface moisture on foliage.  0 being totally dry and 15 being totally saturated.';
$Foot8    = 'Soil moisture and temperatures are from sensors burried in the ground at the levels specified.';
?>
