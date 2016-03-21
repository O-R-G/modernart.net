<?php 
require_once("_Library/systemDatabase.php"); 
require_once("_Library/displayNavigation.php");
// require_once("_Library/displayCollapseList.php");
require_once("_Library/systemCookie.php");

$clock = systemCookie("clockCookie", $clock, time()+60*60*24*30*12);



// Parse $Id

//if (!$id || $id == 0) $id = "2";
$ids = explode(",", $id);
$idFull = $id;
$id  = $ids[count($ids) - 1];





//  DOCUMENT HEADER 

$pageName = basename($PHP_SELF, ".html");
if ($documentTitle) {
	$documentTitle = "Modern Art / ". $documentTitle;
} else {
	$documentTitle = "Modern Art";
}
if ($pageName == "voice") $documentTitle = "/";
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; 
?>

<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo $documentTitle; ?></title>
	<meta http-equiv="Content-Type" content="text/xhtml; charset=utf-8" />
	<meta http-equiv="Title" content="<?php echo $documentTitle; ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="GLOBAL/global.css" />
	<script type="text/javascript" src="GLOBAL/global.js"></script>
	<script src="_Processing/processing-1.0.0.min.js"></script>
</head>
<body>

<?php
if ($clock == "1") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClock.pde" width="200" height="200"></canvas>
	</div>
	
<?php	
} 
else if ($clock == "2") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockWorks.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "3") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockPowerResonatorDisplay.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "4") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockPower.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "5") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockResonator.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "6") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockPowerResonatorDisplayAll.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "7") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockDisplayDisplayDisplay.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "8") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockDisplayDispDi.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "9") {
?>
	
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockDisplayResonator.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "10") {
?>
 
	<div id='name' class='nameContainer Mono'>
		<a href='main.html'>
		<canvas datasrc="_Processing/ModernArtClockDisplayResonatorResonator.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
else if ($clock == "11") {
?>
 
	<div id='name' class='nameContainer Mono'>
		<a href='main.html?clock=1'>
		<canvas datasrc="_Processing/ModernArtClock-Trigger.pde" width="200" height="200"></canvas>
	</div>
	
<?php
}
?>


	<div id='logo' class='logoContainer'>
		<a href='main.html?clock=1'><img src='MEDIA/LOGO/ModernArt-150.gif'></a>
	</div>


	<div id='line' class='lineContainer'></div>
	
	



<!--  SHARE  -->
	
<!--
	<div id='name' class='shareContainer Mono'>
	<a href='index.html'>> Follow</a><br/>
	<a href='index.html'>+ Join</a><br/>
	<a href='index.html'>x Share</a><br/>
	</div>
-->	
	
	


	
	
	