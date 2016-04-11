<?

// requires:
// php arrays $media_urls and $media_captions

?><section id="gallery" class="hidden" onclick="screenfull.toggle(); close_gallery();">
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
	var e = document.getElementById(gallery_id);
	for(j = 0; j < els.length; j++)
	{
		els[j].addEventListener('click', function() {
			if(screenfull.enabled) {
				// screenfull.toggle(els[j]);
				//screenfull.toggle(e);
				screenfull.toggle();
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