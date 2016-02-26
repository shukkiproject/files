<?php 
namespace chaine;

class Chaine{
	private $id;
	private $nom;
	private $adr;
	private $postal;
	private $ville;
	private $tel;
	private $fax;
	private $cable;

	public function setId($id){
	$this->id = $id;
	    return $this;
	}

	public function setNom($nom){
	$this->nom = $nom;
	    return $this;
	}
	public function setAdr($adr){
	$this->adr = $adr;
	    return $this;
	}
	public function setPostal($postal){
	$this->postal = $postal;
	    return $this;
	}
	public function setVille($ville){
	$this->ville = $ville;
	    return $this;
	}
	public function setTel($tel){
	$this->tel = $tel;
	    return $this;
	}
	public function setFax($fax){
	$this->fax = $fax;
	    return $this;
	}
	public function setCable($cable){
	$this->cable = $cable;
	    return $this;
	}

	public function getId(){
    	return $this->id;
  	}

  	public function getNom(){
    	return $this->nom;
  	}

  	public function getAdr(){
    	return $this->adr;
  	}

  	public function getPostal(){
    	return $this->postal;
  	}

  	public function getVille(){
    	return $this->ville;
  	}

  	public function getTel(){
    	return $this->tel;
  	}

  	public function getFax(){
    	return $this->fax;
  	}

  	public function getCable(){
    	return $this->cable;
  	}

}


 ?>