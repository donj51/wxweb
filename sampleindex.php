<?php
include_once("settings.php");
include_once("common.php");
include_once($SITE['WXtags']);
global	$TITLE;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>New Braunfels TX Weather</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="New Braunfels TX Weather, New Braunfels, Weather, ">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Stylesheets -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Scripts -->
    <script type="text/javascript" src="ajaxWDwx.js"></script>

  </head>

  <body class="preview" data-spy="scroll" data-target=".subnav" data-offset="50">

  <!-- Top Navigation Bar -->
  <div class="navbar navbar-fluid-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
              <a class="brand" href="../">New Braunfels TX Weather</a>
       <ul class="nav">
            <li><a href="about.php">About</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Websites<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://www.networkblog.net">Jeffrey's Network & Security Blog</a></li>
                <li><a href="http://www.jeffreyrandow.org">Jeffrey's Personal Blog</a></li>
                <li><a href="http://www.ctetg.com">CTETG</a></li>
              </ul>
       </ul>

       <div class="nav-collapse" id="main-menu">
          <ul class="nav pull-right">
            <li><p class="btn btn-warning btn-large"><?php echo $tempnodp; ?>&#176; F</p></li>
            <li class="divider-vertical"></li>
            <li><p class="btn btn-info">Last update: <?php echo $date; ?> <?php echo $time; ?></p></li>
          </ul>
       </div>
     </div>
   </div>
  </div>


<div class="container-fluid">

  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="/">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forecasts<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="for-nwsweek.php">NWS Weather Forecast</a></li>
                <li><a href="for-nwsarea.php">NWS Area Discussion</a></li>
                <li><a href="for-aq.php">Air Quality Forecast</a></li>
                <li><a href="for-uv.php">UV Forecast</a></li>
                <li><a href="advisories.php">Weather Advisories</a></li>
                <li class="divider"></li>
                <li><a href="#">Weather Underground Forecast</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Weather Trends and Statistics</a></li>
                <li><a href="#">Daily Records</a></li>
                <li><a href="#">Historical Data</a></li>
                <li><a href="#">Data Quality</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hydrology<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Lakes and River</a></li>
                <li class="divider"></li>
                <li><a href="#">Edwards Aquifer Level</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Radar<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Weather Underground - Area</a></li>
                <li class="divider"></li>
                <li><a href="#">Austin/San Antonio Radar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mesonet<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">MidSouth Mesonet</a></li>
                <li class="divider"></li>
                <li><a href="#">Austin/San Antonio Radar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Space<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Space Weather</a></li>
                <li><a href="#">Astronomical Data</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tropical<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Space Weather</a></li>
                <li><a href="#">Astronomical Data</a></li>
              </ul>
            </li>            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Misc<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Space Weather</a></li>
                <li><a href="#">Astronomical Data</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Links<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="">Space Weather</a></li>
                <li><a href="#">Astronomical Data</a></li>
              </ul>
            </li>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->

  
  <div class="row-fluid">
    <div class="span4">
      <h2>Weather Warnings:</h2>
      <div class="alert">
        <?php include_once("atom-top-warning.php");?>
      </div>
      <h2>Site News:</h2>
      <p>As you can tell, I'm actively redesigning the site to be modernized and using current web technologies</p>
    </div>
    
    <div class="span4">
      <p align="center"><h3>South Webcam View</h3></p>
      <a href="http://jeffreycentex.is-a-geek.com/webcam.jpg"><img src="http://jeffreycentex.is-a-geek.com/webcam.jpg"></a>
    </div>
    
    <div class="span4">
      <p align="center"><h3>E/ESE Webcam View</h3></p>
      <a href="http://jeffreycentex.is-a-geek.com/webcam2.jpg"><img src="http://jeffreycentex.is-a-geek.com/webcam2.jpg"></a>
    </div>

  </div>








