<?php



  //////////////////
 //  Navigation  //
//////////////////

function displayNavigation( $path = "0", $limit = null, $selection = null, $pageName = "main", $stub = FALSE, $breadcrumbsMode = FALSE ) {


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
	
	
	//  Check if $obj is a root
	
	if ($final == 0) $name = "";
	if ( substr($name, 0, 1) == "+" ) $name = ""; 
	
	
	//  Display current node
		
	if ( (substr($name, 0, 1) != "." && substr($name, 0, 1) != "_") ) {

		$html  = "\n<div class='menuItemContainer pad ";

			/*
			// This could be better for just adding more px padding, fix it
		
			for ( $k = 0; $k < $depth; $k++ ) {

				$html .= "pad ";
			}
		
			*/

		$html .= ($selected || $final == 0) ? "active" : "static";
		$html .= "'>";
		$html .= "<a href='";

		// Check if URL and whether full or partial
						
		$pattern = "/html/";			
		$URL = $row["url"];
		if ( preg_match( $pattern, $URL ) ) $fullURL = TRUE;
		
		$html .= ($URL) ? $URL : $pageName;
		if ( !$fullURL ) $html .= ".html?id=$target";						

		$html .= "'>";
		$html .= $name;	
		// $html .= " " . $first . " / " . $final . " > " . $depth . " = " . $selection . " - " . count($selects) . " bc = " . $breadcrumbsMode;	// debug
		$html .= "</a></div>";

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
			while ($row = MYSQL_FETCH_ARRAY($res)) {	

				$tmp = $path .",". $row["objectsId"];
				$limitTemp = ($selected) ? $limit : $limitNext;
				displayNavigation($tmp, $limitTemp , $selection, $pageName, $stub, $breadcrumbsMode);
			}
		}
	} 
}



?>