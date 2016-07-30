<?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
$media_dims = array();
?>
<section id="artist-detail">
	<header id="artist-name"><? echo nl2br(trim($item['name1'])); ?></header>
	<figure><?
	$i = 0;
	foreach($media as $m)
	{
		$url = m_url($m);
		$caption = $m['caption'];
		$media_urls[] = $url;
		$media_captions[] = $caption;
        $relative_url = "media/" . m_pad($m['id']).".".$m['type'];
        $size = getimagesize($relative_url);
        $wide_tall = (($size[0] >= $size[1]) ? wide : tall);
        $media_dims[] = $wide_tall;
	?>
	<div class="thumb">
		<div class="img-container colour">        
            <div class="square"></div>
            <img src="<? echo $url; ?>" class="fullscreen bottom <? echo $wide_tall; ?>">
		</div>
		<div class="caption">> <? echo $caption; ?></div>
	</div><?
	}
	?></figure><?

$body = $item['body'];
$cv = $oo->children($uu->id)[0];

if($cv)
{
    $url = implode("/", $uu->urls);
    $url = "/".$url."/".$cv['url'];
    ?><a href="<? echo $url; ?>"><? echo $cv['name1']; ?></a><?
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
<script>
    var images = <? echo json_encode($media_urls); ?>;
    var dimensions = <? echo json_encode($media_dims); ?>;
    var fullwindow = <? echo $fullwindow; ?>;
</script>
