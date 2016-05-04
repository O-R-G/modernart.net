<?
$children = $oo->children($uu->id);
// make back url
$url = "";
$back_urls = array_slice($uu->urls, 0, count($uu->urls) - 1);
$url = "/".implode("/", $back_urls);
?><div id="back">
    <a href="<? echo $url; ?>"><? echo "Back"; ?></a>
</div>