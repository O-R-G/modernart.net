<?
$children = $oo->children($uu->id);
?>
<div id="main">
	<div><a href="/">Modern Art / <? echo $item['name1']; ?></a></div>
	<div id="menu"><?
	foreach($children as $c)
	{
		$url = $uu->url."/".$c['url'];
		?><div><a href='<? echo $url; ?>'><? echo $c['name1']; ?></a></div><?
	}
	?></div>
</div><?