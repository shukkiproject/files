<?php 

require_once("bootstrap.php");
require_once("src/Product.php");



$productRepo = $entityManager->getRepository("Product");
$product = $productRepo->find($argv[1]);

// var_dump($tab);

	echo $product->getName()."\n";






 ?>