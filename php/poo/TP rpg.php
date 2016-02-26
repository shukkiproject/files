<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <style>
            body {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 16px;
                color:#fffffff;
            }

            .roundedImage{
                overflow:hidden;
                -webkit-border-radius:50px;
                -moz-border-radius:50px;
                border-radius:50px;
                width:80px;
                height:80px;
            }
        </style> 

        <title>POO avec PHP</title>
    </head>

    <body>

        <h3>Programmation orientée objet avec PHP</h3>
        <?php 

echo "<hr>";


class Attributs {

    const POINTS_MAXIMUM = 40;

    public $dexterite;
    public $constitution;
    public $intelligence;
    public $sagesse;
    public $force;
    public $velocite;
    public $endurance;
    public $pointsDeVie;  

    public function __construct($dexterite=5, $constitution=5, $intelligence=5, $sagesse=5, $force=5, $velocite=5, $endurance=5, $pointsDeVie=5){
        $this->dexterite = $dexterite;
        $this->constitution = $constitution;
        $this->intelligence = $intelligence;
        $this->sagesse = $sagesse;
        $this->force = $force;
        $this->velocite = $velocite;
        $this->endurance = $endurance;
        $this->pointsDeVie = $pointsDeVie;

        if($this->RessourceDepassee() == true) 
            throw Exception("Trop de ressources sont utilisées !");
    }

    public function Afficher(){
        echo "dexterité : <b>$this->dexterite</b><br>";
        echo "constitution : <b>$this->constitution</b><br>";
        echo "intelligence : <b>$this->intelligence</b><br>";
        echo "sagesse : <b>$this->sagesse</b><br>";
        echo "force : <b>$this->force</b><br>";
        echo "velocite : <b>$this->velocite</b><br>";
        echo "endurance : <b>$this->endurance</b><br>";
        echo "points de vie : <b>$this->pointsDeVie</b><br>";        
    }    

    public function PointsAttaque(){
        return ($this->dexterite * $this->velocite * $this->force)
            + $this->intelligence + $this->pointsDeVie;
    }

    public function PointsDefense(){
        return ($this->constitution * $this->endurance)
            + ($this->sagesse + $this->pointsDeVie);
    }    

    public function RessourceDepassee(){
        if( $this->dexterite + $this->constitution + $this->intelligence + $this->sagesse + 
           $this->force + $this->velocite + $this->endurance + $this->pointsDeVie  > self::POINTS_MAXIMUM)
            return true;
        else 
            return false;

    }
}

interface IPersonnage{
    public function Espece();  // retourne une chaine de caratère indiquant l'espèce  
    public function Attaque(); // retour le nombre de points d'attaque calculé grace aux attributs
    public function Defense(); // retour le nombre de points de défense calculé grace aux attributs
    public function Blessure(); // décrémément un point de vie
    public function Cout();     // retourne le "cout" du personnage (correspond aux points d'attaques+ points de défense)
    public function estVivant(); // return true si points de vie positif , false dans le cas contraire.
    public function Afficher(); // affiche l'espèce, le nom et les attributs du personnage
}

abstract class Personnage implements IPersonnage {

    protected $nom;
    protected $attributs;

    public function __construct($nom){
        $this->nom=$nom;
        $this->attributs=new Attributs; // composition et non agregation
    }

    abstract public function Espece();

    public function Attaque(){
        return $this->attributs->PointsAttaque();
    }  

    public function Defense(){
        return $this->attributs->PointsDefense();
    } 

    public function Blessure(){
        return $this->attributs->pointsDeVie -= rand(1,10);
    }

    public function Cout(){
        return $this->Attaque() + $this->Defense();
        }

    public function estVivant(){
        if ($this->attributs->pointsDeVie>0) {
            return true;
        } else{return false;}
    } 

    public function Afficher(){
        echo "<br/>".$this->Espece()." : ".$this->nom."<br/>";
        $this->attributs->Afficher();
    }

    public function __toString(){
        return $this->nom;
    } 
}

class Nain extends Personnage {
    public function __construct ($nom){
        parent::__construct($nom);
        $this->attributs->dexterite = rand(1,5);
        $this->attributs->constitution = rand(1,5);
        $this->attributs->intelligence = rand(1,5);
        $this->attributs->sagesse = rand(1,5);
        $this->attributs->force = rand(1,5);
        $this->attributs->velocite = rand(1,5);
        $this->attributs->endurance = rand(1,5);
        $this->attributs->pointsDeVie = rand(1,5);        
    }

    public function Espece(){
        return "nain";
    }
       
}

class Humain extends Personnage {
    public function __construct ($nom){
        parent::__construct($nom);
        $this->attributs->dexterite = rand(1,5);
        $this->attributs->constitution = rand(1,5);
        $this->attributs->intelligence = rand(1,5);
        $this->attributs->sagesse = rand(1,5);
        $this->attributs->force = rand(1,5);
        $this->attributs->velocite = rand(1,5);
        $this->attributs->endurance = rand(1,5);
        $this->attributs->pointsDeVie = rand(1,5); 
    }

    public function Espece(){
        return "Humain";
    }
}

