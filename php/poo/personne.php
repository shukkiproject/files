<?php 
class Personne {
	protected $nom;
	protected $age;

	public function __construct($sonNom, $sonAge){
		$this->nom=$sonNom;
		$this->age=$sonAge;
	}

	public function sayHello(){
		echo "Hello!";
	}

	public function Afficher() {
		echo "Pesonne: $this->nom <br/>";
	}
}

class Eleve extends Personne{
	private $cours;

	public function __construct($nom, $age, $cours){
		parent::__construct($nom, $age);
		$this->cours = $cours;
	}

	public function Afficher(){
		$n=Personne::Afficher();
		echo "Cours : $this->cours";
		echo "Hey Hey!!";
	}
}

class Professor extends Personne{
	private $salary;

	public function setSalary($sal){
		if (is_int($sal)) {
			$this->salary=$sal;
		}
	}

	public function Afficher(){
		$n=Personne::Afficher();
		echo "Salary : $this->salary";
	}
}

$alice = new Personne("Alice", 12);
$alice->Afficher();

$unEleve = new Eleve("Bob", 15, "Biologie");
$unEleve->Afficher();

$prof= new Professor("Prof101", 38);
$prof->setSalary(20000000);
$prof->Afficher();

?>