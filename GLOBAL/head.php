<?php
date_default_timezone_set('Europe/London');

require_once("_Library/systemDatabase.php"); 
require_once("_Library/displayNavigation.php");
require_once("_Library/orgEmail.php");	
require_once("_Library/systemCookie.php");	

// Parse $Id
// no register globals
$view = $_REQUEST['view'];                  

$id = $_REQUEST['id'];
if(!$id)
	$id = "1";
$ids = explode(",", $id);
$idFull = $id;
$id = $ids[count($ids) - 1];

$pageName = basename($_SERVER['PHP_SELF'], ".html");

// Dev
$dev = $_REQUEST['dev'];
$dev = systemCookie("devCookie", $dev, 0);
// if (!$dev) die('Under construction . . .');
        
$alt = $_REQUEST['alt'];


$documentTitle = 'Modern Art';

if($pageName == "voice")
	$documentTitle = "/";
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; 
	
	// detect mobile
	$isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
                    '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                    '|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT']);
?><!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $documentTitle; ?></title>
		<meta http-equiv="Content-Type" content="text/xhtml; charset=utf-8" /> 
		<meta http-equiv="Title" content="<?php echo $documentTitle; ?>" />
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="all" href="/static/css/global.css">
		<link rel="stylesheet" type="text/css" media="all" href="/static/css/fonts.css">
		<script type="text/javascript" src="/static/js/global.js"></script>	
		<script type="text/javascript" src="/static/js/ga.js"></script>
	</head>
	<body onload="loaded();" ontouchmove="BlockMove(event);">
		<div id='logo' class='homeClickContainer frontMax' onclick='location.href="index.html";' style='cursor: pointer;'>&nbsp;</div>
		<div id='logo' class='logoContainer front' onclick='location.href="index.html";' style='cursor: pointer;'>
			<a href='index.html' class='logo'>Modern Art</a>&nbsp;
		</div><?
		if($pageName == "index")
		{
		?><div id='menu' class='menuContainer menu front fixed'><?
		}
		else
		{
		?><div id='menu' class='menuContainer menu front absolute'><?
		}
		?><div class='arrowContainer padModernArtName active'>
			<a href='index.html'><?
			if($pageName == "index")
			{
			?><img src='MEDIA/arrow-right.gif'><?
			}
			else
			{
			?><img src='MEDIA/arrow-left.gif'><?
			}
			?></a>
		</div>
