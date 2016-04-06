<?
$uri = explode('/', trim($_SERVER['REQUEST_URI'], "/"));
$view = "views/";

if(empty($uri[0]))
	$view.="splash.php";
else
	$view.="menu.php";

require_once('views/head.php');
require_once('views/logo.php');
if(empty($uri[0]))
	require_once("views/splash.php");
else
{
	require_once("views/menu.php");
	require_once("views/body.php");
}
require_once('views/foot.php');
?>