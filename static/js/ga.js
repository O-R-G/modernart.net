// Google Analytics
		
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-5802235-2']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

function BlockMove(event) {
	var slider = document.getElementById("slider");
	if (slider) {
		event.preventDefault();
	}
}