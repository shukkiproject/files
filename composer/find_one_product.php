<?php 

require_once("bootstrap.php");


$productRepo = $entityManager->getRepository("Product");
$product = $productRepo->findOneByName($argv[1]);

// var_dump($tab);

	echo $product->getId()." ".$product->getName()."\n";






 ?>