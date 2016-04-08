<?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
?><div id="images" class="visible"><?
	$i = 0;
	foreach($media as $m)
	{
		$url = m_url($m);
		$caption = $m['caption'];
		$media_urls[] = $url;
		$media_captions[] = $caption;
	?><div class="thumb">
		<div class="img-container" onclick="launch(<? echo $i++; ?>);">
			<img src="<? echo $url; ?>" class="fullscreen">
		</div>
		<div class="caption"><? echo $caption; ?></div>
	</div><?
	}
?></div><?

$body = $item['body'];
$children = $oo->children($uu->id);
?><section id="body" class="visible">
	<header><? echo $item['name1']; ?></header><?
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
?></section>
<div id="gallery" class="hidden" onclick="close_gallery();">
	<img id="gallery-img">
	<div id="caption-div"></div>
</div>
<script type="text/javascript" src="/static/js/gallery.js"></script>
<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
	var images = <? echo json_encode($media_urls); ?>;
	var captions = <? echo json_encode($media_captions); ?>;
	var gallery_id = "gallery";
	var gallery = document.getElementById(gallery_id);
	var gallery_img = "gallery-img";
	var caption_div = "caption-div";
	var attached = false;
	var index = 0;
	var in_gallery = false;
	var non_gallery = ["main", "images", "body"];
	
	var els = document.getElementsByClassName('fullscreen');
	for(j = 0; j < els.length; j++)
	{
		els[j].addEventListener('click', function() {
			if(screenfull.enabled) {
				screenfull.toggle(els[j]);
			}
		});
	}
	
	document.addEventListener(screenfull.raw.fullscreenchange, on_fs_toggle, false);
	
	function on_fs_toggle()
    {
    	if(!(screenfull.isFullscreen))
    	{
    		close_gallery();
    	}
    }
</script>