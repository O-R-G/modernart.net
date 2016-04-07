<?
$media = $oo->media($uu->id);
$image_urls = array();
$i = 0;
foreach($media as $m)
{
	$url = m_url($m);
	$image_urls[] = $url;
	$caption = $m['caption'];
}
$body = $item['body'];
$children = $oo->children($uu->id);

if($children)
{
?><section id="exhibition" class="visible">
	<header><? echo nl2br($item['name1']); ?></header><?
	$url = $image_urls[0];
	$caption = $media[0]['caption'];
	?><div class="thumb">
		<div class="img-container" onclick="launch(<? echo $i++; ?>);">
			<img src="<? echo $url; ?>" class="fullscreen">
		</div>
		<div class="caption"><? echo $caption; ?></div>
	</div><? 
	$cbody = $children[0]['body'];
	$cbody = trim($cbody);
	$cbody = strip_tags($cbody, "<i><b><a>");
	$cbody = nl2br($cbody);
	echo $cbody;
?></section><?
}
else
{
?><div id="body" class="visible"><? echo nl2br($body); ?></div><?
}
?><div id="gallery" class="hidden" onclick="close_gallery();">
	<img id="gallery-img" class="centre">
</div>
<script type="text/javascript" src="/static/js/gallery.js"></script>
<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
	var images = <? echo json_encode($image_urls); ?>;
	var gallery_id = "gallery";
	var gallery = document.getElementById(gallery_id);
	var gallery_img = "gallery-img";
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