class Magicien extends Personnage {
    public function __construct ($nom){
        parent::__construct($nom);
        $this->attributs->dexterite = rand(1,5);
        $this->attributs->constitution = rand(1,5);
        $this->attributs->intelligence = rand(1,5);
        $this->attributs->sagesse = rand(1,5);
        $this->attributs->force = rand(1,5);
        $this->attributs->velocite = rand(1,5);
        $this->attributs->endurance = rand(1,5);
        $this->attributs->pointsDeVie = rand(1,5);     }

    public function Espece(){
        return "Magicien";
    }   
}
class Guerrier extends Personnage {
    public function __construct ($nom){
        parent::__construct($nom);
        $this->attributs->dexterite = rand(1,5);
        $this->attributs->constitution = rand(1,5);
        $this->attributs->intelligence = rand(1,5);
        $this->attributs->sagesse = rand(1,5);
        $this->attributs->force = rand(1,5);
        $this->attributs->velocite = rand(1,5);
        $this->attributs->endurance = rand(1,5);
        $this->attributs->pointsDeVie = rand(1,5); 
    }

    public function Espece(){
        return "Guerrier";
    }
    
}
class Elfe extends Personnage {
    public function __construct ($nom){
        parent::__construct($nom);
        $this->attributs->dexterite = rand(1,5);
        $this->attributs->constitution = rand(1,5);
        $this->attributs->intelligence = rand(1,5);
        $this->attributs->sagesse = rand(1,5);
        $this->attributs->force = rand(1,5);
        $this->attributs->velocite = rand(1,5);
        $this->attributs->endurance = rand(1,5);
        $this->attributs->pointsDeVie = rand(1,5); 
    }

    public function Espece(){
        return "Elfe";
    }

}

class Armee {
    const COUT_MAX = 620;
    private $nom;
    private $coutTotal;
    public $combatants = array();

    public function __construct ($nom){
        $this->nom = $nom;
        $this->coutTotal = 0;
    }

    public function Engager(Personnage $pers){
        array_push($this->combatants, $pers);
        $this->coutTotal += $pers->Cout();
    }

    public function Afficher(){
        echo "<br><u>Combatants de l'armée $this->nom </u>";
        foreach($this->combatants as $pers)
            $pers->Afficher();
    }

    public function __toString(){
        return $this->nom;
    }    
}


class Combat {

    protected $armee1;
    protected $armee2;

    public function __construct (Armee $equipe1, Armee $equipe2){
        $this->armee1 = $equipe1;
        $this->armee2 = $equipe2;
    }    

    public function Combatre(){
        if(count($this->armee1->combatants) != count($this->armee2->combatants)){
            echo "<br> Les armées doivent comporter le même nombre de soldats !";
            return;
        }

        echo "<br>Le combat commence...";



        shuffle($this->armee1->combatants); // l'ordre des combatants est mélangé

        $combatants = count($this->armee1->combatants);
        for( $i=0; $i<$combatants; $i++ ){

            if(rand(1,2) == 2){ // le soldat qui attaque est tiré au hasard
                $soldat1 = $this->armee1->combatants[$i];
                $soldat2 = $this->armee2->combatants[$i];
            }else{
                $soldat2 = $this->armee1->combatants[$i];
                $soldat1 = $this->armee2->combatants[$i]; 
            }

            echo "<br>$soldat1 attaque avec " . $soldat1->Attaque() . " points";
            echo " et $soldat2 se défend avec " . $soldat2->Defense() . " points";  

            if($soldat1->Attaque() > $soldat2->Defense())
                $soldat2->Blessure();
            else if($soldat1->Attaque() < $soldat2->Defense())
                $soldat1->Blessure();
                else{ // égalité : les deux perdent des points
                $soldat1->Blessure();
                $soldat2->Blessure();
            }

            // encore en vie ?
            if($soldat1->estVivant() == false){
                echo "<br>$soldat1 de l'armée $this->armee1 est mort...";
                unset($this->armee1->combatants[$i]);
            }
            if($soldat2->estVivant() == false){
                echo "<br>$soldat2 de l'armée $this->armee2 est mort...";
                unset($this->armee2->combatants[$i]);
            }            
        }



        echo "<br><br>Le combat est terminé.<br>";
        if(count($this->armee1->combatants) > count($this->armee2->combatants)){
            echo "<br>L'armée $this->armee1 a gagné le combat !";
        }else if(count($this->armee1->combatants) < count($this->armee2->combatants)){
            echo "<br>L'armée $this->armee2 a gagné le combat !";
        }else
            echo "<br>Les deux armées sont à égalité.";
    }
}

$armee1 = new Armee("Albitron");

$armee1->Engager(new Nain("Salima"));
$armee1->Engager(new Humain("Hector"));
$armee1->Engager(new Magicien("Ivan"));
$armee1->Engager(new Nain("Emillio")); 
$armee1->Engager(new Magicien("Boris"));                 
$armee1->Engager(new Nain("Abalon")); 

$armee1->Afficher();


$armee2 = new Armee("Andegave");

$armee2->Engager(new Guerrier("Balsamik"));
$armee2->Engager(new Nain("Salom"));
$armee2->Engager(new Guerrier("Salam"));
$armee2->Engager(new Elfe("Valere")); 
$armee2->Engager(new Humain("Elkana"));  
$armee2->Engager(new Elfe("Elvira"));
$armee2->Afficher();


$guerre = new Combat($armee1, $armee2);
$guerre->Combatre();

echo "<br>------- rescapés du combat ------<br>";
$armee1->Afficher();
$armee2->Afficher();

        ?>
    </body>
</html>













