<?php 
require_once("session.php");
//$_FILES


function creerDos($dir){
	if (!file_exists($dir)) {
		mkdir($dir, 0777, true);
	}
}

function fileNotExist(){
$file=basename($_FILES["userfile"]["name"]);
	if (file_exists("./uploads/".$file)) {
		return false;
	}
return true;
}


function extensionOK(){
	$ext=pathinfo($_FILES["userfile"]["name"], PATHINFO_EXTENSION);
if ($ext!="jpg" && $ext!="jpeg" && $ext!="gif" && $ext!="png"){
	return false;
	}
return true;
}

function fileTypeOK(){

	if (getimagesize($_FILES["userfile"]["tmp_name"])===false) {
		return false;
	}
	return true;
}

function moveFile(){

	$desti="./uploads/".basename($_FILES["userfile"]["name"]);
	if (move_uploaded_file($_FILES["userfile"]["tmp_name"], $desti)===false) {
		return false;
	}
	return true;
}

function uploadFile(){
	$uploadOk=true;

	creerDos("./uploads/");

	addName($_FILES["userfile"]["name"]);

	if ($_FILES['userfile']['error']!==0) {
		addError("Une erreur s'est produite.");
		$uploadOk=false;
		return ;
	}

	if (fileNotExist()===false) {
		
		addError("Le fichier existe déjà dans le dossier!");
				$uploadOk=false;
		return ;
	}

	if (!extensionOk()) {
		addError("Mauvaise extension.");
				$uploadOk=false;
		return ;
	}

	if (fileTypeOK()===false) {
		addError("Ce n'est pas vraiment une image.");
				$uploadOk=false;
		return ;
	}

	//trop lourde??

	if (moveFile()===false) {
		addError("Une erreur est survenue (move file) .");
		$uploadOk=false;
		return ;
	} else {
		addInfo("succès");
	}

	if ($uploadOk==false) {
 		
 		addError("Désolé. Le téléversement du fichier $name a échoué pour les raison suivantes:");
 		
 	}
 	
}



 ?>