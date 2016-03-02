<?php 



require_once("bootstrap.php");
require_once("src/User.php");

$user = new User();
$user-> setName($argv[1]);

$entityManager->persist($user);
$entityManager->flush();

echo "User ".$user->getName()." created\n";

 ?>