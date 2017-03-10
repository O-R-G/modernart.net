<?
$children = $oo->children($uu->id);
$n = count($children);

?><div id="children" class="centered centeralign">
    <div class="col"><?
	for ($i = 0; $i < ($n / 2); $i++)
	{
	    $c = $children[$i];
		$url = $uu->url."/".$c['url'];
		$tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($tmp);
        if($tmp != $name) $ptags = true;
        if (substr($name, 0, 1) == ":") $url = null;
        $name = ltrim($name, ":");
        ?><div>
            <? echo ($ptags) ? "<p>" : ""; ?>
            <a href="<? echo $url; ?>"><? echo $name; ?></a>
            <? echo ($ptags) ? "</p>" : ""; ?>
        </div><?
	}
?></div>
<div class="col"><?
	for ($i; $i < $n; $i++)
	{
	    $c = $children[$i];
		$url = $uu->url."/".$c['url'];
		$tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($tmp);
        if($tmp != $name) $ptags = true;
        if (substr($name, 0, 1) == ":") $url = null;
        $name = ltrim($name, ":");
        ?><div>
            <? echo ($ptags) ? "<p>" : ""; ?>
            <a href="<? echo $url; ?>"><? echo $name; ?></a>
            <? echo ($ptags) ? "</p>" : ""; ?>
        </div><?



/*
	    $c = $children[$i];
		$url = $uu->url."/".$c['url'];
		$tmp = trim(strip_tags($c['name1'], '<i><b>'));
		$name = nl2br($tmp);
		if($tmp == $name) {
		    ?><div><a href="<? echo $url; ?>"><? echo $name; ?></a></div><?
		} else {
		    ?><div><p><a href="<? echo $url; ?>"><? echo $name; ?></a></p></div><?
		}
*/
	}
?></div>
</div>
