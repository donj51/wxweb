<?php

$year = "2012";         # Default Year to parse
$loc = "./raw/";            # Location of dailynoaareport.htm
$season_start = 1;      # Month Number that Rain Season Starts

# Add which years of data you have to the array using the example
# below:

$years_available = array("2012","2011","2010");

############################################################################
# Adjust with passed variables
############################################################################

if (isset($_GET['year'])) {
    $year = intval($_GET['year']);
}

if (isset($_GET['season'])) {
    $season_start = intval($_GET['season']);
}

############################################################################
// Check for Source Code View
@include("header.php");
############################################################################
?>
<link rel="stylesheet" href="/css/wxraindetail.css" type="text/css" />
</head>
<body>
<?php
@include("shim1.php");

    echo '
<div id="main-copy">
    <div id="rain">
        <div class="getraindtbxfloat">
            <div class="getraindtbx">Other Years:<br/>
                <form  method="get" action="' . $SITE['self'] . '" >
                    <select name="year">';

    // Display options for each available year from array
    foreach($years_available as $value) {
        echo "\t\t\t\t\t\t" . 
            '<option value="' . $value . '"> Year ' . $value . 
            ' </option>' . "\n";                        
    } 
    echo '    </select>
                    <input type="submit" value="Go" />
                </form>
            </div>
        </div>
    <h3>Historical Rainfall Information</h3>
    
    ';
    get_rain_detail($year,$loc, $season_start); 
    echo '</div>
</div>'; 
############################################################################
@include("footer.php");
############################################################################
# Functions
############################################################################

function get_rain_detail ($year, $loc, $season_start) {
    global $SITE;
    
    $cyear = date("Y");
    $cmonth = date("n");
    $cday = date("j");
    
    // Testing override values
    // Testing... 
    //$cyear = 2009;
    //$cmonth = 9;
    //$cday = 1;    
    
    // Month Definitions
    $mnthname = array('January', 'February', 'March', 'April', 'May', 'June', 
        'July', 'August', 'September', 'October', 'November', 'December');
        
    // Raw Data Definitions
    $rawlb = array("day" => 0, "mean" => 1, "high" => 2 , "htime" => 3,
        "low" => 4, "ltime" => 5, "hdg" => 6, "cdg" => 7, "rain" => 8,
        "aws" => 9, "hwind" => 10 , "wtime" => 11, "dir" => 12);

    // First Collect the data for the year
    
    //echo "COLLECTING DATA<br/>";        
    $proc_month = $season_start;
    $proc_year = $year;
    
    $got_month = 0;
    //echo "Season Starts " . $season_start . " " . $season_year . "<br/>\n";
    //echo "Current Date " . $cyear . "-" . $cmonth . "-" . $cday . "<br/>\n";
    
    for($got_month; $got_month < 12 ; $got_month++) {
        $blank = 0;
        //echo ($got_month +1) . " Month = " . $proc_month . " - " . $proc_year ;
        if ( $proc_year > $cyear ) {
            $blank = 1;
        }
        if ($proc_year == $cyear && $proc_month > $cmonth ) {
            $blank = 1;
        }
        
        if ($proc_year == $cyear && $proc_month == $cmonth && $cday == 1 ) {
            $blank = 1;
        }


        if ($blank) {
            $raw[$got_month][1] = $proc_month;
            //echo " No  Data<br/>\n";          
            
        } else {
            $raw[$got_month][1] = $proc_month;
            if ($proc_year == $cyear && $proc_month == $cmonth) {
                $filename = "dailynoaareport.htm";
            } else {
                $filename = "dailynoaareport" . $proc_month  . $proc_year . ".htm";
            }
            
            if ( file_exists($loc . $filename) ) {
                //echo " Getting Data<br/>\n";              
                $raw[$got_month][0] = getnoaafile($loc . $filename);
            } else {
                //echo " File Not Found " . $loc . $filename . "<br/>\n";
            }               
        }

        $proc_month ++;
        if ($proc_month > 12) {
            $proc_month = 1;
            $proc_year ++;
        }
    }    
    
    //DEBUG
    //echo "<pre>"; print_r($raw); echo "</pre>";
   
    
    // Start display of info we got
    
    echo '<p>
    Report for ';
    
    if ( $season_start ==  1) {
        echo "Calendar Year ";
    } else {
        echo "Seasonal Year (" . $mnthname[$season_start -1 ] . " - " .
            $mnthname[$season_start -2 ] . ") ";
    }
    
    echo $year . '</p>
    Note: Rain totals are updated after midnight each day<br/> <br/>';
    
    // Output Table with information
    
    echo '<table><tr><th class="labels">Day</th>';
    
    // Cycle through the months for a label
    
    for ( $i = 0 ; $i < 12 ; $i++ ) {
        echo '<th  class="labels">' . substr( $mnthname[ $raw[$i][1] -1], 0, 3 ) . '</th>';
    }
    echo "</tr>\n";
    
    // Setup Rainmonth and year totals
    
    $rainmonth = array();
    $ytd = 0;
    
    
    // Cycle through the possible days 
        
    for ( $day = 0 ; $day < 31 ; $day++ ) {
        
        echo '<tr><td class="raindt">' . ($day + 1) . '</td>';
        
        // Display each months values for that day
        
        for ($mnt = 0 ; $mnt < 12 ; $mnt++ ) {
            
            $mark = 0;
            if ( $raw[$mnt][0][$day][$rawlb['rain']] == "" ) {
                $put = "---";
            } else {
                $put = $raw[$mnt][0][$day][$rawlb['rain']];
                $rainmonth[$mnt][0] = $rainmonth[$mnt][0] + $put;
                if ($put > 0.0) {
                    $rainmonth[$mnt][1] = $rainmonth[$mnt][1] + 1;
                    $mark = 1;
                }
            }
            if ($mark) {
                echo '<td class="raindayr">' . $put . '</td>';
            } else {
                echo '<td class="rainday">' . $put . '</td>';
            }
        }
        
        echo "</tr>\n"; 
    }
    
    // We are done with the daily numbers now lets show the totals
    
    echo '<tr><td class="rainttl">Rain Days</td>';
    for ( $i = 0 ; $i < 12 ; $i++ ) {
        echo '<td class="rainttl">' . sprintf("%d", $rainmonth[$i][1]) . 
            '</td>';
    }
    echo '</tr>';
    
    echo '<tr><td class="rainttl">Mnth TTL</td>';
    for ( $i = 0 ; $i < 12 ; $i++ ) {
        echo '<td class="rainttl">' . sprintf("%01.2f", $rainmonth[$i][0]) . 
            '&nbsp;in</td>';
    }
    echo '</tr>';
    
    $ytd=0;
    echo '<tr><td class="rainttl">YTD TTL</td>';
    for ( $i = 0 ; $i < 12 ; $i++ ) {
        $ytd = $ytd + $rainmonth[$i][0];
        echo '<td class="rainttl">' . sprintf("%01.2f", $ytd) . '&nbsp;in</td>';
    }
    
    echo '</tr></table><div class="dev">' . $SITE['copy'] . '</div>';
}

