<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Erwan
 * Date: 08/12/14
 * Time: 10:00
 * To change this template use File | Settings | File Templates.
 */
namespace Model;
class ChaineDTO
{
    /**********************************Les Variables***************************************/
    private $id;
    private $nom;
    private $adresse;
    private $cp;
    private $ville;
    private $tel;
    private $fax;
    private $payant;

    /**********************************Getter et Setter****************************/


    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setPayant($payant)
    {
        $this->payant = $payant;
    }

    public function getPayant()
    {
        return $this->payant;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    public function getVille()
    {
        return $this->ville;
    }

}
