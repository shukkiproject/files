<?php 



require_once("bootstrap.php");
require_once("src/Product.php");

$product = new Product();
$product-> setName($argv[1]);

$entityManager->persist($product);
$entityManager->flush();

echo "Product".$product->getId()." created\n";

 ?>