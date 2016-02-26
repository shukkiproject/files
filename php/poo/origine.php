<?php 
require_once("traitement.php");
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

        <title>Programmation POO</title>
    </head>

    <body>

        <h3>Classes PHP</h3>
        <form action="traitement.php" method="post" >
        	<fieldset>
        		<legend>Contact</legend>
        		<label>Nom : <input type="text" name="nom" ></label>
        		<label>Prénom : <input type="text" name="prenom"></label>
        		<label>Telephone : <input type="telephone" name="tel" value=""></label>
        		<input type="submit" name="submit" value="Go">
        	</fieldset>
        </form>
        <?php 

	echo "Gestionnaire de contacts<br/>";
 	//phpinfo();

	

	$n= new Contact("abc","edf");
	$n->setTel(012314564312);
	$n->afficher();

	$p= new Contact("coucou","yoyo");
	echo Contact::getNbPerson()."<br/>";;

	echo $p;
	echo Contact::$nbPerson;
	echo Contact::MAX_PERSON;

	$libelle= new Libelle(1);
	$libelle->afficher("c");
	

	$a= new Libelle(2);
	echo $a->__get("css");
	

        ?>
    </body>
</html>
