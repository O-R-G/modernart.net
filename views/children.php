<?
	if($children[0]['name1'] != "CV" && $children[0]['name1'] != "Press Release" && $children[0]['name1'] != "Press Release Text")
	{
	?><div id="children"><?
		foreach($children as $c)
		{
			$url = $uu->url."/".$c['url'];
			$tmp = trim(strip_tags($c['name1'], '<i><b>'));
			$name = nl2br($tmp);
			if($tmp == $name)
			{
			?><div><a href="<? echo $url; ?>"><? echo $name; ?></a></div><?
			}
			else
			{
			?><div><p><a href="<? echo $url; ?>"><? echo $name; ?></a></p></div><?
			}
		}
	?></div><?
	}
?>