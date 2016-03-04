<?php 

require_once("bootstrap.php");


$bugRepo = $entityManager->getRepository("Bug");
$bugs = $bugRepo->findAll();

// var_dump($tab);

foreach ($bugs as $bug) {
	echo $bug->getId()." ".$bug->getDescription()."\n";

}




 ?>