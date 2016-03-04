<?php 


require_once("bootstrap.php");


$userRepo = $entityManager->getRepository("User");
$engineer = $userRepo->findOneBy(['name'=> $argv[1]]);

$bugRepo = $entityManager->getRepository("Bug");
$bugs = $bugRepo->getAllByEngineer($engineer);

// var_dump($tab);

foreach ($bugs as $bug) {
	echo "-".$bug->getDescription()."\n";
	foreach ($bug->getProducts() as $product) {
		echo "--".$product->getName()."\n";
	}

}

 ?>