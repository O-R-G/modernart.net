<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
    var thumbs = [];
    var images = [];
    var index;
    var o_src;
    var fullscreen;
    // var fullwindow;
    var fullwindow = true;  // dev
    var debug = false;

    // desktop or mobile
    if (screenfull.enabled && !fullwindow) 
        fullscreen = true;
    else 
        fullwindow = true;

    // assign handlers    
    thumbs = document.getElementsByClassName('thumb');
    for (var i = 0; i < thumbs.length; i++) {
        ( function () {
            // ( closure ) -- retains state of local variables
            var imgcontainer = thumbs[i].children[0];
            var caption = thumbs[i].children[1];
            var img = imgcontainer.children[1];          
            var controlsnext = imgcontainer.children[0].children[0];
            var controlsprev = imgcontainer.children[0].children[1];
            var controlsclose = imgcontainer.children[0].children[2];
            var j = i;
    
            caption.addEventListener('click', function() {
                index = j;
                gallery = img;
                thisimgcontainer = this.previousElementSibling;
                thisimgcontainer.style.display="block";
                this.style.display="none";
                if (fullscreen) {
                    screenfull.request(thisimgcontainer);
                } else {
                    imgcontainer.className = "img-container-fullwindow";
                    wide_tall = dimensions[j];
                    img.className = "centered " + wide_tall;
                    // ** fix ** update wide_tall in next
                    // but may be a simpler way of doing this and making it work
                    // console.log("img.className = " + img.className);
                }
            });
            controlsnext.addEventListener('click', next); 
            controlsprev.addEventListener('click', prev); 
            controlsclose.addEventListener('click', function() {                
                index = j;
                gallery = img;
                thiscaption = thisimgcontainer.nextElementSibling;
                thiscaption.style.display="block";
                thisimgcontainer = this.parentElement.parentElement;
                thisimgcontainer.style.display="none";
                if (fullscreen)
                    screenfull.exit();
                debuglog();
            });
            images.push(img);
        }());
    }
    
    // navigation 
    function next() {
        index++;
        if (index >= images.length)
            index = 0;
        gallery.src = images[index];
        debuglog();
    }
    function prev() {
        index--;
        if (index < 0)
            index = images.length - 1;
        gallery.src = images[index];
        debuglog();
    }

    // ** fix ** catch escape key, refs not working

    document.onkeydown = function(e) {
        if(screenfull.isFullscreen || fullwindow) {
            e = e || window.event;
            switch(e.which || e.keyCode) {
                case 37: // left
                    prev();
                    break;
                case 39: // right
                    next();
                    break;
                case 27: // esc
                    // "this" is ambiguous
                    // and might be better to have a reset function ()
                    // as will be used by the "x" close box
                    thiscaption.style.display="block";
                    // thiscaption = this.nextElementSibling;
                    // thisimgcontainer.style.display="none";
                    // this.style.display="none";
                    screenfull.exit();
                    debuglog();
                    break;
                default: return; // exit this handler for other keys
            }
            e.preventDefault();
         }
    }

    function debuglog() {
        if (debug) {
            console.log("index = " + index + " / " + images.length);
            console.log("thisimgcontainer.innerHTML = " + thisimgcontainer.innerHTML);   
            console.log(gallery);   
            console.log(gallery.tagName);   
            console.log("gallery.src = " + gallery.src);   
            console.log("images[index] = " + images[index]);   
            console.log("this.innerHTML = " + this.innerHTML);
            console.log("+");
        }
    }





/*    
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

*/

</script>
