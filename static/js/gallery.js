
// open the image gallery, starting at image i
function launch(i) {
	
	for(j = 0; j < nodes.length; j++)
	{
		n = nodes[j];
		if(n.tagName && n.tagName != "SCRIPT")
		{
			if(n.id != gallery_id)
				hide(n);
			else
				show(n);
		}
	}

	setsrc(gallery_img, images[i]);
	setcontents(caption_div, captions[i]);
	index = i; // store current image index
	
	if(!attached)
	{
		// document.addEventListener("click", gallery_listener);
	}
	// this is such a cheat
	// the setting of in_gallery needs to happen *after* the 
	// above eventListner is added to the document. URGH
	// setTimeout(function(){gallery_listener_set();}, 1000);
	in_gallery = true;
}

function gallery_listener_set() {
	// in_gallery = true;
}

function prev() {
	if(index == 0)
		index = images.length;
	index--;
	setsrc(gallery_img, images[index]);
	setcontents(caption_div, captions[index]);
}

function next() {
	if(index == images.length-1)
		index = -1;
	index++;
	setsrc(gallery_img, images[index]);
	setcontents(caption_div, captions[index]);
}

function close_gallery() {
	in_gallery = false;
	
	for(j = 0; j < nodes.length; j++)
	{
		n = nodes[j];
		if(n.tagName && n.tagName != "SCRIPT")
		{
			if(n.id == gallery_id)
				hide(n);
			else
				show(n);
		}
	}
	if(attached)
	{
		// document.removeEventListener("click", gallery_listener);
	}
	attached = false;
}

// use arrow keys for navigation within the gallery
document.onkeydown = function(e) {
	if(in_gallery) {
		e = e || window.event;
		switch(e.which || e.keyCode) {
			case 37: // left
				prev();
			break;
			case 39: // right
				next();
			break;
			case 27: // esc
				close_gallery();
			break;
			default: return; // exit this handler for other keys
		}
		e.preventDefault();
	}
}

function setbg(id, url) {
	// get element
	el = document.getElementById(id);
	
	// build bg style
	bi = "url('/".concat(url).concat("')");
	el.style.backgroundImage = bi;
}

function setsrc(id, url) {
	// get element
	el = document.getElementById(id);
	el.src = url;
}

function setcontents(id, val) {
	el = document.getElementById(id);
	el.innerHTML = val;
}

function hide(el)
{
	el.classList.remove("visible");
	el.classList.add("hidden");
}

function show(el)
{
	el.classList.remove("hidden");
	el.classList.add("visible");
}

function gallery_listener(e)
{
	var level = 0;
	attached = true;
  	for(var element = e.target; element; element = element.parentNode) {
		if(element.id === 'img-gallery') {
			next();
			return;
		}
		level++;
	}
  	console.log("not img-gallery clicked");
}