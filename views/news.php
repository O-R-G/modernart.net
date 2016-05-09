<?
$children = $oo->children($uu->id);
?><div id="news-list"><?
	foreach($children as $c)
	{
		$url = $uu->url."/".$c['url'];
		// $tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($c['name1']);
		?><div class="news-story"><a href="<? echo $url; ?>"><? echo $name; ?></a></div><?
	}
?></div>
