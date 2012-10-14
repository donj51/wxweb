<?php
// proxy fetch for global-conditions.xml from http://www.northamericanweather.net/ for the
// Google station map
// Ken True - webmaster@saratoga-weather.org
// Version 1.00 - 17-Jul-2010 - initial release 
// Version 1.01 - 20-Jul-2010 - added target dir and self-downloader
// settings -------------------------------------------------------------------
$refreshTime = 300;  // 10 minute cache time
$targetDir = './';   // target directory for cache files with trailing '/'
//-----------------------------------------------------------------------------
$Version = 'get-conditions-json.php V1.01 - 20-Jul-2010';

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

$masterHost = "http://www.northamericanweather.net/";
$cacheName = 'global-conditions.json';


$URL = $masterHost . $cacheName;

if (file_exists($targetDir.$cacheName) and 
	filemtime($targetDir.$cacheName) + $refreshTime > time() and filesize($targetDir.$cacheName) > 100) {
    header("Content-type: text/plain");
	header("Cache-Control: no-cache,no-store,  must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	$NOWdate = gmdate("D, d M Y H:i:s", time());
	$udate = gmdate("D, d M Y H:i:s", filemtime($cacheName));
	header("Expires: $NOWdate GMT");
	header("Last-Modified: $udate GMT");
	readfile($cacheName);
    print "// cache lmod=$udate GMT -->\n";
    return;
}


  $rawhtml = fetchUrlWithoutHangingJSON($URL,false);
  
  list($headers,$html) = explode("\r\n\r\n",$rawhtml);
  $RC = '';
  if (preg_match("|^HTTP\/\S+ (.*)\r\n|",$rawhtml,$matches)) {
	$RC = trim($matches[1]);
  }

  if(preg_match('|200 |',$RC) and strlen($html) > 100) {
    header("Content-type: text/plain");
	header("Cache-Control: no-cache,no-store,  must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	$NOWdate = gmdate("D, d M Y H:i:s", time());
	header("Expires: $NOWdate GMT");

	$udate = gmdate("D, d M Y H:i:s", time()) . " GMT";
 	if(preg_match('|\nLast-Modified: (.*)\n|Ui',$headers,$match)) {
		$udate = trim($match[1]);
	}
	header("Last-Modified: $udate");
	print $html;
	print "// -- lmod=$udate\n";
	print "// -- $Version \n";
 
   $fp = fopen($targetDir.$cacheName, "w");
   if ($fp) {
	$write = fputs($fp, $html);
	fclose($fp);
   } else {
	print "// unable to write cache file $targetDir$cacheName \n";
   }
 
  
  } else {
    print "Problem fetching $targetDir$cacheName with RC=$RC , html length=".strlen($html) . "<br/>\n";
	print "Headers returned are:\n";
	print "<pre>\n$headers\n</pre>\n";
	print "cache not saved.\n";
   }

exit;




// get contents from one URL and return as string 
 function fetchUrlWithoutHangingJSON($url,$useFopen) {
// thanks to Tom at Carterlake.org for this script fragment
  global $Debug, $needCookie,$timeStamp;
  if (! $useFopen) {
   // Set maximum number of seconds (can have floating-point) to wait for feed before displaying page without feed
   $numberOfSeconds=4;   

   // Suppress error reporting so Web site visitors are unaware if the feed fails
   error_reporting(0);

   // Extract resource path and domain from URL ready for fsockopen
   $FullUrl = $url;
   $url = str_replace("http://","",$url);
   $urlComponents = explode("/",$url);
   $domain = $urlComponents[0];
   $resourcePath = str_replace($domain,"",$url);
   $resourcePath = preg_replace('|nocache|',$timeStamp,$resourcePath);
   $Debug .= "<!-- GET $resourcePath HTTP/1.1 \n      Host: $domain -->\n";

   // Establish a connection
   $socketConnection = fsockopen($domain, 80, $errno, $errstr, $numberOfSeconds);

   if (!$socketConnection)
       {
       // You may wish to remove the following debugging line on a live Web site
          print("<!-- Network error: $errstr ($errno) -->");
       }    // end if
   else    {
       $xml = '';
	   $getString = "GET $resourcePath HTTP/1.1\r\nHost: $domain\r\nConnection: close\r\nUser-agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.11) Gecko/20071127 Firefox/2.0.0.11 global-conditions SaratogaWX)\r\n";
	   
	   $getString .= "\r\n";
       fputs($socketConnection, $getString);
   
       // Loop until end of file
       while (!feof($socketConnection))
           {
           $xml .= fgets($socketConnection, 8192);
           }    // end while

       fclose ($socketConnection);

       }    // end else

   return($xml);
 } else {
//   print "<!-- using file function -->\n";
   $xml = implode('',file($url));
   return($xml);
 }

   }    // end fetchUrlWithoutHangingJSON
// ------------------------------------------------------------------


?>