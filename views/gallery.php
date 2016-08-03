<script type="text/javascript" src="/static/js/screenfull.js"></script>
<script type="text/javascript">
    var thumbs = [];
    var imgs = [];
    var index;
    var o_src;
    var gallery;
    var fullscreen;
    var fullwindow=true;
    var debug;

    // desktop or mobile
    if (screenfull.enabled && !fullwindow) 
        fullscreen = true;
    else 
        fullwindow = true;

    // assign handlers    
    var thumbs = document.getElementsByClassName('thumb');
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
                this.previousElementSibling.style.display="block";
                this.style.display="none";
                if (fullscreen)
                    screenfull.request(thisimgcontainer);
                else 
                    imgcontainer.className = "img-container-fullwindow";
            });
            controlsnext.addEventListener('click', next); 
            controlsprev.addEventListener('click', prev); 
            controlsclose.addEventListener('click', function() {                
                this.parentElement.parentElement.style.display="none";
                this.parentElement.parentElement.nextElementSibling.style.display="block";
                if (fullscreen)
                    screenfull.exit();
                debuglog();
            });
            imgs.push(img);
        }());
    }
    
    // navigation 

    function next() {
        index++;
        if (index >= imgs.length)
            index = 0;
        gallery.src = imgs[index].src;
        gallery.className = imgs[index].className;
        debuglog();
    }

    function prev() {
        index--;
        if (index < 0)
            index = imgs.length - 1;
        gallery.src = imgs[index].src;
        gallery.className = imgs[index].className;
        debuglog();
    }

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
                    //thiscaption.style.display="block";
                    // console.log(thumbs);
                    // thumbs.children[0].style.display="none";
                    // screenfull.exit();
                    debuglog();
                    break;
                default: return; // exit this handler for other keys
            }
            e.preventDefault();
         }
    }

    function debuglog() {
        if (debug) {
            console.log("index = " + index + " / " + imgs.length);
            console.log("thisimgcontainer.innerHTML = " + thisimgcontainer.innerHTML);   
            console.log("gallery = " + gallery);   
            console.log("gallery.src = " + gallery.src);   
            console.log("gallery.className = " + gallery.className);   
            console.log("imgs[index] = " + imgs[index]);   
            console.log("imgs[index].src = " + imgs[index].src);   
            console.log("imgs[index].className = " + imgs[index].className);   
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
