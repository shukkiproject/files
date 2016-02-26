<?php 
require_once("session.php");
require_once("define.php");
require_once("cookie.php");
require_once("control.php");


if (isset($_POST["ident"], $_POST["pwd"]) && $_POST["ident"]==USER && $_POST["pwd"]==PASSWORD) {
		$_SESSION[USER]=true;
				
		if (isset($_POST["rmb"])) {
			addCookie("token", "azertyuiop");
		}
		
} else {
		
		addError("L'identifiant ou le mot de passe n'est pas correcte.");
		
	}
header("Location:index.php");

 ?>

