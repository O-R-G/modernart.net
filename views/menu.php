<?
$children = $oo->children($uu->id);
?>
<div id="main">
	<div id="menu">
		<!-- <a href="/">Modern Art</a> -->
		<?
		$url = "/";
		for($i = 0; $i < count($uu->ids); $i++)
		{
			$id = $uu->ids[$i];
			$o = $oo->get($id);
			$url.= $o['url'];
			if($i < count($uu->ids) - 1)
			{
				?><a href="<? echo $url; ?>"><? echo "Go back . . . "; ?></a><?
			}
			$url.="/";
		}
?></div>
