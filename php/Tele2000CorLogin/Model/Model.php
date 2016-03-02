<?php
namespace Model;
use \PDO;
class Model
{
    /** Objet PDO d'accès à la BD */
    private $bdd;

    /**
     * Fonction de connexion à la base
     * @return \PDO  On retourne l'objet $bdd à la fonction de requêtes
     */
    private function getBdd(){
        try{
            if ($this->bdd==null){
                $hote='127.0.0.1';
                $port='3306';
                $db= 'tele';
                $user='root';
                $password='imie';

                $this->bdd = new PDO('mysql:host='.$hote.
                                     ';port='.$port.
                                     ';dbname='.$db,
                                     $user,
                                     $password,
                                     array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
                );
            }
        }
        catch(\Exception $e){
            echo 'Là il y a une erreur : '.$e->getTraceAsString();
        }
        return $this->bdd;
    }

    /**
     * fonction de requetage de base de données
     * @param $sql
     * @param null $params
     * @return mixed
     */
    public function executeRequest($sql, $params = null){
        if ($params == null){
            $result= $this->getBdd()->query($sql);
        }
        else{
           $result= $this->getBdd()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

}









