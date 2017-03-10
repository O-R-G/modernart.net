<?
$children = $oo->children($uu->id);
?><div id="exhibition-list"><?
	foreach($children as $c)
	{
	    $url = $uu->url."/".$c['url'];
		$tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($tmp);
		$grandchildren = $oo->children($c['id']);
		?><section class="exhibition-year">
		    <header><? echo $name; ?></header><?
		    foreach($grandchildren as $gc)
		    {
		        $tmp = trim(strip_tags($gc['name1'], '<i><b><br></br>'));
		        $name = nl2br($tmp);
                if (substr($name, 0, 1) == ":") $url = null;
                $name = ltrim($name, ":");
                if ($url) 
    		        $u = $url."/".$gc['url'];
                else 
                    $u = null;
                ?><div class="exhibition exhibition-name">
                    <a href="<? echo $u; ?>"><? echo $name; ?></a>
                </div><?
		    }
		?></section><?
	}
?></div>
