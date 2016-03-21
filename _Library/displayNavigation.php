<?php



  //////////////////
 //  Navigation  //
//////////////////

function displayNavigation( $path = "0", $limit = null, $selection = null, $pageName = "main", $stub = FALSE, $breadcrumbsMode = FALSE, $multiColumn = null, $showImages = null ) {


	//  Handle recursion 

	$limitNext = ($limit === null) ? null : $limit - 1;
	$obj   = explode(",", $path);
	$depth = count($obj) - 1;
	$first = $obj[1];
	$final = $obj[$depth];

	$target = null;	
	for ($i = 1; $i < count($obj); $i++) {

		if ($i > 1) $target .= ",";
		$target .= $obj[$i];
	}
	if (!$target) $target = $path;
	

	// Check for selection

	$selected = false;
	$selects  = explode(",", $selection);
	for ($i = 0; $i < count($selects); $i++) {

		if ($selection && $selects[$i] == $final) $selected = true;
	}


	//  Pull from current node

	$sql = "
		SELECT * FROM objects 
		WHERE id = '$final' 
		AND active = 1 
		LIMIT 1
		";
	$res = MYSQL_QUERY($sql);	
	$row = MYSQL_FETCH_ARRAY($res);

	$name = nl2br($row["name1"]);
	$rank = nl2br($row["rank"]);
	$deck = nl2br($row["deck"]);
	$body = nl2br($row["body"]);
	$bodyParts = explode("|", $body);
	$URL = $row["url"];
	$pattern = "/html/";			
	if ( ($URL) && (!preg_match( $pattern, $URL )) ) $URL .= ".html?id=$target";
		
					
	//  Check if $obj is a root
	
	if ($final == 0) $name = "";
	if ( substr($name, 0, 1) == "+" ) $name = ""; 
	
	
	//  Show images?
	
	if ($showImages) {

		// Get related image, rank = 1
		
		$sql = "SELECT media.id as mediaId, media.type FROM media WHERE media.object = $final AND media.active = 1 ORDER BY media.rank LIMIT 1";
		$res = MYSQL_QUERY($sql);
		$row = MYSQL_FETCH_ARRAY($res);
		$mediaId = $row["mediaId"];
		$type = $row["type"];
		$mediaFile = "MEDIA/". STR_PAD($mediaId, 5, "0", STR_PAD_LEFT) .".". $type;
		$style  = "height: 100px;";
		if ($row) $image  = "<span style='vertical-align:top;'>" . displayMedia($mediaFile, null, $style) . "</span>";		
		$hasImage = ($image) ? TRUE : FALSE;
		$showImages = TRUE;
	}
	
	
	//  Display current node
		
	if ( (substr($name, 0, 1) != "." && substr($name, 0, 1) != "_") ) {
			
		$html  = "";
		
		// ** Modern Art hack **

		// if preg matches <br then add figure
		// add symbol specific to tree you are down
		// + generic multi-lined entry
		// * specific for Upcoming news
		
		if ( count($selects) >= 2 ) $second = $obj[2];	
		if ( $second == '3' ) $padClass = "padArtists";
		if ( $second == '4' ) $padClass = "padExhibitions";
		$html  = "\n<div id='menuItemWrapper'>";	
		
		$pattern = "/<br/";			
	
		if ( ($name) && (preg_match( $pattern, $name )) ) {

			if ( preg_match( "/Upcoming/", $name ) ) {
	
				$symbol = "<img src='MEDIA/asterisk-anim.gif'>";
	
			} else if ( preg_match( "/Current/", $name ) ) {
	
				$symbol = "<img src='MEDIA/plus-anim.gif'>";
	
			} else if ( preg_match( "/Past/", $name ) ) {
	
				$symbol = "<img src='MEDIA/plus-anim-flash.gif'>";
	
			} else {
			
				$symbol = "<img src='MEDIA/plus-anim-blink.gif'>";
			}	
			
			$html .= "\n<div class='arrowContainer active'>";
			$html .= "<a href='";
			$html .= ($URL) ? $URL : $pageName . ".html?id=$target";	
			$html .= "'>";
			$html .= $symbol . "</a></div>";
		}

		$html .= "\n<div class='menuItemContainer ";
		$html .= ($selected || $final == 0) ? "active" : "static";

		$html .=  " " . $padClass;		// ** Modern Art hack **

		$html .= "'>";
		$html .= "<a href='";
		$html .= ($URL) ? $URL : $pageName . ".html?id=$target";	
		$html .= "'>";
		$html .= ($hasImage) ? $image : $name;		
				
		// $html .= "<br/> " . $first . " / " . $final . " -- " . $depth . " = " . $selection . " - " . count($selects) . " bc = " . $breadcrumbsMode;			
		
		$html .= "</a></div>";
		$html .= "</div>"; // close menuItemWrapper ** Modern Art hack **
	
		if ( ($breadcrumbsMode) && ($depth <= count($selects)) ) {

			if ( $selected ) echo $html;
			
		} else {

			echo $html;
		}
		
	
		//  Find children of current node
	
		if ( (($limit > 0 || $limit === null) || $selected) && !$stub ) {
	
			$sql = "
				SELECT objects.id AS objectsId FROM wires, objects 
				WHERE wires.fromid = '$final' AND wires.toid = objects.id 
				AND wires.active = 1 AND objects.active = 1 
				ORDER BY objects.rank, end DESC, begin DESC, name1, name2, objects.modified DESC, objects.created DESC
				";
			$res = MYSQL_QUERY($sql);

			if ( $multiColumn && $depth!=0 ) echo "<div style='position: absolute; top: 0px; left:" . $multiColumn . "px; width: " . $multiColumn * 2 . "px;'>";
			
			// ** Casco-specific hack **
			
			// if ($final && $depth>0) $breadcrumbsMode=TRUE;
			
			while ($row = MYSQL_FETCH_ARRAY($res)) {	

				$tmp = $path .",". $row["objectsId"];
				$limitTemp = ($selected) ? $limit : $limitNext;
				displayNavigation($tmp, $limitTemp , $selection, $pageName, $stub, $breadcrumbsMode, $multiColumn, $showImages);
			}
			
			if ( $multiColumn && $depth!=0 ) echo "</div>";
		}
	} 
}



?>