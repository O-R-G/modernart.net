<?
// path to config file
$config = $_SERVER['DOCUMENT_ROOT']."/open-records-generator/config/config.php";
require_once($config);

// specific to this 'app'
$config_dir = $root."/config/";
require_once($config_dir."url.php");
require_once($config_dir."request.php");

require_once("lib/lib.php");

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();
$rr = new Request();

// self
if($uu->id)
	$item = $oo->get($uu->id);
else
	$item = $oo->get(0);
$name = ltrim(strip_tags($item["name1"]), ".");

// document title
$item = $oo->get($uu->id);
$title = $item["name1"];
$site_name = "Modern Art";
if ($title)
	$title = $site_name." | ".strip_tags($title);
else
	$title = $site_name;

// get / set cookies
if($rr->style)
{
	set_cookie("style", $rr->style);
}
else
{
	$rr->style = get_cookie("style");
}
$style = $rr->style;
?><!DOCTYPE html>
<html>
	<head>
		<title><? echo $title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" media="all" href="/static/css/main.css">
		<link rel="stylesheet" type="text/css" media="all" href="/static/css/ag.css">
		<link rel="stylesheet" type="text/css" media="all" href="/static/css/hnr.css">
		<link rel="stylesheet" type="text/css" media="all" href="/static/css/bg.css">
		<link rel="shortcut icon" type="image/png" href="/media/png/icon.png"/>
		<script type="text/javascript" src="/static/js/clock.js"></script>
	</head>
	<body>