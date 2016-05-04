<section id="gallery" class="hidden" onclick="screenfull.toggle(); close_gallery();">
	<img id="gallery-img" class="centre">
</section>
<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
    var els;
    els = document.getElementsByClassName('img-container');
    for (var i = 0; i < els.length; i++)
    {
        // for some reason this has to be in a closure?
        // something about variable hoisting and var declarations get pulled
        // to the top of the function scope
        (function () {
            var e = els[i];
            e.addEventListener('click', function() {
                if (screenfull.enabled) {
                    screenfull.toggle(e);
                }
            });
        }());
    }
    // get rid visible yellow box behind images
    window.onload = function(){
    	var img_containers = document.getElementsByClassName("img-container");
    	for(i = 0; i < img_containers.length; i++)
    	{
    		img_containers[i].classList.add("yellow-bg");
    	}
    };
</script>