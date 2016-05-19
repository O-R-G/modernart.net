<?
$children = $oo->children($uu->id);
?><div id="book-list"><?
	foreach($children as $c)
	{
	    $url = $uu->url."/".$c['url'];
		$tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($tmp);
		$grandchildren = $oo->children($c['id']);
		?><section class="author">
		    <!-- header><? echo $name; ?></header --><?
		    foreach($grandchildren as $gc)
		    {
		        $u = $url."/".$gc['url'];
		        $tmp = trim(strip_tags($gc['name1'], '<i><b>'));
		        $name = nl2br($tmp);
		        $m = $oo->media($gc['id']);
		        $m_url = m_url($m[0]);
                ?><div class="book">
                    <img src="<? echo $m_url; ?>">
                    <div class="caption"><? echo $gc['name1']; ?></div>
                </div><?
		    }
		?></section><?
	}
?></div>