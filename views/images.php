<?
$media = $oo->media($uu->id);

?><div id="images"><?
	foreach($media as $m)
	{
		$url = m_url($m);
		$caption = $m['caption'];
	?><div class="thumb">
		<img src="<? echo $url; ?>">
		<div class="caption"><? echo $caption; ?></div>
	</div><?
	}
?></div>