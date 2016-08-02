<?
$children = $oo->children($uu->id);
// make back url
$url = "";
$back_urls = array_slice($uu->urls, 0, count($uu->urls) - 1);
$count = count($back_urls);
$menu = ucwords(str_ireplace("-", " ", $back_urls[$count-1]));
$url = "/".implode("/", $back_urls);
?><div id="back">
    <!-- <a href="<? echo $url; ?>"><? echo "Back"; ?></a> -->
    <a href="<? echo $url; ?>"><? echo $menu; ?></a>
    <!-- <a href="javascript:window.history.back();">Back</a> -->
</div>
