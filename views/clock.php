<?
// F, full textual representation of the month eg January
// d, day of the month, with leading zeroes, eg 05
// Y, full numeric representation of the year, eg 1994
// H, 24-hour format, with leading zeroes, eg 08
// i, minutes with leading zeroes, eg 43
// s, seconds with leading zeroes, eg 32
// eg: January 05, 1994 08:43:32
$dt_fmt = "F d, Y H:i:s";

// Mon, 15 Aug 2005 15:52:01 +0000
// $dt_fmt = DateTime::RFC2822;
?><section id="clock"></section>

<script type="text/javascript">
	var start_time = '<? echo date($dt_fmt);?>';
	var server_date = new Date(start_time);
	window.onload = function()
	{
		display_time();
		setInterval(display_time, 1000);
	}
</script>