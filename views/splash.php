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

?><!-- div id="splash" style="background-image: url('<? echo $url; ?>')"></div-->
<div id="splash">
	<a href="/main"><img src="<? echo $url; ?>"></a>
</div>