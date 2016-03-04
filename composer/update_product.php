<?php 

require_once("bootstrap.php");


$productRepo = $entityManager->getRepository("Product");
$product = $productRepo->findOneByName($argv[1]);

$product-> setName($argv[2]);

$entityManager->persist($product);
$entityManager->flush();

echo "Product ".$product->getId()." ".$product->getName()." updated\n";

 ?>