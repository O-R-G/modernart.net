<?
$uri = explode('/', trim($_SERVER['REQUEST_URI'], "/"));
$view = "views/";

if(empty($uri[0]))
	$view.="splash.php";
else
	$view.="menu.php";

require_once('views/head.php');
require_once($view);
require_once('views/foot.php');
?>