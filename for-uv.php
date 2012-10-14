<?php
include_once("header.php");
include_once("shim1.php");
include_once("fetch-UV-forecast.php");
$maxIcons = min(7,count($UVfcstUVI));  // use lesser of number of icons available
if (!function_exists('date_default_timezone_set')) {
 if (! ini_get('safe_mode') ) {
   putenv("TZ=$ourTZ");  // set our timezone for 'as of' date on file
	}  
} else {
  	date_default_timezone_set("$ourTZ");
  }
?>
<h2>UV Forecast for New Braunfels, TX</h2>

  <table class="table table-striped table-bordered hidden-phone">
         <tr>
          <?php for ($i=0;$i < $maxIcons;$i++) {  ?>
          <td align="center"><?php langtrans(date('D',strtotime($UVfcstDate[$i]))); ?></td>
          <?php } // end for
		  ?>
        </tr>
        <tr>
          <?php for ($i=0;$i < $maxIcons;$i++) {  ?>
          <td align="center"><?php echo gen_uv_icon($UVfcstUVI[$i]); ?></td>
          <?php } // end for
		  ?>
        </tr>
        <tr>
          <?php for ($i=0;$i < $maxIcons;$i++) {  ?>
          <td align="center"><strong><?php echo $UVfcstUVI[$i]; ?></strong></td>
          <?php } // end for
		  ?>
        </tr>
        <tr>
          <?php for ($i=0;$i < $maxIcons;$i++) {  ?>
          <td align="center"><?php echo get_uv_word(round($UVfcstUVI[$i],0)); ?></td>
          <?php } // end for
		  ?>
        </tr>
    </table>
    
      <table class="table-condensed visible-phone">
         <tr>
          <?php for ($i=0;$i < 4;$i++) {  ?>
          <td align="center"><?php langtrans(date('D',strtotime($UVfcstDate[$i]))); ?></td>
          <?php } // end for
		  ?>
        </tr>
        <tr>
          <?php for ($i=0;$i < 4;$i++) {  ?>
          <td align="center"><?php echo gen_uv_icon($UVfcstUVI[$i]); ?></td>
          <?php } // end for
		  ?>
        </tr>
        <tr>
          <?php for ($i=0;$i < 4;$i++) {  ?>
          <td align="center"><strong><?php echo $UVfcstUVI[$i]; ?></strong></td>
          <?php } // end for
		  ?>
        </tr>
        <tr>
          <?php for ($i=0;$i < 4;$i++) {  ?>
          <td align="center"><?php echo get_uv_word(round($UVfcstUVI[$i],0)); ?></td>
          <?php } // end for
		  ?>
        </tr>
    </table>
    <p>
    <a href="<?php echo htmlspecialchars($UV_URL); ?>"><small>
	<?php langtrans(
		'UV forecast courtesy of and Copyright &copy; KNMI/ESA (http://www.temis.nl/). Used with permission.'); ?>
     </small></a>
    </p>
    <img src="/img/ajax/uv_image.jpg" alt="UV Index Legend" style="border: none" /><br />
    <img src="/img/ajax/UVI_maplegend_H.gif" alt="UV Index Scale" style="border: none" />
    
<?php 
function gen_uv_icon($inUV) {
	global $SITE;
	if($inUV == 'n/a') { return( ''); }
	$uv = preg_replace('|,|','.',$inUV);
	$ourUVrounded = round($uv,0);
	if ($ourUVrounded > 11) {$ourUVrounded = 11; }
	if ($ourUVrounded < 1 ) {$ourUVrounded = 1; }
	$ourUVicon = "uv" . sprintf("%02d",$ourUVrounded) . ".gif";
	
	return( '<img src="/img/ajax/'.$ourUVicon . 
	  '" alt="UV Index" title="UV Index" />');
}
//=========================================================================
//  decode UV to word+color for display

function get_uv_word ( $inUV ) {
	global $SITE;
// figure out a text value and color for UV exposure text
//  0 to 2  Low
//  3 to 5     Moderate
//  6 to 7     High
//  8 to 10 Very High
//  11+     Extreme
   $uv = preg_replace('|,|','.',$inUV);
   switch (TRUE) {
	 case ($uv == 'n/a'):
	   $uv = '';
	 break;
     case ($uv == 0):
       $uv = langtransstr('None');
     break;
     case (($uv > 0) and ($uv < 3)):
       $uv = '<span class="label label-success">Low</span>';
     break;
     case (($uv >= 3) and ($uv < 6)):
       $uv = '<span class="label label-warning">Medium</span>';
     break;
     case (($uv >=6 ) and ($uv < 8)):
       $uv = '<span class="label label-important">High</span>';
     break;
     case (($uv >=8 ) and ($uv < 11)):
       $uv = '<span class="label label-default">Very&nbsp;High</span>';
     break;
     case (($uv >= 11) ):
       $uv = '<span class="label label-info">Extreme</span>';
     break;
   } // end switch
   return $uv;
} // end getUVword

//=========================================================================

?>
<?php include("footer.php");?>