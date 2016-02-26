<?php 
	namespace controller;

	require("Model/Model.php");

	use Model\Todo;

		$id = -1;
		$bouton = "Ajouter";
		$data = "";


	if(isset($_GET['id']) && $_GET['id']>=0){

		$id = $_GET['id'];
		
		$bouton = "Modifier";

		$todolist = new Todo();
		
		$tache = $todolist->recupererTache($id);

		$data = $tache['text'];
	} 

	
	if(!empty($_POST) && isset($_POST["id"]) && isset($_POST["tache"])){

		// Récupération des valeurs du formulaire
		$id = intval($_POST['id']);
		$text = htmlentities(trim($_POST['tache']));
		$maTache = new Todo();

		if ($id===-1) {

			$maTache->ajouterTache($text);
		} else {

			$maTache->modifierTache($id, $text);
		}
			
		// Appel de la méthode de modification de tache
		
	}

	if(isset($_GET["suppression"])){
		$id = intval($_GET['suppression']);


		$maTache = new Todo();

		$maTache->supprimerTache($id);
	}



	if(isset($_GET["modifEtat"])){
		$id = intval($_GET['modifEtat']);

		$maTache = new Todo();

		$maTache->basculerTache($id);	
	}

	if(isset($_GET["nettoyer"])){
		
		$maTache = new Todo();

		$maTache->nettoyerTaches();	
	}

	if(isset($_GET["destroy"])){
		session_destroy();
	}

	$todolist = new Todo();
	$taches=$todolist->recupererTaches();

	// var_dump($_SESSION);

	// var_dump($data);

	require("View/index.php");

	

 ?>
