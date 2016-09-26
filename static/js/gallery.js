// requires screenfull.js
// requires html/css as:
//  .thumb
//    .img-container
//      .square
//        .controls
//      .img centered [wide][tall]
//    .caption

var thumbs = [];
var imgcontainers  = [];
var captions = [];
var imgs = [];
var index;
var o_src;
var gallery;
var fullscreen;
var fullwindow;
var debug;

// desktop or mobile

if (screenfull.enabled && !fullwindow) 
    fullscreen = true;
else 
    fullwindow = true;

// assign handlers    

var thumbs = document.getElementsByClassName('thumb');
var imgcontainers = document.getElementsByClassName('img-container');
var captions = document.getElementsByClassName('caption');

for (var i = 0; i < thumbs.length; i++) {
    ( function () {
        // ( closure ) -- retains state of local variables
        var imgcontainer = imgcontainers[i];
        var caption = captions[i];
        var img = imgcontainer.children[1];          
        var controlsnext = imgcontainer.children[0].children[0];
        var controlsprev = imgcontainer.children[0].children[1];
        var controlsclose = imgcontainer.children[0].children[2];
        var j = i;

        caption.addEventListener('click', function() {
            index = j;
            gallery = img;
            var thisimgcontainer = this.previousElementSibling;
            thisimgcontainer.style.display="block";
            this.style.display="none";
            this.parentElement.parentElement.className="";  // rm parent "transform"
            if (fullscreen) {
                screenfull.request(thisimgcontainer);
            } else { 
                imgcontainer.className = "img-container-fullwindow";
                readdeviceorientation();
            }
        });
        controlsnext.addEventListener('click', next); 
        controlsprev.addEventListener('click', prev); 
        controlsclose.addEventListener('click', function() {                
            var thisimgcontainer = this.parentElement.parentElement; 
            var thiscaption = thisimgcontainer.nextElementSibling;
            thisimgcontainer.style.display="none";
            thiscaption.style.display="block";
            this.parentElement.parentElement.parentElement.parentElement.className="centered";
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
                var thisimgcontainer = gallery.parentElement;
                var thiscaption = thisimgcontainer.nextElementSibling;
                thisimgcontainer.style.display="none";
                thisimgcontainer.parentElement.parentElement.className="centered";
                thiscaption.style.display="block";   
                debuglog();
                break;
            default: return; // exit this handler for other keys
        }
        e.preventDefault();
     }
}

if (screenfull.enabled) {
    document.addEventListener(screenfull.raw.fullscreenchange, function() {
        if (!screenfull.isFullscreen) {
            resetthumbnail();
        }
    });
}

// iOS device orientation

function readdeviceorientation() {
    var thisimgcontainer = gallery.parentElement;
    if (Math.abs(window.orientation) === 90) {
        thisimgcontainer.style.display="block";
        // document.getElementById("orientation").innerHTML = "LANDSCAPE";
    } else {
        // for the moment, show regular full window
        // would like to instead prompt to rotate phone
        // but perhaps for now this is best
        // thisimgcontainer.style.display="none";
        thisimgcontainer.style.display="block";
        // document.getElementById("orientation").innerHTML = "PORTRAIT";
    }
}

window.onorientationchange = readdeviceorientation;

// utility

function resetthumbnail() {
    for (var i = imgcontainers.length-1; i >= 0; i--)
        imgcontainers[i].style.display="none";
    for (var i = captions.length-1; i >= 0; i--)
        captions[i].style.display="block";
    index = -1;
    gallery = null;
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
