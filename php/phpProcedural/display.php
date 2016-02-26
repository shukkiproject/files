<?php 
require_once("file.php");


function displayL() {
	$pics=scanfile();
	echo "<ul>";
	array_splice($pics, 0, 2);
	foreach ($pics as $pic) {
		echo "<li><a href=\"./uploads/$pic\">$pic</a>
				<a href=\"action.php?action=delete&id=$pic\">X</a>
		</li>";
	}
	echo "</ul>";
}

function displayG() {
	$pics=scanfile();
	array_splice($pics, 0, 2);
	foreach ($pics as $pic) {
	
	echo "<figure>
		<img src=\"./uploads/$pic\" />
		<figcaption>$pic</figcaption>
	</figure>";
	}
}

 ?>
