<?php 

require_once("session.php");
require_once("define.php");
require_once("upload.php");
require_once("cookie.php");
require_once("file.php");

//$_POST



//button cliqué
if (isset($_POST, $_POST['submit'])) {
	
	//todo: verifier 
	uploadFile();
}

if (isset($_GET["display"])) {
		$display=htmlentities(trim($_GET["display"]));
		addCookie("display", $display);
	}
	
if (isset($_GET["action"]) && file_exists("./uploads/".$_GET["id"])) {
	deleteImage($_GET["id"]);
}

header("Location: index.php");

 ?>