<?php 

require_once("bootstrap.php");
require_once("src/Product.php");


$productRepo = $entityManager->getRepository("Product");
$product = $productRepo->find($argv[1]);

$product-> setName($argv[2]);



$entityManager->persist($product);
$entityManager->flush();

echo "Product ".$product->getName()." updated\n";

 ?>