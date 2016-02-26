<?php 
session_start();

class Contact{
		private $nom;
		private $prenom;
		private $telephone;
		public static $nbPerson = 0;
		const MAX_PERSON ='10';

		public function __construct($nom, $pre){
			$this->nom=$nom;
			$this->prenom=$pre;
			self::$nbPerson++;
			echo 'test : '.self::MAX_PERSON;

		}

		public function afficher(){
			echo "<p>Name : $this->nom<br/>
			First Name : $this->prenom<br/>
			Tel : $this->telephone
			</p>";
		}

		public function setTel($tel){
			$this->telephone=$tel;
		}

		public static function getNbPerson(){
			return self::$nbPerson;
		}

		public function __toString(){
			return "$this->nom $this->prenom"; 
		}
}

class Libelle{

		protected $css;
		protected $skin;
		protected $position;

	public function __construct($label){
		$this->texte=$label;

		$this->css="defaut.css";
		$this->skin="dark";
		$this->position="top";
	}
	

	private function JustifierGauche(){
		echo "Libelle--------------------<br/>";
	}

	private function JustifierCentre(){
		echo "---------Libelle-----------<br/>";
	}

	private function JustifierDroite(){
		echo "---------------------Libelle<br/>";
	}

	public function Afficher($mode){

		if ($mode=="g") {
			$this->JustifierGauche();
		}
		if ($mode=="c") {
			$this->JustifierCentre();
		}
		if ($mode=="d") {
			$this->JustifierDroite();
		}
	}

	public function __destruct() {
		echo "destruction de l'objet<br/>";
	}

	public function __get($property){
		if (property_exists($this, $property)) {
			return $this->$property;
		}

	}
}

class Voiture{} 
$maVoiture=new Voiture();

if ($maVoiture instanceof Voiture) {
	echo "c'est une voiture.";
} else {
	echo "pas une voiture.";
}

class Telephone(){
	
}

class NewContact{
		public $nom;
		public $prenom;
		private $tel;
		
		public function __construct($nom, $pre){
			$this->nom=$nom;
			$this->prenom=$pre;
		}

		public function getTel(){
			return this->tel;
		}

		public function setTel($tel, $type, $intitule){
			$this->tel[]=$tel;

		}

		public function afficher(){
			echo "<p>Name : $this->nom<br/>
			First Name : $this->prenom<br/>
			Tel : $this->tel
			</p>";
		}

		public function __toString(){
			return "$this->nom $this->prenom"; 
		}
}

 ?>