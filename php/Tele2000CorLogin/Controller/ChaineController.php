<?php

namespace Controller;

use Model\ChaineDTO;
use Model\ChaineDAO;
use View\View;

class ChaineController
{
    private $chaineDAO;

    public function __construct(){
        $this->chaineDAO = new ChaineDAO();
    }

    public function fetchAllAction(){
        $chaines = $this->chaineDAO->getAllChaines();
        $vue = new View("chaine","chaine");
        echo $vue->generer(array('chaines'=>$chaines));
    }

    public function detailAction(){

        if(isset($_GET['id'])){

            $chaine = $this->chaineDAO->getOneChaine(intval($_GET['id']));

            $vue = new View("chaine","chaineOne");
                echo $vue->generer(array('chaine' => $chaine));
        }
        else{

            $this->fetchAllAction();
        }
    }



    public function deleteAction(){
        if(isset($_GET['id'])){
            $this->chaineDAO->deletechaine(intval($_GET['id']));
        }
            $this->fetchAllAction();
    }

    public function addOrModifyAction(){
        $chaineDTO = new ChaineDTO();
        $chaineDTO->setNom(htmlspecialchars($_POST['nom']));
        $chaineDTO->setAdresse(htmlspecialchars($_POST['adresse']));
        $chaineDTO->setCp(htmlspecialchars($_POST['cp']));
        $chaineDTO->setVille(htmlspecialchars($_POST['ville']));
        $chaineDTO->setTel(htmlspecialchars($_POST['tel']));
        $chaineDTO->setFax(htmlspecialchars($_POST['fax']));
        $chaineDTO->setPayant(htmlspecialchars($_POST['cable']));
        $chaineDTO->setId(htmlspecialchars($_GET['id']));

        $this->chaineDAO->addOrModify($chaineDTO);
        $this->fetchAllAction();
    }
}














