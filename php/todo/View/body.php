
<body>
<div class="container text-center">
	<div class="well">

	<h1>Todo List</h1>
	<!-- Formulaire d'ajout de tache -->

	<form action="index.php" method="POST">
		<input type="hidden" name="id" value="<?= $id ?>">
		<label>Todo : <input type="text" name="tache" placeholder="Todo" value="<?= $data ?>" autofocus ></label>
		<input type="submit" value="<?= $bouton ?>">
	</form>
	
	<a href="index.php?nettoyer=1">Nettoyer la liste</a>
	<?php if (!empty($taches)) { ?>
		<!-- Affichage de la liste des tâches -->
		 <ul>
		 <?php foreach($taches as $index => $tache){
		 	$etat = ($tache['etat'] ? "unchecked" : "checked");

		 	echo "<li class=\"$etat\">";
		 	echo $tache['text'];
		 	echo "<a href=\"index.php?suppression=$index\"><button>X</button></a>";
		 	echo "<a href=\"index.php?modifEtat=$index\"><button>V</button></a>";
		 	echo "<a href=\"index.php?id=$index\"><button>Modifier</button></a>";
		 	echo "</li>";
		 }?>
		 </ul>
	<?php } 



	?>
