<?php 



require_once("bootstrap.php");


$user = new User();
$user-> setName($argv[1]);

$entityManager->persist($user);
$entityManager->flush();

echo "User ".$user->getName()." created\n";

 ?>