# GETNOAAFILE function
# Developed by TNETWeather.com
#
# Returns an array of the contents of the specified filename
# Array contains days from 1 - 31 (or less if the month has less) and
# the values:
# Day
# Mean Temp
# High Temp
# Time of High Temp
# Low Temp
# Time of Low Temp
# Hot Degree Day
# Cold Degree Day
# Rain
# Avg Wind Speed
# High Wind
# Time High Wind
# Dom Wind Direction
############################################################################

function getnoaafile ($filename) {
    global $SITE;               
    
    $rawdata = array();
    
    $fd = @fopen($filename,'r');
    
    $startdt = 0;
    if ( $fd ) {
    
        while ( !feof($fd) ) { 
        
            // Get one line of data
            $gotdat = trim ( fgets($fd,8192) );
            
            if ($startdt == 1 ) {
                if ( strpos ($gotdat, "--------------" ) !== FALSE ){
                    $startdt = 2;
                } else {
                    $foundline = preg_split("/[\n\r\t ]+/", $gotdat );
                    $rawdata[intval ($foundline[0]) -1 ] = $foundline;
                }
            }
        
            if ($startdt == 0 ) {
                if ( strpos ($gotdat, "--------------" ) !== FALSE ){
                    $startdt = 1;
                } 
            }
        }
        // Close the file we are done getting data
        fclose($fd);
    }   
    return($rawdata);
}

function check_sourceview () {
    global $SITE;
    
    if ( isset($_GET['view']) && $_GET['view'] == $SITE['viewscr'] ) {
        $filenameReal = __FILE__;
        $download_size = filesize($filenameReal);
        header('Pragma: public');
        header('Cache-Control: private');
        header('Cache-Control: no-cache, must-revalidate');
        header("Content-type: text/plain");
        header("Accept-Ranges: bytes");
        header("Content-Length: $download_size");
        header('Connection: close');
        readfile($filenameReal);
        exit;
    }
}

############################################################################
# End of Page
############################################################################
?>
