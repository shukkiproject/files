<?php 
require_once("session.php");

function scanfile() {

	if (!isset($pictures)) {
		$pictures=array();
	}
	$pictures=scandir("./uploads");

	return $pictures;
}

function deleteImage($pic){

	if(unlink("./uploads/".$pic)===false) {

		addError("error");
	} else {
		addInfo("success");
	}

}


 ?>