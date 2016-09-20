<?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
$media_dims = array();
$body = $item['body'];
$cv = $oo->children($uu->id)[0];
?>
<section id="artist-detail">
	<header id="artist-name" class="center"><? echo nl2br(trim($item['name1'])); ?></header>
	<figure id="children"><?
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
		<div class="img-container">
            <div class="square">
                <div class="controls next white">></div>
                <div class="controls prev white"><</div>
                <div class="controls close white">x</div>
                <!-- <p id="orientation" class="controls centered white">Rotate device to determine orientation</p> -->
            </div>
            <img src="<? echo $url; ?>" class="centered <? echo $wide_tall; ?>">
		</div>
		<div class="caption">> <? echo $caption; ?></div>
	</div><?
	}
    if($cv) {
        $url = implode("/", $uu->urls);
        $url = "/".$url."/".$cv['url'];
        ?><div id="cv" class="clear">
            <a href="<? echo $url; ?>" class="clear"><? echo $cv['name1']; ?></a>
        </div><?
    }
	?></figure><?
    if(!$cv) {
        ?><div id="cv" class="clear"><? 
        echo nl2br($body);
        ?></div><?
    }
?></section>
<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript" src="/static/js/gallery.js"></script>
<script>
    var images = <? echo json_encode($media_urls); ?>;
    var dimensions = <? echo json_encode($media_dims); ?>;
</script>
