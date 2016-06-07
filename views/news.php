<?
$children = $oo->children($uu->id);
?><div id="news-list"><?
for ($i = 0; $i < 2; $i++)
{
    $child = $children[$i];
    $grandchildren = $oo->children($child['id']);
?><div class="col">
    <header><? echo $child['name1']; ?></header><?
    echo $child['body'];
?></div><?
}
?></div>