<!-- Buttons
================================================== -->
<section id="buttons">
  <div class="page-header">
    <h1>Buttons</h1>
  </div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Button</th>
        <th>Large Button</th>
        <th>Small Button</th>
        <th>Disabled Button</th>
		<th>Button with Icon</th>
		<th>Split Button</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a class="btn" href="#">Default</a></td>
        <td><a class="btn btn-large" href="#">Default</a></td>
        <td><a class="btn btn-small" href="#">Default</a></td>
        <td><a class="btn disabled" href="#">Default</a></td>
        <td><a class="btn" href="#"><i class="icon-cog"></i> Default</a></td>
		<td>
	        <div class="btn-group">
	          <a class="btn" href="#">Default</a>
	          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
      <tr>
        <td><a class="btn btn-primary" href="#">Primary</a></td>
        <td><a class="btn btn-primary btn-large" href="#">Primary</a></td>
        <td><a class="btn btn-primary btn-small" href="#">Primary</a></td>
        <td><a class="btn btn-primary disabled" href="#">Primary</a></td>
        <td><a class="btn btn-primary" href="#"><i class="icon-shopping-cart icon-white"></i> Primary</a></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-primary" href="#">Primary</a>
	          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
      <tr>
        <td><a class="btn btn-info" href="#">Info</a></td>
        <td><a class="btn btn-info btn-large" href="#">Info</a></td>
        <td><a class="btn btn-info btn-small" href="#">Info</a></td>
        <td><a class="btn btn-info disabled" href="#">Info</a></td>
        <td><a class="btn btn-info" href="#"><i class="icon-exclamation-sign icon-white"></i> Info</a></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-info" href="#">Info</a>
	          <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
      <tr>
        <td><a class="btn btn-success" href="#">Success</a></td>
        <td><a class="btn btn-success btn-large" href="#">Success</a></td>
        <td><a class="btn btn-success btn-small" href="#">Success</a></td>
        <td><a class="btn btn-success disabled" href="#">Success</a></td>
        <td><a class="btn btn-success" href="#"><i class="icon-ok icon-white"></i> Success</a></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-success" href="#">Success</a>
	          <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
      <tr>
        <td><a class="btn btn-warning" href="#">Warning</a></td>
        <td><a class="btn btn-warning btn-large" href="#">Warning</a></td>
        <td><a class="btn btn-warning btn-small" href="#">Warning</a></td>
        <td><a class="btn btn-warning disabled" href="#">Warning</a></td>
        <td><a class="btn btn-warning" href="#"><i class="icon-warning-sign icon-white"></i> Warning</a></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-warning" href="#">Warning</a>
	          <a class="btn btn-warning dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
      <tr>
        <td><a class="btn btn-danger" href="#">Danger</a></td>
        <td><a class="btn btn-danger btn-large" href="#">Danger</a></td>
        <td><a class="btn btn-danger btn-small" href="#">Danger</a></td>
        <td><a class="btn btn-danger disabled" href="#">Danger</a></td>
        <td><a class="btn btn-danger" href="#"><i class="icon-remove icon-white"></i> Danger</a></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-danger" href="#">Danger</a>
	          <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
      <tr>
        <td><a class="btn btn-inverse" href="#">Inverse</a></td>
        <td><a class="btn btn-inverse btn-large" href="#">Inverse</a></td>
        <td><a class="btn btn-inverse btn-small" href="#">Inverse</a></td>
        <td><a class="btn btn-inverse disabled" href="#">Inverse</a></td>
        <td><a class="btn btn-inverse" href="#"><i class="icon-random icon-white"></i> Inverse</a></td>
		<td>
	        <div class="btn-group">
	          <a class="btn btn-inverse" href="#">Inverse</a>
	          <a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </div><!-- /btn-group -->
		</td>
      </tr>
    </tbody>
  </table>

</section>


<!-- Forms
================================================== -->
<section id="forms">
  <div class="page-header">
    <h1>Forms</h1>
  </div>

  <div class="row">
    <div class="span7 offset1">

	    <form class="well form-search">
	      <input type="text" class="input-medium search-query">
	      <button type="submit" class="btn">Search</button>
	    </form>

        <form class="well form-search">
          <input type="text" class="input-small" placeholder="Email">
          <input type="password" class="input-small" placeholder="Password">
          <button type="submit" class="btn">Go</button>
        </form>


      <form class="form-horizontal well">
        <fieldset>
          <legend>Controls Bootstrap supports</legend>
          <div class="control-group">
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
              <input type="text" class="input-xlarge" id="input01">
              <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckbox">Checkbox</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" value="option1">
                Option one is this and that&mdash;be sure to include why it's great
              </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="select01">Select list</label>
            <div class="controls">
              <select id="select01">
                <option>something</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="multiSelect">Multicon-select</label>
            <div class="controls">
              <select multiple="multiple" id="multiSelect">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="fileInput">File input</label>
            <div class="controls">
              <input class="input-file" id="fileInput" type="file">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="textarea">Textarea</label>
            <div class="controls">
              <textarea class="input-xlarge" id="textarea" rows="3"></textarea>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="focusedInput">Focused input</label>
            <div class="controls">
              <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused…">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Uneditable input</label>
            <div class="controls">
              <span class="input-xlarge uneditable-input">Some value here</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="disabledInput">Disabled input</label>
            <div class="controls">
              <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="Disabled input here…" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckbox2">Disabled checkbox</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox2" value="option1" disabled>
                This is a disabled checkbox
              </label>
            </div>
          </div>
          <div class="control-group warning">
            <label class="control-label" for="inputWarning">Input with warning</label>
            <div class="controls">
              <input type="text" id="inputWarning">
              <span class="help-inline">Something may have gone wrong</span>
            </div>
          </div>
          <div class="control-group error">
            <label class="control-label" for="inputError">Input with error</label>
            <div class="controls">
              <input type="text" id="inputError">
              <span class="help-inline">Please correct the error</span>
            </div>
          </div>
          <div class="control-group success">
            <label class="control-label" for="inputSuccess">Input with success</label>
            <div class="controls">
              <input type="text" id="inputSuccess">
              <span class="help-inline">Woohoo!</span>
            </div>
          </div>
          <div class="control-group success">
            <label class="control-label" for="selectError">Select with success</label>
            <div class="controls">
              <select id="selectError">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <span class="help-inline">Woohoo!</span>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

