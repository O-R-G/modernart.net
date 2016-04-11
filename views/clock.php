<?
$dt_fmt = "F d, Y H:i:s";
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