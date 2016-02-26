<?php 

namespace db;

abstract class Db{

	public static function getPdo(){
		$pdo=null;
		$dsn="mysql:dbname=tele;host=127.0.0.1;port=3306";
		try{
			$pdo= new \PDO($dsn, "root", "imie");
			$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		} catch(\PDOException $e){
			echo $e->getMessage();
		}
		
		return $pdo;
	}

	
}


 ?>