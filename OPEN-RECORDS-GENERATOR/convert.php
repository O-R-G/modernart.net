<?php
require_once("GLOBAL/config.php");
dbConnectMain(1);

include('_Extensions/SimpleImage.php');
$lower = 3517;
$upper = 3520;
$media_path = "../MEDIA/";
$hi_path = $media_path."_HI/";

$sql = "SELECT id, type
		FROM media
		WHERE id >= $lower
		AND id <= $upper";

$result = MYSQL_QUERY($sql);

while($myrow = MYSQL_FETCH_ARRAY($result))
{
	$target_file = STR_PAD($myrow["id"], 5, "0", STR_PAD_LEFT).".".$myrow['type'];
	
	// use hi res file as source image
	$src = $hi_path.$target_file;
	$dest = $media_path.$target_file;

	try {
		$img = new abeautifulsite\SimpleImage($dest);
	}
	catch(Exception $e) {
		echo "caught exception: ", $e->getMessage(), "\n";
	}

	// scale down hi-res to medium-res, for desktop
	$target = $media_path.$target_file;
	unlink($target);
	$img->save($target, 70);
	
	// lo-res, for mobile

}

?>