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
?></section>
<section id="gallery" class="hidden" onclick="screenfull.toggle(); close_gallery(); ">
	<img id="gallery-img" class="centre">
	<div id="caption-div"></div>
</section>
<script type="text/javascript" src="/static/js/gallery.js"></script>
<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
	var images = <? echo json_encode($media_urls); ?>;
	var captions = <? echo json_encode($media_captions); ?>;
	
	var gallery_id = "gallery";
	var gallery_img = "gallery-img";
	var caption_div = "caption-div";
	
	var in_gallery = false;
	
	var index = 0;
	
	var nodes = document.body.childNodes;
		
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