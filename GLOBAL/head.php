<?php 
	require_once("_Library/systemDatabase.php"); 
	require_once("_Library/displayNavigation.php");
	require_once("_Library/orgEmail.php");	
	require_once("_Library/systemCookie.php");	

        // Parse $Id

        $view = $_REQUEST['view'];                  

        $id = $_REQUEST['id'];                          // no register globals
	if ( !$id ) $id = "1";
        $ids = explode(",", $id);
        $idFull = $id;
        $id = $ids[count($ids) - 1];

        $pageName = basename($_SERVER['PHP_SELF'], ".html");
        // $documentTitle = "The Serving Library";
	date_default_timezone_set('Europe/London');

	/*
	// Parse $id

	if ( !$id ) $id = "1";
	$ids = explode(",", $id);
	$idFull = $id;
	$id = $ids[count($ids) - 1];
	*/

	//  Document header

	$pageName = basename($PHP_SELF, ".html");

        // Dev

        $dev = $_REQUEST['dev'];
        $dev = systemCookie("devCookie", $dev, 0);
        // if (!$dev) die('Under construction . . .');
        $alt = $_REQUEST['alt'];

	$documentTitle = 'Modern Art';
	/*
	if ($documentTitle) {
	
		$documentTitle .= " — " . date('j F Y g:i a');

	} else {

		$documentTitle = date('j F Y g:i a');
	}
	*/
	if ($pageName == "voice") $documentTitle = "/";
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; 
	
	// detect mobile
	$isMobile = (bool)preg_match('#\b(ip(hone|od|ad)|android|opera m(ob|in)i|windows (phone|ce)|blackberry|tablet'.
                    '|s(ymbian|eries60|amsung)|p(laybook|alm|rofile/midp|laystation portable)|nokia|fennec|htc[\-_]'.
                    '|mobile|up\.browser|[1-4][0-9]{2}x[1-4][0-9]{2})\b#i', $_SERVER['HTTP_USER_AGENT']);
?>



<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo $documentTitle; ?></title>
	<meta http-equiv="Content-Type" content="text/xhtml; charset=utf-8" /> 
	<meta http-equiv="Title" content="<?php echo $documentTitle; ?>" />
	<meta name="keywords" content="Modern Art, Contemporary Art, Gallery, Stuart Shave, Artist, Exhibition, David Altmejd, Karla Black, Tom Burr, Mark Flood Tim Gardner, Lothar Hempel, Yngve Holen, Jacqueline Humphries, Ansel Krut, Phillip Lai, Paul Lee, Barry McGee, Jonathan Meese, Matthew Monahan, Katy Moran, David Noonan, Anna-Bella Papp, Eva Rothschild, Bojan Sarcevic, Lara Schnitger, Collier Schorr, Steven Shearer, Linder Sterling, Ricky Swallow, Tom of Finland, Richard Tuttle, London" />
	<meta name="description" content="Stuart Shave/Modern Art
4-8 Helmet Row
London EC1V 3QJ
United Kingdom

T. +44 (0) 20 7299 7950

www.modernart.net


Representing:

David Altmejd
Karla Black
Nicolas Deshayes
Mark Flood
Tim Gardner
Lothar Hempel
Yngve Holen
Jacqueline Humphries
Sanya Kantarovsky
Ansel Krut
Phillip Lai
Paul Lee
Linder
Barry McGee
Jonathan Meese
Katy Moran
David Noonan
Anna-Bella Papp
Eva Rothschild
Bojan Šarčević
Collier Schorr
Steven Shearer
Tim Stoner
Ricky Swallow
Torey Thornton
Richard Tuttle" />
	<!--<meta name="description" content="Stuart Shave Modern Art is a contemporary art gallery in London, representing the work of David Altmejd, Karla Black, Tom Burr, Nigel Cooke, Barnaby Furnas, Tim Gardner, Lothar Hempel, Jacqueline Humphries, Ansel Krut, Phillip Lai, Paul Lee, Linder, Barry McGee, Jonathan Meese, Matthew Monahan, Katy Moran, David Noonan, Eva Rothschild, Bojan Šarčević, Lara Schnitger, Collier Schorr, Steven Shearer, Ricky Swallow, Richard Tuttle, Clare Woods." /-->

	<?php if ($dev) { ?>

    <meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="all" href="/GLOBAL/global-dev.css" />

	<?php } else { ?>

	<!--link rel="stylesheet" type="text/css" media="all" href="/GLOBAL/global.css" /-->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="all" href="/GLOBAL/global-dev.css" />

	<?php } ?>

	<script type="text/javascript" src="/GLOBAL/global.js"></script>	
	<script type="text/javascript">

		// Google Analytics
		
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-5802235-2']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();

		function BlockMove(event) {
			var slider = document.getElementById("slider");
			if (slider) {
				event.preventDefault();
			}
		}
	</script>

</head>
<body onload="loaded();" ontouchmove="BlockMove(event);">

<?php

	$html  = "<div id='logo' class='homeClickContainer frontMax' onclick='location.href=\"index.html\";' style='cursor: pointer;'>";
	$html .= "&nbsp;</div>";
	$html .= "<div id='logo' class='logoContainer front' onclick='location.href=\"index.html\";' style='cursor: pointer;'>";
	$html .= "<a href='index.html' class='logo'>Modern Art</a>&nbsp;";
	$html .= "</div>";
	$html .= "<div id='menu' class='menuContainer menu front " . (( $pageName == 'index' ) ? "fixed" : "absolute") . "'>";
	$html .= "\n<div class='arrowContainer padModernArtName active'><a href='index.html'>" . (($pageName == 'index') ? "<img src='MEDIA/arrow-right.gif'>" : "<img src='MEDIA/arrow-left.gif'>") . "</a></div>";
	echo $html;			
?>
