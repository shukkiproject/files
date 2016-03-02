<?php 



require_once("bootstrap.php");
require_once("src/Bug.php");

$bug = new Bug();
$bug-> setDescription($argv[1]);

$date = new DateTime("now");
$bug-> setCreated($date);
$bug->setStatus($argv[2]);

$productRepo = $entityManager->getRepository("Product");
$product = $productRepo->findOneByName($argv[3]);
$bug->assignToProducts($product);

$userRepo = $entityManager->getRepository("User");
$user = $userRepo->findOneByName($argv[4]);
$bug->setReporter($user);

$userRepo = $entityManager->getRepository("User");
$user = $userRepo->findOneByName($argv[5]);
$bug->setEngineer($user);

$entityManager->persist($bug);
$entityManager->flush();

echo "Bug ".$bug->getDescription()." created\n";

 ?>