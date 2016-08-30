<?
$children = $oo->children($uu->id);
$n = count($children);

?>
<div id="children">
    <div class="children col center"><?
	for ($i = 0; $i < ($n / 2); $i++)
	{
	    $c = $children[$i];
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
?></div>
<div class="children col center"><?
	for ($i; $i < $n; $i++)
	{
	    $c = $children[$i];
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
?></div>
</div>
