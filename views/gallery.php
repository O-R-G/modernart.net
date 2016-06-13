<!-- section id="gallery" class="hidden" onclick="screenfull.toggle(); close_gallery();">
	<img id="gallery-img" class="centre">
</section -->
<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
    var els;
    var curr_img;
    
    els = document.getElementsByClassName('img-container');
    for (var i = 0; i < els.length; i++)
    {
        // for some reason this has to be in a closure?
        // something about variable hoisting and var declarations get pulled
        // to the top of the function scope
        (function () {
            var j = i;
            var e = els[i];
            var cns = e.childNodes;
            e.addEventListener('click', function() {
                if (screenfull.enabled) {
                    e.classList.add("colour");
                    screenfull.toggle(e);
                    curr_img = j;
                    e.id = "gallery";
                }
            });
        }());
    }
    
    if (screenfull.enabled) {
        document.addEventListener(screenfull.raw.fullscreenchange, function() {
            if (!screenfull.isFullscreen)
            {
                var fs = document.getElementById("gallery");
                coloured = document.getElementsByClassName('colour');
                for (var i = coloured.length-1; i >= 0; i--)
                    coloured[i].classList.remove("colour");
                // no image selected
                curr_img = -1;
                fs.id = "";
            }
        });
    }

    // get rid visible yellow box behind images
    window.onload = function(){
    	var img_containers = document.getElementsByClassName("img-container");
    	for(i = 0; i < img_containers.length; i++)
    	{
    		img_containers[i].classList.add("yellow-bg");
    	}
    };
    
    function next() {
        var gallery = document.getElementById("gallery");
        var gallery_bg = gallery.childNodes[3];
        
        if (curr_img == images.length - 1)
            curr_img = -1;

        curr_img++;
        gallery_bg.src = images[curr_img];
    }
    
    function prev() {
        var gallery = document.getElementById("gallery");
        var gallery_bg = gallery.childNodes[3];
        
        if (curr_img == 0)
            curr_img = images.length;

        curr_img--;
        gallery_bg.src = images[curr_img];
    }
    
    function set_bg(el, url) {
        bi = "url('/".concat(url).concat("')");
        el.style.backgroundImage = bi;    
    }
    
    document.onkeydown = function(e) {
        if(screenfull.isFullscreen) {
            e = e || window.event;
            switch(e.which || e.keyCode) {
                case 37: // left
                    prev();
                break;
                case 39: // right
                    next();
                break;
                default: return; // exit this handler for other keys
            }
            e.preventDefault();
        }
    }
</script>