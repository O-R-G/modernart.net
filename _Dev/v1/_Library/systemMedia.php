<?php




  /////////////
 //  Media  //
/////////////

function systemMedia($file = null, $caption = null, $style = null, $link = null) {

	$status = false;

	$temp = explode(".", $file);
	$type = strtolower($temp[sizeof($temp) - 1]);
	$link = htmlspecialchars($link);

	if ($type == "gif") $status = mediaGIF($file, $caption, $style);
	if ($type == "jpg" || $type == "jpeg") $status = mediaJPEG($file, $caption, $style);
	if ($type == "pdf") $status = mediaPDF($file, $caption, $style, $link);
	if ($type == "swf") $status = mediaFlash($file, $caption, $style, $link);
	if ($type == "mov" || $type == "mp4" || $type == "m4a") $status = mediaQuicktime($file, $caption, $style, $link);

	return $status;
}








  /////////////
 //  Flash  //
/////////////

function mediaFlash($file, $caption, $style, $link) {

	$status = false;

	if (!$style) $style = "width: 320px; height: 240px;";
	if (!$link) $link = $file;

	$media  ="<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' ";
	$media .="\n\tcodebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0' ";
	$media .="\n\tid='$link' ";
	$media .="\n\talign='middle'";
	$media .="\n\tstyle='$style'>";
	$media .="\n\t<param name='allowScriptAccess' value='sameDomain' />";
	$media .="\n\t<param name='$link' value='$file' />";
	$media .="\n\t<param name='quality' value='high' />";
	$media .="\n\t<param name='bgcolor' value='#000000' />";

	$media .="\n\t<embed src='$file' ";
	$media .="\n\t\talign='middle' ";
	$media .="\n\t\tname='$link' ";
	$media .="\n\t\tstyle='$style' ";
	$media .="\n\t\tquality='high' ";
	$media .="\n\t\tscale='noborder' ";
	$media .="\n\t\tallowScriptAccess='sameDomain' ";
	$media .="\n\t\ttype='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' />";
	$media .="\n</object>";
	$status = $media;

	return $status;
}




  ///////////
 //  GIF  //
///////////

function mediaGIF($file, $caption, $style) {

	$status = false;

	$media  = "<img src='$file' style='";
	$specs  = getimagesize($file);
	$media .= "width: ". $specs[0] ."px; height: ". $specs[1] ."px;";

	if ($style)   $media .= " ". $style;
	$media .= "'";
	if ($caption) {
		$media .= " alt='$caption'";
		$media .= " title='$caption'";
	}
	$media .= " />";
	$status = $media;

	return $status;
}




  ////////////
 //  JPEG  //
////////////

function mediaJPEG($file, $caption, $style) {

	$status = false;

	$media  = "<img src='$file' style='";
	$specs  = getimagesize($file);
	$media .= "width: ". $specs[0] ."px; height: ". $specs[1] ."px;";
	
	if ($style)   $media .= " ". $style;
	$media .= "'";
	if ($caption) {
		$media .= " alt='$caption'";
		$media .= " title='$caption'";
	}
	$media .= " />";
	$status = $media;

	return $status;
}




  ///////////
 //  PDF  //
///////////

function mediaPDF($file, $caption, $style, $link) {

	$status = false;

	$media  = "<a href='$file'";
	if ($style)   $media .= " style='$style' "; 
	if ($caption) $media .= " title='$caption' "; 
	if (!$link) $link = $file;

	$media .= " target='_blank'>";
	$media .= $link;
	$media .= "</a>";
	$status = $media;

	return $status;
}




  /////////////////
 //  Quicktime  //
/////////////////

function mediaQuicktime($file, $caption, $style, $link) {

	$status = false;

	if (!$style) $style = "width: 320px; height: 255px;";
	if (!$link) $link = $file;

	$media  = "<object classid='clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B' ";
	$media .= "\n\tcodebase='http://www.apple.com/qtactivex/qtplugin.cab' ";
	$media .= "\n\tstyle='$style' ";
	$media .= "\n\tid='$link'>";
	$media .= "\n\t<param name='src' value='$file' />";
	$media .= "\n\t<param name='kioskmode' value='true' />";
	$media .= "\n\t<param name='controller' value='true' />";
	$media .= "\n\t<embed style='$style' ";
	$media .= "\n\t\tsrc='$file' ";
	$media .= "\n\t\tname='$link' ";
	$media .= "\n\t\tautoplay='true' ";
	$media .= "\n\t\tcontroller='true' ";
	$media .= "\n\t\tloop='true' ";
	//$media .= "\n\t\tkioskmode='true' ";
	$media .= "\n\t\tenablejavascript='true'>";
	$media .= "\n\t</embed>";
	$media .= "\n</object>";
	$status = $media;

	return $status;
}








?>