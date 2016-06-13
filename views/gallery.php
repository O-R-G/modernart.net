<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
    var els;
    var index;
    var gl;
    var o_src;
    
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
                    index = j;
                    for (var k = 0; k < cns.length; k++) {
                        if (cns[k].tagName == "IMG") {
                            gl = cns[k];
                            o_src = gl.src;
                        }
                    }
                }
            });
        }());
    }
    
    if (screenfull.enabled) {
        document.addEventListener(screenfull.raw.fullscreenchange, function() {
            if (!screenfull.isFullscreen)
            {
                coloured = document.getElementsByClassName('colour');
                for (var i = coloured.length-1; i >= 0; i--)
                    coloured[i].classList.remove("colour");
                // no image selected
                index = -1;
                gl.src = o_src;
                gl = null;
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
        index++;
        // wrap around to the beginning
        if (index == images.length)
            index = 0;
        gl.src = images[index];
    }
    
    function prev() {
        index--;
        // wrap around to the end
        if (index == -1)
            index = images.length - 1;
        gl.src = images[index];
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