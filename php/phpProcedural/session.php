<?php 
session_start();

function addName($name){
	if (!isset($_SESSION["name"])) {
		$_SESSION["name"]="";
	}
	$_SESSION["name"]=$name;
}

function getName(){
	if (!isset($_SESSION["name"])) {
		return null;
	}
	$name=$_SESSION["name"];
	cleanSession("name");
	return $name;
}

function addError($err){
	if (!isset($_SESSION["errors"])) {
		$_SESSION["errors"]=array();
	}
	$_SESSION["errors"][]=$err;
}

function getErrors(){

	if (!isset($_SESSION["errors"])) {
		return null;
	}
	$errors=$_SESSION["errors"];
	cleanSession("errors");
	return $errors;
}

function cleanSession($tab){
	unset($_SESSION[$tab]);
}

function addInfo($info) {
	if (!isset($_SESSION["info"])) {
		$_SESSION["info"]=array();
	}
	$_SESSION["info"][]=$info;
}

function getInfo(){
	if (!isset($_SESSION["info"])) {
		return null;
	}
	$info=$_SESSION["info"];
	cleanSession("info");
	return $info;
}


 ?>
