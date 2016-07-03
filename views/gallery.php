<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
    var elements;
    var index;
    var gl;
    var o_src;
    var debug = true;
    // temporary, set in artist.php read from a cookie to show fullwindow
    // var fullwindow;
    var windowfull;

    elements = document.getElementsByClassName('img-container');
    for (var i = 0; i < elements.length; i++)
    {
        // for some reason this has to be in a closure?
        // something about variable hoisting and var declarations get pulled
        // to the top of the function scope
        (function () {
            var j = i;
            var e = elements[i];
            var cns = e.childNodes;
            e.addEventListener('click', function() {
                if (screenfull.enabled && !fullwindow) {
                    e.classList.add("colour");
                    screenfull.toggle(e);
                    index = j;
                    for (var k = 0; k < cns.length; k++) {
                        if (cns[k].tagName == "IMG") {
                            gl = cns[k];
                            o_src = gl.src;
                        }
                    }
                } else {
                    // show image in browser window max h | w on black bg

                    windowfull = !windowfull;
                    if (debug) console.log("screenfull not possible on this platform, using windowfull");
                    if (debug) console.log("windowfull = " + windowfull);
                    if (windowfull) {
                        e.className = "img-container-fullwindow";

                        // wide or tall?
                        wide_tall = dimensions[j];
                        e.getElementsByTagName("IMG")[0].className = "centered " + wide_tall;

                        // populate
                        index = j;
                        for (var k = 0; k < cns.length; k++) {
                            if (cns[k].tagName == "IMG") {
                                gl = cns[k];
                                o_src = gl.src;
                            }
                        } 
                    } else {
                        resetthumbnail();

                        // hide big, show thumb
                        e.className = "img-container dev";

                        // wide or tall?
                        wide_tall = dimensions[j];
                        e.getElementsByTagName("IMG")[0].className = "fullscreen bottom " + wide_tall;
                    }
                }
            });
        }());
    }
    
    if (screenfull.enabled) {
        document.addEventListener(screenfull.raw.fullscreenchange, function() {
            if (!screenfull.isFullscreen) {
                resetthumbnail();
            }
        });
    }
    
    function resetthumbnail() {                
        // set the image source back to original
        gl.src = o_src;
                    
        // de-colourise
        coloured = document.getElementsByClassName('colour');
        for (var i = coloured.length-1; i >= 0; i--)
            coloured[i].classList.remove("colour");
        
        // no image selected
        index = -1;
        gl = null;
    }

    function next() {
        index++;
                
        // wrap around to the beginning
        if (index >= images.length)
            index = 0;

        // set 'gallery' source to new images
        gl.src = images[index];

        // wide or tall?
        if (windowfull) {
            wide_tall = dimensions[index];
            gl.className = "centered " + wide_tall;
        }
    }
    
    function prev() {
        index--;

        // wrap around to the end
        if (index < 0)
            index = images.length - 1;

        // set 'gallery' source to new images
        gl.src = images[index];

        // wide or tall?
        if (windowfull) {
            wide_tall = dimensions[index];
            gl.className = "centered " + wide_tall;
        }
    }
    
    document.onkeydown = function(e) {
        if(screenfull.isFullscreen || windowfull) {
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
