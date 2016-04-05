<link rel="stylesheet" type="text/css" media="all" href="/static/css/artist-list.css">
<table><?
	foreach($children as $c)
	{
		$url = $uu->url."/".$c['url'];
		$name_arr = explode(" ", trim($c['name1']));
		?><tr><?
		$i = 1;
		foreach($name_arr as $n)
		{
		?><td><a href='<? echo $url; ?>'><? echo $n; ?></a></td><?
		$i++;
		}?></tr><?
	}
	?>
</table>