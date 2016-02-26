<?php 

require_once("model/user.php");
require_once("model/dao.php");
require_once("model/db.php");

use dao\Dao;
use db\Db;
use chaine\Chaine;

if (isset($_POST['connexion'])) {
	if ($_POST['login']==USER && $_POST['pwd']==PWD) {

		$_SESSION['connected']=true;
		
	}
} 

if (isset($_GET['deconnexion'])) {

	unset($_SESSION['connected']);
	header("Location: index.php");

}

$page="page1.php";

$nomForm="";

$id="";
$nom="";
$adr="";
$postal="";
$ville="";
$tel="";
$fax="";
$cable="";

if (isset($_GET['update'])) {
	$dao = new Dao(Db::getPdo());
	$chaineU = $dao->getChaine($_GET['update']);
		$id=$chaineU->chaine_id;
		$nom=$chaineU->nom_chaine;
		$adr=$chaineU->adresse;
		$postal=$chaineU->code_postal;
		$ville=$chaineU->ville;
		$tel=$chaineU->telephone;
		$fax=$chaineU->fax;
		$cable=$chaineU->payante;
}


if (isset($_GET['page']) && $_GET['page']==2) {
	$nomForm="Ajout";
} elseif (isset($_GET['page']) && $_GET['page']==3) {
	$nomForm="Modification";
} 

if (isset($_POST['submit'])) {
	
		$chaine= new Chaine();

		$chaine->setNom(htmlspecialchars($_POST['nom']))
				->setAdr(htmlspecialchars($_POST['adr']))
				->setPostal(htmlspecialchars($_POST['postal']))
				->setVille(htmlspecialchars($_POST['ville']))
				->setTel(htmlspecialchars($_POST['tel']))
				->setFax(htmlspecialchars($_POST['fax']))
				->setCable(intval($_POST['cable']))
				->setId(intval($_POST['id']));
		$dao = new Dao(Db::getPdo());

	if ($_POST['id']==null) {
		
		$dao->insertChaine($chaine);
	} else {
		
		$dao->updateChaine($chaine);
		header("Location: index.php?page=2");
	}
}

if (isset($_GET['supp']) && is_numeric($_GET['supp'])) {

	$dao = new Dao(Db::getPdo());
	$dao->deleteChaine(intval($_GET['supp']));
	header("Location: index.php?page=2");
}

$dao= new Dao(Db::getPdo());
$chaines=$dao->getAllChaines();

if (isset($_GET['page'])) {

	switch ($_GET['page']) {
    case "2":
    	if ($chaines==null) {
    		$page="page2vide.php";
    	} else {
    		$page="page2list.php";
    	}        
        break;
    case "3":
        $page="page3.php";
        break;
    default:
        $page="page1.php";
   }
}

include("view/index.php");

 ?>