SettingsVersion = "9.13";
SettingsDate    = "16-Jan-2011";
function loadSettings () {
/* --------------------- ajaxWDwx.js Setup File -------------------------------*\
|  Uncomment those you need to change. All values are set to their defaults.    |
|  You only need to keep those you have changed. The rest can be deleted.       |
|  See how I've done it here: http://www.bashewa.com/ajaxWDwx-settings-bws.js   |
|  Read notes in ajaxWDwx.js                                                    |
\* ----------------------------------------------------------------------------*/
wxStation.problemNr= 0; // select problem from below
wxStation.problemMsg[0] = 'No problems';
wxStation.problemMsg[1] = '<b style="color:red">...your msg here...</b><br />...your msg here...<br />';
wxStation.problemMsg[2] = '<b style="color:red">Note: our station is currently out of order.</b><br />We hope to have it up and running by next week.<br />';
wxStation.problemMsg[3] = '<b style="color:red">Note: our anemometer is currently frozen.</b><br />Wind speed and direction may be affected.<br />';
wxStation.problemMsg[4] = '<b style="color:red">Note: our UV meter is currently out of order.</b><br />We hope to have it fixed in due cause.<br />';
//wxStation.stopUpdates = false;
//wxStation.showAlert   = false;
//wxStation.useTag      = "ajaxindicator"; // or "ajaxProblems" or whatever
// -----------------------------------------------------------------------------

useUOM  = 'E';
showUOM = true;
clientrawFile = './clientraw.txt';
MultilingualSystem = true; // if false activates translation below

update.reloadTime  = 30000; // can not be less than 5000 (5 sec)
update.maxupdates  = 250;
update.showRefresh = true;

flash.color = '#000000';
flash.red   = '#000000';
flash.time  = 2000;


imgDir = '/img/ajax/';


// NOTE: do not delete any of the words enclosed in {} in the src parts eg. {PIC}
//       They'll get replaced by their corresponding values later in the script.


wxIcon.src    = imgDir+"{PIC}.jpg"; // replacements: {PIC}=[skc|nskc..sunset], {NR}=[0..37], {0NR}=[00..37],
wxIcon.width  = 55;
wxIcon.height = 58;
wxIcon.useName= 1; // 0=Anole ,1=NWS, 2=YoWindow, 9=Dynamic
//wxIcon.hspace = 0;
//wxIcon.vspace = 0;
//wxIcon.border = 0;
//wxIcon.style  = "";
//wxIcon.align  = "";
//wxIcon.useTag = "ajaxconditionicon2";


wrImg.src     = imgDir+"wr-{LANG}{DIR}.png"; // replacements: {LANG}=[af-..sv-}, {DIR}=[N..NNW]
wrImg.width   = 58;
wrImg.height  = 58;
//wrImg.hspace  = 0;
//wrImg.vspace  = 0;
//wrImg.border  = 0;
//wrImg.style   = "";
//wrImg.align   = "";
//wrImg.lang    = "";     // {LANG} eg. 'nl' i.e. initial icon set
//wrImg.calm    = "calm"; // {DIR}
//wrImg.xlate   = true;   // translate wind direction for icon names (multilingual system)
//wrImg.useTag  = "ajaxwindiconwr";


fireImg.src   = imgDir+"Fire{IMGNR}.png"; // replacements: {IMGNR}=[0|16|25|31|32] or your specification below
fireImg.width = 60;
fireImg.height= 65;
//fireImg.hspace= 0;
//fireImg.vspace= 0;
//fireImg.border= 0;
//fireImg.style = "border: 2px solid silver;";
//fireImg.align = "";
//fireImg.imgNrs[0]= "0"; // {IMGNR} = very low
//fireImg.imgNrs[1]="16"; // {IMGNR} = low
//fireImg.imgNrs[2]="25"; // {IMGNR} = moderate
//fireImg.imgNrs[3]="31"; // {IMGNR} = high
//fireImg.imgNrs[4]="32"; // {IMGNR} = extreem
//fireImg.useTag   = "ajaxfireimg";


thermometerImg.src   = "./thermometer.php";
thermometerImg.width = 54;
thermometerImg.height= 170;
//thermometerImg.hspace = 0;
//thermometerImg.vspace = 0;
//thermometerImg.border = 0;
//thermometerImg.style  = "border: 2px solid silver;";
//thermometerImg.align  = "";
//thermometerImg.useTag = "ajaxthermometer";


cloudImg.src    = "./cloud-base.php";
cloudImg.width  = 100;
cloudImg.height = 200
//cloudImg.hspace = 0;
//cloudImg.vspace = 0;
//cloudImg.border = 0;
//cloudImg.style  = "border: 2px solid silver;";
//cloudImg.align  = "";
//cloudImg.stationAlt = 0;
//cloudImg.useTag = "ajaxcloudheightimg";


uvImg.src     = imgDir+"uv{INDEX}.gif"; // replacements: {INDEX}=[0..18]
uvImg.width   = 34;
uvImg.height  = 65;
//uvImg.hspace  = 0;
//uvImg.vspace  = 0;
//uvImg.border  = 0;
//uvImg.style   = "";
//uvImg.align   = "";
//uvImg.useTag  = "ajaxuvimg";


moonImg.src   = imgDir+"moon/{BG}/{NS}-moon{AGE}.gif"; // replacements: {BG}=[w=white|b=black], {NS}=[NH|SH], {AGE}=[00..27]
moonImg.bg    = "w"; // {BG} = [ w | b ]
moonImg.width = 50;
moonImg.height= 50;
//moonImg.hspace= 0;
//moonImg.vspace= 0;
//moonImg.border= 0;
//moonImg.style = "";
//moonImg.align = "";
//moonImg.useTag= "ajaxmoonimg";


webcamImg.src   = imgDir+"webcam/snap00.jpg";
webcamImg.srcNgt= imgDir+"webcam/snap00.jpg";
webcamImg.width = 170;
webcamImg.height= 127;
//webcamImg.hspace= 0;
//webcamImg.vspace= 0;
//webcamImg.border= 0;
//webcamImg.style = "border: 2px solid silver;";
//webcamImg.align = "";
//webcamImg.webcamUpdate = 5; // minutes
//webcamImg.swapIconWithWebcam = false;
//webcamImg.useCamAtNight = false;
//webcamImg.delayDayNight = 15; // wait after sunrise / before sunset
//webcamImg.useTag  = "ajaxwebcamimg";


//tideImg.src     = "./tides.php";
//tideImg.width   = 150;
//tideImg.height  = 150;
//tideImg.hspace  = 0;
//tideImg.vspace  = 0;
//tideImg.border  = 0;
//tideImg.style   = "";
//tideImg.align   = "";
//tideImg.interval = 5; // image update interval in minutes (0=no updates)
//tideImg.useTag  = "ajaxtideimg";



// ENGLISH UOM ---------------
//imperialUOM.Temp = '&deg;F';
//imperialUOM.Wind = 'mph';
//imperialUOM.Baro = 'inHg';
//imperialUOM.Rain = 'in';
//imperialUOM.Snow = 'in';
//imperialUOM.Alti = 'ft';
//imperialUOM.Dist = 'miles';
//imperialUOM.Deg  = '&deg;';
//imperialUOM.dateFmt = "m/j/Y";
//imperialUOM.timeFmt = "g:i:s a";
//imperialUOM.timeHM  = "g:i a";

// English decimal places
//imperialDP.Temp = 1;
//imperialDP.Wind = 1;
//imperialDP.Baro = 2;
//imperialDP.Rain = 2;
//imperialDP.Snow = 2;
//imperialDP.Alti = 0;
//imperialDP.Dist = 2;
//imperialDP.UV   = 0;


// METRIC UOM --------------
//metricUOM.Temp = '&deg;C';
//metricUOM.Wind = 'kph';
//metricUOM.Baro = 'hPa';
//metricUOM.Rain = 'mm';
//metricUOM.Snow = 'cm';
//metricUOM.Alti = 'm';
//metricUOM.Dist = 'km';
//metricUOM.Deg  = '&deg;';
//metricUOM.dateFmt = "j-M-Y";
//metricUOM.timeFmt = "H:i:s";
//metricUOM.timeHM  = "H:i";

// Metric decimal places
//metricDP.Temp = 1;
//metricDP.Wind = 1;
//metricDP.Baro = 0;
//metricDP.Rain = 1;
//metricDP.Snow = 0;
//metricDP.Alti = 0;
//metricDP.Dist = 2;
//metricDP.UV   = 0;



//==============================================================================
//                            I M P O R T A N T                                .
//           Y O U   C A N   D E L E T E   T H E   F O L L O W I N G           .
//      You can DELETE Language Translation section below if you're using      .
//      the Saratoga Multilinual system or if you are using English only.      .
//        Otherwise do the translation into your required language below       .
//           and set variable "MultilingualSystem" above to false.             .
//==============================================================================


//==============================================================================
//                          LANGUAGE TRANSLATION                               .
//     O N L Y   N E E D E D   F O R   S T A N D A L O N E   S Y S T E M S     .
// =========================================================================== .
// You don't need to customize this area if you're using English or if you're  .
// using the Canada/World Mutilingual templates. Instead change your language  .
// in "Settings.php" i.e. $SITE['lang']='nl';                                  .
// If translations are incorrect then edit the "language-??.js" files.         .
//==============================================================================
if (!MultilingualSystem) {
langRestart  = 'Restart live updates';
langRefresh  = 'REFRESH'; // RESTART
langPauseMsg = 'Updates paused';

langMonths   = new Array ("January","February","March","April","May","June","July","August","September","October","November","December");
langDays     = new Array ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
langDaySuf   = new Array ("st","nd","rd","th"); // day suffix as in 1st, 2nd, 3rd, 4th
langAM_PM    = new Array ("am","pm","AM","PM");
langWindUOM  = new Array ("kts", "mph", "km/h", "m/s");

langBaroTrend = new Array (
    "Steady", "Rising Slowly", "Rising Rapidly", "Falling Slowly", "Falling Rapidly");

langUVWords = new Array (
    "None", "Low", "Medium", "High", "Very&nbsp;High", "Extreme", "Unknown" );

langBeaufort = new Array ( /* Beaufort 0 to 12 in array */
    "Calm", "Light air", "Light breeze", "Gentle breeze", "Moderate breeze", "Fresh breeze",
    "Strong breeze", "Near gale", "Gale", "Strong gale", "Storm", "Violent storm", "Hurricane");

langWindDir = new Array( /* used for alt and title tags on wind dir arrow and wind direction display */
    "N", "NNE", "NE", "ENE",
    "E", "ESE", "SE", "SSE",
    "S", "SSW", "SW", "WSW",
    "W", "WNW", "NW", "NNW");

langWindCalm = 'Calm';
langGustNone = 'None';
langWindFrom = 'Wind from '; /* used on alt/title tags on wind direction arrow*/

langThermoCurrently = 'Currently: '; /* used on alt/title tags for thermometer */
langThermoMax = 'Max: ';
langThermoMin = 'Min: ';

langTempRising    = 'Warmer %s'; /* used for trend arrow alt/title tags .. %s marks where value will be placed */
langTempFalling   = 'Colder %s';
langTempLastHour  = ' than last hour.';
langTempYesterday = ' than same time yesterday.';

langBaroRising    = 'Rising %s '; /* used for trend arrow alt/title tags .. %s marks where value will be placed */
langBaroFalling   = 'Falling %s ';
langBaroPerHour   = '/hour.'; /* will be assembled as rising/falling + value + uom + perhour text */

langHeatWords = new Array (
    'Unknown', 'Extreme Heat Danger', 'Heat Danger', 'Extreme Heat Caution', 'Extremely Hot', 'Uncomfortably Hot',
    'Hot', 'Warm', 'Comfortable', 'Cool', 'Cold', 'Uncomfortably Cold', 'Very Cold', 'Extreme Cold' );

langMoonPhases = new Array (
    'NEW MOON' , 'Evening Crescent', 'FIRST QUARTER', 'Waxing Gibbous',
    'FULL MOON', 'Waning Gibbous'  , 'LAST QUARTER' , 'Morning Crescent' );
}
//------------------------------------------------------------------------------
//                        END OF LANGUAGE TRANSLATION                          .
//------------------------------------------------------------------------------

// -----------------------------------------------------------------------------
}; // end of loadSettings function
gotSettings = true; // must not be deleted and must stay true for implementation of above settings

