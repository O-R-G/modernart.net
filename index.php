<?
$uri = explode('/', trim($_SERVER['REQUEST_URI'], "/"));

// only html head -- no content
require_once('views/head.php');


require_once('views/logo.php');
require_once("views/clock.php");

// splash page
if(empty($uri[0]))
	require_once("views/splash.php");
// everything else
else
{
	// single exhibition page
	if($uri[1] == "exhibitions" && count($uri) > 3)
		require_once("views/exhibition.php");
	elseif($uri[1] == "artists" && count($uri) > 2)
		require_once("views/artist.php");
	else
	{
		require_once("views/contact.php");
		require_once("views/children.php");
	}
	
	// bottom menu
	require_once("views/menu.php");
}

// close body, close html
require_once('views/foot.php');
?>