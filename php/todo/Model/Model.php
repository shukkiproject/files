<?php

namespace Model;

session_start();
// Le seul fichier qui s'occupe des sessions est celui-ci

class Todo{

	public function form(){

	$id = -1;
	$bouton = "Ajouter";
	$text = "";

	// Si on a des paramètres dans la méthode GET, on est
	// en train de vouloir modifier une tache
	// On récupère la tache et on modifie les valeurs du formulaire (action, input et bouton)
	if(!empty($_GET)){

		$id = $_GET['id'];
		
		$bouton = "Modifier";

		$todolist = new Todo();
		
		$tache = $todolist->recupererTache($id);

		$text = $tache['text'];
	}

	$form="<form action='./Controller/controller.php' method='POST'>
		<input type='hidden' name='id' value=$id >
		<label>Todo : <input type='text' name='tache' placeholder='Todo' value='<?= $text ?>' autofocus ></label>
		<input type='submit' value='<?= $bouton ?>'>
		</form>";

	return $form;
	}

	public function ajouterTache($tacheText){
		// Ajout d'une tâche au tableau de tâches stocké à l'index 'taches'
		$tache = ['text' => $tacheText, 'etat' => true];

		$_SESSION['taches'][] = $tache;

	}

	public function modifierTache($id, $text){
		// Modification du texte d'une tâche

		$_SESSION['taches'][$id]['text'] = $text;
	}


	public function supprimerTache($id){
		// Suppression d'une tâche à un index particulier
			array_splice($_SESSION['taches'], $id, 1);
	}


	public function basculerTache($id){
		// Basculement de l'état d'une tache en lui affectant son inverse (true passe à false et vice versa)
		$_SESSION['taches'][$id]['etat'] = !$_SESSION['taches'][$id]['etat'];
	}

	public function recupererTaches(){
		// Renvoie toutes les taches
		$taches = null;
		if(isset($_SESSION['taches'])){
			$taches = $_SESSION['taches'];
		}

		return $taches;
	}

	public function nettoyerTaches(){
		// Mes futures taches
		$taches = [];

		// On parcours les taches actuelles
		// Ici on n'utilise pas array_splice parce que cela peut poser des problèmes de
		// décallage (suppression en parcourant = danger)
		foreach($_SESSION['taches'] as $tache){
			// Si la tache n'est pas cochée (état à true par défaut)
			if($tache['etat']){
				// On garde la tache en l'ajoutant au tableau
				$taches[] = $tache;
			}
		}

		// On écrase les anciennes tâches par les tâches qui n'ont pas été cochées
		$_SESSION['taches'] = $taches;
	}

	public function recupererTache($id){
		return $_SESSION['taches'][$id];
	}
}