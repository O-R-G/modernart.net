<?php 
	require_once("_Library/systemDatabase.php"); 
	require_once("_Library/displayNavigation.php");


	// Parse $Id

	if ( !$id ) $id = "1";
	$ids = explode(",", $id);
	$idFull = $id;
	$id = $ids[count($ids) - 1];


	//  Document header

	$pageName = basename($PHP_SELF, ".html");

	if ($documentTitle) {
	
		$documentTitle = date('j F Y g:i a') . " / ". $documentTitle;

	} else {

		$documentTitle = date('j F Y g:i a');
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
	<!--
	<script type="text/javascript" src="_Moo/mootools-1.2.4-core.js"></script>
	<script type="text/javascript" src="_Moo/mootools-1.2.4-more.js"></script>
	<script type="text/javascript" src="_Moo/Element.swipeEvent.js"></script>
	<script type="text/javascript" src="_Moo/moo-scroll-arrows.js"></script>
	<script type="text/javascript">

		Demo = {};

		window.addEvent('domready', function() {
		Demo.scc = new Scroller($('scrollc'), {duration: 250, autostart: false, sleep: 1000,leftm:0,topm:0, selectBy: 'class'});
		});
		
	</script>
	-->
</head>
<body>


<?php

	$html  = "<div id='menu' class='menuContainer menu'>";
	$html .= "<a href='index.html' class='logo'>Modern Art</a>&nbsp;";
	$html .= "\n<div class='menuItemContainer active'><a href='index.html'>" . (($pageName == 'index') ? "<img src='MEDIA/arrow-right.gif'>" : "<img src='MEDIA/arrow-left.gif'>") . "</a></div>";
	echo $html;			
?>