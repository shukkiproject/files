<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Erwan
 * Date: 05/12/14
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */

namespace Controller;

class Router
{
    private $defaultController;
    private $chaineController;

    public function __construct(){
        $this->defaultController = new DefaultController();
        $this->chaineController = new ChaineController();
    }

    public function routeRequest(){
        if ($this->isController('chaine')){

            if ($this->isAction('fetchAll')){
                $this->chaineController->fetchAllAction();
            }
            if($this->isAction('del')){
                $this->chaineController->deleteAction();
            }
            if($this->isAction('add')){
                $this->chaineController->addOrModifyAction();
            }
            if($this->isAction('modify')){
                $this->chaineController->addOrModifyAction();
            }
            if($this->isAction('detail')){
                $this->chaineController->detailAction();
            }
        }
        else{
            $this->defaultController->indexAction();
        }
    }

    public function isController($ctrl){
        return (isset($_GET['ctrl']) && $_GET['ctrl'] === $ctrl ? true : false);
    }

    public function isAction($act){
        return (isset($_GET['action']) && $_GET['action'] === $act ? true : false);
    }

}












