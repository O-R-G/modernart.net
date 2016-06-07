<?
$children = $oo->children($uu->id);
?><div id="news-list"><?
for ($i = 0; $i < 2; $i++)
{
    $child = $children[$i];
    $grandchildren = $oo->children($child['id']);
?><div class="col">
    <header><? echo $child['name1']; ?></header><?
	foreach($grandchildren as $gc)
	{
		$url = $uu->url."/".$child['url']."/".$gc['url'];
		// $tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($gc['name1']);
		?><div class="news-story"><? echo $name; ?></div><?
	}
?></div><?
}
?></div>