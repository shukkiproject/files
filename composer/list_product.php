<?php 

require_once("bootstrap.php");
require_once("src/Product.php");



$productRepo = $entityManager->getRepository("Product");
$products = $productRepo->findAll();

// var_dump($tab);

foreach ($products as $prod) {
	echo $prod->getId()." ".$prod->getName()."\n";

}




 ?>