<?php 

require_once("session.php");
require_once("control.php");
require_once("display.php");

$name=getName();
$errors=getErrors();
$info=getInfo();

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="../bootstrap/jumbotron-narrow.css">
 	<title></title>
 	
 	<style>
		figure {
			display: inline-block;
			margin: 20px;
		}

		img {
			height: 200px;
		}

		input[type="file"] {
			color: blue;
		}
	</style>
 </head>
 <body>
 <div class="container">
 	

 	<h1>Téléversement</h1>
 	<hr/>
 	<ul>
 	<?php 

	 	// if (!empty($errors)) {

	 	// 	echo "<li class=\"text-danger\">";
			// 	foreach ($errors as $error) {
			// 		echo "$error<br/>";
			// 	}
			// echo "</li>";
			// } elseif (!empty($info)) {
			// 	echo "<li class=\"text-success\">";
			// 	foreach ($info as $inf) {
			// 		echo "$inf<br/>";
			// 		echo "</li>";
			// 	}
			// }
			
	 	
	 
 	?>
 	</ul>
 	<div class="jumbotron">
 	<?= loginForm(); ?>
 	<form action="action.php" method="post" enctype="multipart/form-data">
 		<fieldset>
 			<legend>Fichier</legend>
			Image: <input type="file" name="userfile" required /><br/>
			<input type="submit" name="submit" value="Envoyer" />
 		</fieldset>
 	</form>

 	</div>
	<hr/>
 	<h2><a href="action.php?display=liste">Liste</a> des images disponibles / <a href="action.php?display=galerie">Galerie</a></h2>
	<?php 
		if (isset($_COOKIE["display"]) && $_COOKIE["display"]=="galerie") {
			displayG();
		} else { 
			displayL();
		}
		
	// 	if ($errors!==null) {
 // 		echo "<li class=\"text-danger\">";
 // 		echo "Désolé. Le fichier ne peut pas être effacé pour les raison suivantes:<br/>";
 // 		foreach ($errors as $error) {
 // 			echo "$error<br/>";
 // 		}
 // 		echo "</li>";
 // 	} elseif ($info!==null) {
 // 		echo "<li class=\"text-success\">Le fichier a été effacé.</li>";
	// }

	?>

	</div>
 </body>
 </html> </html> </html>