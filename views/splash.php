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

?><h1><a href="/main">Modern Art</a></h1>
<div id="splash" style="background-image: url('<? echo $url; ?>')"></div>