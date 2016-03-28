<?
$media = $oo->media($uu->id);
$image_urls = array();
?><div id="images"><?
	$i = 0;
	foreach($media as $m)
	{
		$url = m_url($m);
		$image_urls[] = $url;
		$caption = $m['caption'];
		
	?><div class="thumb">
		<div onclick="launch(<? echo $i++; ?>);"><img src="<? echo $url; ?>" class="fullscreen"></div>
		<div class="caption"><? echo $caption; ?></div>
	</div><?
	}
?></div>
<div id="gallery" class="hidden" onclick="close_gallery();">
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
	var non_gallery = ["main", "images"];
	
	var els = document.getElementsByClassName('fullscreen');
	for(j = 0; j < els.length; j++)
	{
		els[j].addEventListener('click', function() {
			if(screenfull.enabled) {
				screenfull.toggle(els[j]);
			}
		});
	}
</script>