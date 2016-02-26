<?php 

abstract class Db{
	const USER ='root';
	const PASSWORD = 'imie';
	const HOST = '127.0.0.1';
	const PORT = '3306';
	const DBNAME = 'dl13pdo';
	const DRIVER = 'mysql';

	public static function getPdo(){

		$pdo=false;
		$dsn = self::DRIVER.':dbname='.self::DBNAME.';host='.self::HOST.';port='.self::PORT;

		try{
	    $pdo = new PDO($dsn, self::USER, self::PASSWORD);
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	  	catch(PDOException $e){
	    echo $e->getMessage();
	    die();
		}
		return $pdo;
	}

}






 ?>
