<?
$children = $oo->children($uu->id);
?><div id="book-list"><?
	foreach($children as $c)
	{
	    $url = $uu->url."/".$c['url'];
		// $tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($c['name1']);
		$m = $oo->media($c['id']);
		$m_url = m_url($m[0]);
		?><div class="book">
            <div class="background-img" style="background-image:url('<? echo $m_url; ?>')"></div>
            <!-- img src="<? echo $m_url; ?>" -->
            <div class="caption"><? echo $name; ?></div>
        </div><?
	}
?></div>