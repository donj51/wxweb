<?php
// PHP script by Ken True, webmaster@saratoga-weather.org
// forecast-discussion.php  version 1.00 - 14-Dec-2007
//   Version 1.01 - 14-Dec-2007 - added safety features per MChallis at http://www.carmosaic.com/weather/
//   Version 1.02 - 31-Dec-2007 - changed fetchUrlWithoutHanging function to fetchUrlWithoutHangingFD
//   Version 1.03 - 10-Jan-2008 - added "Forecast Discussion unavailable" feature per MChallis
//
    $Version = "forecast-discussion.php V1.03 10-Jan-2008";
//  error_reporting(E_ALL);  // uncomment to turn on full error reporting
// script available at http://saratoga-weather.org/scripts.php
//  
// you may copy/modify/use this script as you see fit,
// no warranty is expressed or implied.
//
// Customized for: NOAA forecast discussions
//   http://www.crh.noaa.gov/product.php?site=NWS&issuedby=MTR&product=AFD&format=CI&version=1&glossary=0
//
// To find your local NWS office code for $myNWS, do this:
//   go to www.weather.gov
//   search for your city, state
//   look at the URL in the 'Forecast Discussion' link near the bottom of the page
//   use the 3-character abbreviation is in the &issuedby=XXX parameter on the 
//     Forecast Discussion link (XXX will be your local office)
//   put the XXX in the $myNWS variable below
//
// output: creates XHTML 1.0-Strict HTML page (default)
// Options on URL:
//      inc=Y    -- returns only the body code for inclusion
//                         in other webpages.  Omit to return full HTML.
// example URL:
//  http://your.website/forecast-discussion.php?inc=Y
//  would return data without HTML header/footer 
//
// Usage:
//  you can use this webpage standalone (customize the HTML portion below)
//  or you can include it in an existing page:
//  no parms:  $doIncludeFD = true; include("forecast-discussion.php"); 
//  parms:    include("http://your.website/forecast-discussion.php?inc=Y");
//
//
// settings:  
//  change myNWS to abbreviation for your local NWS office
//    other settings are optional
// 
  $myNWS = 'EWX';   // San Francisco, NWS office
//  $myNWS = 'PQR';   // Portland, OR
//  $myNWS = 'OAX';   // Omaha, NE (Carter Lake, IA)
//
  $cacheName = "./cache/forecast-discussion.txt";  // used to store the file so we don't have to
//                          fetch it each time
  $refetchSeconds = 1800;     // refetch every nnnn seconds
// end of settings

// Constants
// don't change $fileName or script may break ;-)
  $fileName = "http://forecast.weather.gov/product.php?site=NWS&issuedby=EWX&product=AFD&format=CI&version=1&glossary=0";
// end of constants

// ------ start of code -------
if (isset($_REQUEST['sce']) && strtolower($_REQUEST['sce']) == 'view' ) {
//--self downloader --
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

// Check parameters and force defaults/ranges
if ( ! isset($_REQUEST['inc']) ) {
        $_REQUEST['inc']="";
}
if (isset($doIncludeFD) and $doIncludeFD ) {
  $includeMode = "Y";
 } else {
  $includeMode = $_REQUEST['inc']; // any nonblank is ok
}

if ($includeMode) {$includeMode = "Y";}

if (isset($_REQUEST['cache'])) {$refetchSeconds = 1; }


// ------------- code starts here -------------------
echo "<!-- $Version -->\n";

// refresh cached copy of page if needed
// fetch/cache code by Tom at carterlake.org

if (file_exists($cacheName) and filemtime($cacheName) + $refetchSeconds > time()) {
      print "<!-- using Cached version of $cacheName -->\n";
      $html = implode('', file($cacheName));
    } else {
      print "<!-- loading $cacheName from $fileName -->\n";
      $html = fetchUrlWithoutHangingFD($fileName);
      $fp = fopen($cacheName, "w");
	  if ($fp) {
        $write = fputs($fp, $html);
         fclose($fp);  
         print "<!-- cache written to $cacheName. -->\n";
	  } else {
	     print "<!-- unable to save cache to $cacheName. -->\n";
	  }
}
  // extract the forecast discussion
 preg_match('|<pre[^>]*>(.*)</pre>|Usi',$html,$matches);
 $discussion = $matches[1]; // now have the forecast as a string with \n delimiters

$discussion  = trim($matches[1]); // prevent extra white space at beginning and end

 // uncomment next line if you like only lower case text, or it could be made an option
 // $discussion  = strtolower(trim($matches[1]));

  if ($discussion  == '') {
           $discussion  = 'Forecast discussion unavailable, please try later.';
  }
  print "<pre>\n";
  print htmlspecialchars(strip_tags($discussion));
  print "</pre>\n";  $niceFileName = preg_replace('!&!is','&amp;',$fileName);
  print "<p><small><a href=\"$niceFileName\">NWS $myNWS Office Area Forecast Discussion</a></small></p>\n";

// ----------------------------functions ----------------------------------- 
 
 function fetchUrlWithoutHangingFD($url) // thanks to Tom at Carterlake.org for this script fragment
   {
   // Set maximum number of seconds (can have floating-point) to wait for feed before displaying page without feed
   $numberOfSeconds=4;   

   // Suppress error reporting so Web site visitors are unaware if the feed fails
   error_reporting(0);

   // Extract resource path and domain from URL ready for fsockopen

   $url = str_replace("http://","",$url);
   $urlComponents = explode("/",$url);
   $domain = $urlComponents[0];
   $resourcePath = str_replace($domain,"",$url);

   // Establish a connection
   $socketConnection = fsockopen($domain, 80, $errno, $errstr, $numberOfSeconds);

   if (!$socketConnection)
       {
       // You may wish to remove the following debugging line on a live Web site
          print "<!-- Network error: $errstr ($errno) -->\n";
       }    // end if
   else    {
       $xml = '';
       fputs($socketConnection, "GET $resourcePath HTTP/1.0\r\nHost: $domain\r\n\r\n");
   
       // Loop until end of file
       while (!feof($socketConnection))
           {
           $xml .= fgets($socketConnection, 4096);
           }    // end while

       fclose ($socketConnection);

       }    // end else

   return($xml);

   }    // end function
   
// --------------end of functions ---------------------------------------

?>