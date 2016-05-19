<?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
?>
<section id="artist-detail">
	<header id="artist-name"><? echo trim($item['name1']); ?></header>
	<figure><?
	$i = 0;
	foreach($media as $m)
	{
		$url = m_url($m);
		$caption = $m['caption'];
		$media_urls[] = $url;
		$media_captions[] = $caption;
	?>
	<div class="thumb">
		<div class="img-container">
		    <div class="background-img" style="background-image:url('<? echo $url; ?>')"></div>
			<img src="<? echo $url; ?>" class="fullscreen">
		</div>
		<div class="caption"><? echo $caption; ?></div>
	</div><?
	}
	?></figure><?

$body = $item['body'];
$cv = $oo->children($uu->id)[0];

if($cv)
{
    $url = implode("/", $uu->urls);
    $url = "/".$url."/".$cv['url'];
    ?><a href="<? echo $url; ?>">C.V.</a><?
/*
	$cbody = $cv['body'];
	$cbody = trim($cbody);
	$cbody = strip_tags($cbody, "<i><b><a>");
	$cbody = nl2br($cbody);
	echo "— <br /><br/>"; // can this be done in css?
	echo $cbody;
*/
}
else
{
	echo nl2br($body);
}
require_once("gallery.php")
?></section>
