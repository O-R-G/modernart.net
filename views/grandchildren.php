<?
$children = $oo->children($uu->id);
?><div id="children"><?
	foreach($children as $c)
	{
	    $url = $uu->url."/".$c['url'];
		$tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($tmp);
		$grandchildren = $oo->children($c['id']);
		?><section class="child">
		    <header><? echo $name; ?></header><?
		    foreach($grandchildren as $gc)
		    {
		        $u = $url."/".$gc['url'];
		        $tmp = trim(strip_tags($gc['name1'], '<i><b>'));
		        $name = nl2br($tmp);
                ?><div><a href="<? echo $u; ?>"><? echo $name; ?></a></div><?
		    }
		?></section><?
	}
?></div>