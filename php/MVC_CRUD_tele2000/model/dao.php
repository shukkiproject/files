<?php 
namespace dao;

require_once("chaine.php");

use chaine\Chaine;

class Dao{

	private $pdo;

	public function __construct(\PDO $pdo){
		$this->pdo=$pdo;
	}

	public function getAllChaines(){

		$stmt=$this->pdo->prepare("SELECT chaine_id, nom_chaine, adresse, code_postal, ville, telephone, fax, payante FROM chaine;");
		$stmt->execute();

		$chaines=$stmt->fetchAll(\PDO::FETCH_OBJ);

		return $chaines;
	}

	public function getChaine($id){

		$stmt=$this->pdo->prepare("SELECT chaine_id, nom_chaine, adresse, code_postal, ville, telephone, payante, fax FROM chaine WHERE chaine_id = ? ;");
		$stmt->bindValue(1, $id);
		$stmt->execute();

		$chaine=$stmt->fetch(\PDO::FETCH_OBJ);


		return $chaine;
	}

	public function insertChaine(Chaine $chaine){

		$stmt = $this->pdo->prepare("INSERT INTO chaine (nom_chaine, adresse, code_postal, ville, telephone, fax, payante) VALUES (?,?,?,?,?,?,?)");
	    $stmt->bindValue(1, $chaine->getNom());
	    $stmt->bindValue(2, $chaine->getAdr());
		$stmt->bindValue(3, $chaine->getPostal());
		$stmt->bindValue(4, $chaine->getVille());
		$stmt->bindValue(5, $chaine->getTel());
		$stmt->bindValue(6, $chaine->getFax());
	    $stmt->bindValue(7, $chaine->getCable());

	    $stmt->execute();

	    $chaine->setId($this->pdo->lastInsertId());
	    $stmt->closeCursor();

	    return $chaine;
	}
	
	public function deleteChaine($id){

		$stmt = $this->pdo->prepare("DELETE FROM chaine WHERE chaine_id = ?;");
    	$stmt->bindValue(1, $id);

    	$stmt->execute();

	}
	
	public function updateChaine($chaine){
		$stmt = $this->pdo->prepare("UPDATE chaine SET nom_chaine= ?, adresse= ?, code_postal= ?, ville= ?, telephone= ?, fax= ?, payante= ? WHERE chaine_id = ?;");
	    $stmt->bindValue(1, $chaine->getNom());
	    $stmt->bindValue(2, $chaine->getAdr());
		$stmt->bindValue(3, $chaine->getPostal());
		$stmt->bindValue(4, $chaine->getVille());
		$stmt->bindValue(5, $chaine->getTel());
		$stmt->bindValue(6, $chaine->getFax());
	    $stmt->bindValue(7, $chaine->getCable());
	    $stmt->bindValue(8, $chaine->getId());

	    $stmt->execute();
	}
	



}


 ?>