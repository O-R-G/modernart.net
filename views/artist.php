<?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
?><section id="artist" class="visible">
	<header><? echo $item['name1']; ?></header>
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
		<div class="img-container" onclick="launch(<? echo $i++; ?>);">
			<img src="<? echo $url; ?>" class="fullscreen">
		</div>
		<div class="caption"><? echo $caption; ?></div>
	</div><?
	}
	?></figure><?

$body = $item['body'];
$children = $oo->children($uu->id);

if($children)
{
	$cbody = $children[0]['body'];
	$cbody = trim($cbody);
	$cbody = strip_tags($cbody, "<i><b><a>");
	$cbody = nl2br($cbody);
	echo "— <br /><br/>";
	echo $cbody;
}
else
{
	echo nl2br($body);
}
?></section>
<?
require_once("gallery.php")
?>
