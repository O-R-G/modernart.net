<?
$sql = "SELECT
            wires.fromid, wires.toid, 
            media.*
        FROM objects, wires, media 
        WHERE
            wires.fromid = 51 
            AND wires.toid = objects.id 
            AND media.object = wires.toid 
            AND objects.active = 1 
            AND wires.active = 1 
        ORDER BY RAND() LIMIT 1";

$res = $db->query($sql);
$m = $res->fetch_assoc();
$url = m_url($m);
?>
    <div id="splash-logo">
	    <a href="/main">MODERN ART</a>
    </div>
<a href="/main">
    <div id="splash-img" style="background-image: url('<? echo $url; ?>')"></div>
</a>
