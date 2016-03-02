<?php 

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once('vendor/autoload.php');

$conn = array(
		'driver' => 'pdo_mysql',
		'user' => 'root',
		'password' => 'imie',
		'dbname' => 'doctrine'
	);

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), true);


$entityManager = EntityManager::create($conn, $config);



 ?>