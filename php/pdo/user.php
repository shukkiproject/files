<?php 

class User{
	private $id;
	private $login;
	private $pwd;

	// public function __construct($id, $login, $pwd){
	// 	$this->id=$id;
	// 	$this->login=$login;
	// 	$this->pwd=$pwd;
	// }

	public function getId(){
		return $this->id;
	}

	public function getLogin(){
		return $this->login;
	}
	public function getPwd(){
		return $this->pwd;
	}

	public function setId($id){
		$this->id=$id;
		return $this;
	}

	public function setLogin($login){
		$this->login=$login;
		return $this;
	}

	public function setPwd($pwd){
		$this->pwd=hash("sha256", $pwd);
		return $this;
	}


	}




 ?>
