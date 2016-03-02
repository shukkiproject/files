<?php

namespace View;
class View
{
    private $fichier;

    public function  __construct($nomRep,$nomFichier){
        $this->fichier = "View/".$nomRep."/".$nomFichier."View.php";
    }

    /**fonction de construction et d'affichage de la vue
     *
     * @param $donnees
     */
    public function generer($donnees){
    // var_dump($donnees);
        $contenu = $this->genererFichier($this->fichier,$donnees);
        $vue = $this->genererFichier('View/layout/layout.php',array('contenu'=>$contenu));
   
        return $vue;

    }

    public function genererFichier($fichier, $donnees){

       if(file_exists($fichier)){
           if (isset($donnees)){

               extract($donnees);

               ob_start();
               require $fichier;

               return ob_get_clean();

           }
       }
        else{
            throw new \Exception("le fichier ".$fichier." est introuvable");
        }
    }
}













