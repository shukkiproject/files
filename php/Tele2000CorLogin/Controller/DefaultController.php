<?php

namespace Controller;

use Model\ProgDAO;
use Model\ProgDTO;
use View\View;

class DefaultController
{
  private $ProgDAO;

    public function __construct(){
        $this->ProgDAO = new ProgDAO();
    }

  public function indexAction(){

      $progCeSoir = $this->ProgDAO->getProgCeSoir();
      $maView = new View("default","default");
      echo $maView->generer(array('default'=>$progCeSoir));
      //'default'=>null
      //var_dump($progCeSoir);
  }
    
  protected function forbidden(){
    header('HTTP/1.0 404 Forbidden');
    die('Acces interdit');
 }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    } 
}
