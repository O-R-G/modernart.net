<?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
$i = 0;
foreach($media as $m)
{
	$media_urls[] = m_url($m);
	$media_captions[] = $m['caption'];	
}
$body = $item['body'];
$children = $oo->children($uu->id);

?><section id="exhibition" class="visible">
	<header><? echo nl2br($item['name1']); ?></header><?
	$url = $media_urls[0];
	$caption = $media_captions[0];
	if($url)
	{
	?><figure>
		<div class="img-container" onclick="launch(<? echo $i++; ?>);">
			<img src="<? echo $url; ?>" class="fullscreen">
		</div>
		<div class="caption"><? echo $caption; ?></div>
	</figure><?
	}
	if($children)
	{
		$cbody = $children[0]['body'];
		$cbody = trim($cbody);
		$cbody = strip_tags($cbody, "<i><b><a>");
		$cbody = nl2br($cbody);
		echo $cbody;
	}
	else
	{
		echo nl2br($body);
	}
?></section><?
require_once("gallery.php");
?>