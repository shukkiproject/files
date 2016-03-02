<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Erwan
 * Date: 08/12/14
 * Time: 10:00
 * To change this template use File | Settings | File Templates.
 */
namespace Model;
class ProgDTO
{
    /**********************************Les Variables***************************************/
    private $NomProg;
    private $Duree;
    private $NomReal;
    private $NomChaine;
    private $Heure;


    /**********************************Getter et Setter****************************/

    public function setNomProg($NomProg)
    {
        $this->NomProg = $NomProg;
    }

    public function getNomProg()
    {
        return $this->NomProg;
    }

    public function setDuree($Duree)
    {
        $this->Duree = $Duree;
    }

    public function getDuree()
    {
        return $this->Duree;
    }

    public function setNomReal($NomReal)
    {
        $this->NomReal = $NomReal;
    }

    public function getNomReal()
    {
        return $this->NomReal;
    }

    public function setNomChaine($NomChaine)
    {
        $this->NomChaine = $NomChaine;
    }

    public function getNomChaine()
    {
        return $this->NomChaine;
    }

    public function setHeure($Heure)
    {
        $this->Heure = $Heure;
    }

    public function getHeure()
    {
        return $this->Heure;
    }

    
}
