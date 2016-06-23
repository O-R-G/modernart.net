<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
    var els;
    var index;
    var gl;
    var o_src;
    var debug = true;
    
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
                if (screenfull.enabled && !debug) {
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

                    // mostly for iOS
                    // show image max in one dimension with a black background
                    // this is in process
                    // prob change style of the element
                    // and still change to gallery view, just not in fullscreen
                    // perhaps use the loop above to populate gl.src
                    // just have to work out where gl is displayed

                    // maybe just a matter of changing the style on click w/js
                    // or just add a class?

                    // may have to have another div behind in fullwindow mode and write that in dynamically (yuck)
                    // or maybe better to just hide the background img etc
                    
                    console.log("Sorry, screenfull is not possible on this platform");
                    
                    // right now this is on the container element and need to go lower to get the element we want (use children)

                    e.className = "fullwindow";

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
    
    if (screenfull.enabled || debug) {
        document.addEventListener(screenfull.raw.fullscreenchange, function() {
            if (!screenfull.isFullscreen) {
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
        });
    }
    
    function next() {
        index++;
        
        // wrap around to the beginning
        if (index >= images.length)
            index = 0;
        
        // set 'gallery' source to new images
        gl.src = images[index];
    }
    
    function prev() {
        index--;
        
        // wrap around to the end
        if (index < 0)
            index = images.length - 1;

        // set 'gallery' source to new images
        gl.src = images[index];
    }
    
    document.onkeydown = function(e) {
        if(screenfull.isFullscreen || debug) {
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
