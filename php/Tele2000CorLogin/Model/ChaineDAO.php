<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Erwan
 * Date: 08/12/14
 * Time: 10:00
 * To change this template use File | Settings | File Templates.
 */
namespace Model;

class ChaineDAO extends Model
{

    public function getAllChaines(){
        $sql = 'SELECT chaine_id, nom_chaine, adresse, code_postal, ville,
                telephone, payante, fax FROM chaine;';

        $chaines = array();
        $result=$this->executeRequest($sql);

        while($retourChaine = $result->fetch(\PDO::FETCH_OBJ)){
            $c = new ChaineDTO();
            $c->setId($retourChaine->chaine_id);
            $c->setNom($retourChaine->nom_chaine);
            $c->setAdresse($retourChaine->adresse);
            $c->setCp($retourChaine->code_postal);
            $c->setVille($retourChaine->ville);
            $c->setTel($retourChaine->telephone);
            $c->setFax($retourChaine->fax);
            $c->setPayant($retourChaine->payante);
            $chaines[]=$c;
        }
        return $chaines;
    }

    /**
     * Fonction de recherche d'une chaine
     * @param $id
     * @return ChaineDTO
     */
    public function  getOneChaine($id){
        $sql = 'SELECT chaine_id, nom_chaine, adresse, code_postal, ville, telephone, payante, fax
                FROM chaine
                WHERE chaine_id = ?;';

        $result = $this->executeRequest($sql, array($id));
        while($chaine = $result->fetch(\PDO::FETCH_OBJ)){
            $c = new ChaineDTO();
            $c->setId($chaine->chaine_id);
            $c->setNom($chaine->nom_chaine);
            $c->setAdresse($chaine->adresse);
            $c->setCp($chaine->code_postal);
            $c->setVille($chaine->ville);
            $c->setTel($chaine->telephone);
            $c->setFax($chaine->fax);
            $c->setPayant($chaine->payante);
            $theOne = $c;
        }
        return $theOne;
    }

    public function deleteChaine($id){
        $sql = 'DELETE FROM chaine WHERE chaine_id = ?';
        $this->executeRequest($sql, array($id));
    }

    public function addOrModify($chaine){
        $param = array(
            $chaine->getNom(),
            $chaine->getAdresse(),
            $chaine->getCp(),
            $chaine->getVille(),
            $chaine->getTel(),
            $chaine->getPayant(),
            $chaine->getFax()
        );

        if ($chaine->getId()>0){
            $sql = 'UPDATE chaine SET nom_chaine=?, adresse=?, code_postal=?, ville=?, telephone=?, payante=?, fax=?
                WHERE chaine_id = ?;';
            $param[] = $chaine->getId();

            $this->executeRequest($sql,$param);
        }
        else{
            $sql = 'INSERT INTO chaine( nom_chaine, adresse, code_postal, ville,
        telephone, payante, fax)VALUES  (?,?,?,?,?,?,?);';

            $this->executeRequest($sql,$param);
        }
    }

}
