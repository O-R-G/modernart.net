<?
$children = $oo->children($uu->id);
?>
<div id="main">
	<div>
		<a href="/">Modern Art</a><?
		$url = "/";
		for($i = 0; $i < count($uu->ids); $i++)
		{
			$id = $uu->ids[$i];
			$o = $oo->get($id);
			$url.= $o['url'];
			if($i < count($uu->ids) - 1)
			{
			?> / <a href="<? echo $url; ?>"><? echo $o['name1']; ?></a><?
			}
			else
			{
			?> / <? echo $o['name1'];
			}
			$url.="/";
		}
	?></div>
	<div id="menu"><?
	if($uu->url == "artists")
		require_once("views/artist-list.php");
	else
	{
		foreach($children as $c)
		{
			$url = $uu->url."/".$c['url'];
			$name = nl2br(trim(strip_tags($c['name1'], '<i><b>')));
			?><div><a href="<? echo $url; ?>"><? echo $name; ?></a></div><?
		}
	}
	?></div>
</div><?