</section>


<!-- Miscellaneous
================================================== -->
<section id="miscellaneous">
  <div class="page-header">
    <h1>Miscellaneous</h1>
  </div>

  <div class="row">
    <div class="span5">

      <h3 id="breadcrumbs">Breadcrumbs</h3>
      <ul class="breadcrumb">
        <li class="active">Home</li>
      </ul>
      <ul class="breadcrumb">
        <li><a href="#">Home</a> <span class="divider">/</span></li>
        <li class="active">Library</li>
      </ul>
      <ul class="breadcrumb">
        <li><a href="#">Home</a> <span class="divider">/</span></li>
        <li><a href="#">Library</a> <span class="divider">/</span></li>
        <li class="active">Data</li>
      </ul>
    </div>
    <div class="span6 offset1">
      <h3 id="pagination">Pagination</h3>
      <div class="pagination">
        <ul>
          <li class="disabled"><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
      <div class="pagination">
        <ul>
          <li><a href="#">&larr;</a></li>
          <li class="active"><a href="#">10</a></li>
          <li class="disabled"><a href="#">...</a></li>
          <li><a href="#">20</a></li>
          <li><a href="#">&rarr;</a></li>
        </ul>
      </div>
      <div class="pagination pagination-centered">
        <ul>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
        </ul>
      </div>
    </div>
  </div>



<!-- Labels
================================================== -->

  <div class="row">
    <div class="span12">

      <h3 id="labels">Labels</h3>


      <span class="label">Default</span>
      <span class="label label-success">Success</span>
	  <span class="label label-warning">Warning</span>
	  <span class="label label-important">Important</span>
	  <span class="label label-info">Info</span>

	</div>
  </div>
	<br />

<!-- Progress bars
================================================== -->


  <h3 id="progressbars">Progress bars</h3>

  <div class="row">
    <div class="span4">
      <div class="progress">
        <div class="bar" style="width: 60%;"></div>
      </div>
    </div>
    <div class="span4">
      <div class="progress progress-info progress-striped">
        <div class="bar" style="width: 20%;"></div>
      </div>
    </div>
    <div class="span4">
      <div class="progress progress-danger progress-striped active">
        <div class="bar" style="width: 45%"></div>
      </div>
    </div>
  </div>
	<br />


<!-- Alerts & Messages
================================================== -->


  <h3 id="alerts">Alerts</h3>

  <div class="row">
	  <div class="span12">
	      <div class="alert alert-block">
	        <a class="close">&times;</a>
	        <h4 class="alert-heading">Alert block</h4>
	        <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
	      </div>
	  </div>
  </div>
  <div class="row">
    <div class="span4">
      <div class="alert alert-error">
        <a class="close">&times;</a>
        <strong>Error</strong> Change a few things up and try submitting again.
      </div>
    </div>
    <div class="span4">
      <div class="alert alert-success">
        <a class="close">&times;</a>
        <strong>Success</strong> You successfully read this important alert message.
      </div>
    </div>
    <div class="span4">
      <div class="alert alert-info">
        <a class="close">&times;</a>
        <strong>Information</strong> This alert needs your attention, but it's not super important.
      </div>
    </div>
  </div>


</section>

<br><br><br><br>

     <!-- Footer
      ================================================== -->
      <footer class="footer">
        <p class="pull-right"><a href="#">Back to top</a></p>
      </footer>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
