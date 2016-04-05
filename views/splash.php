<?
$sql = "SELECT *
		FROM media
		WHERE 
			active = 1
		ORDER BY RAND()
		LIMIT 1";
$res = $db->query($sql);
$m = $res->fetch_assoc();

$url = m_url($m);

?><h1><a href="/main">modern art</a></h1>
<!-- div id="splash" style="background-image: url('<? echo $url; ?>')"></div-->
<div id="splash">
	<img src="<? echo $url; ?>">
</div>