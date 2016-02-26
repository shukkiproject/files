<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <style>
            body {
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 14px;
                color:#fffffff;
            }
        </style> 

        <title>Programmation POO</title>
    </head>

    <body>

        <h3>Classes PHP</h3>
        <?php 

echo "Gestionnaire de contacts<br>";

class Contact{
    protected $Nom;
    protected $Prenom;
    protected $Telephone=array();

    public function __construct($nom, $prenom, $noTelephone=""){
        $this->Nom = $nom;
        $this->Prenom = $prenom;
        $this->Telephone[] = new Telephone($noTelephone);
    }

    /*public function getTelephone($no){
        $this->Telephone[$no]->getNumero();
    }

    public function setTelephone($tel){
        $this->Telephone[$no]->setNumero($tel);
    }*/

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }


    public function Afficher($var){
        echo "<br><b>Nom:</b> $this->Nom<br><b>prénom :</b> $this->Prenom <br><b>Téléphone :</b>".$this->Telephone[array_search($var, $this->Telephone)]."<br>";
    }

    public function __toString(){
        return "$this->Nom $this->Prenom";
    }
}

class ContactMedia extends Contact{
    private $Photo;

    public function __construct($nom, $prenom, $telephone="", PhotoPortrait $photo= null){
        parent::__construct($nom, $prenom, $telephone);
        $this->Photo=$photo;
    }
    public function Afficher($var){
        parent::Afficher($var);
        //echo "$this->Photo";

        $this->Photo->Afficher();
    }

    //to string
}

interface IGestionContact{
    public function Ajouter(Contact $cont);
    public function Supprimer(Contact $cont);
    
    public function Rechercher($nom);
}

class GestionContact implements IGestionContact{
    private $Contact=array();

    const NUMERO_VERSION = "1.0.0";

    public function getVersion(){
        return "Version".self::NUMERO_VERSION;
    }

    public function Ajouter(Contact $cont){
        $this->Contact[]=$cont;
    }

    public function Rechercher($nom){
        foreach ($his->Contact as $c) {
            if (stristr($c->Nom, $nom)) {
                return $c;
            }
        }
    }

    public function TotalElements(){
        return count($this->Contact);
    }

    public function Afficher($nom){
        foreach ($this->Contact as $c) {
            if (stristr($c->Nom, $nom)) {
                $c->Afficher();
            }
        }
    }

    public function afficherTous(){
        foreach ($this->Contact as $ct) {
        $ct->Afficher($ct);
        }   
    }

    public function supprimer(Contact $cont){
        if (in_array($cont, $this->Contact)) {
            unset($this->Contact[array_search($cont, $this->Contact)]);
        }
    }

    public function SupprimerTous(){
        unset($this->Contact);
        $this->Contact=array();
    }
}

abstract class Photo{
    protected $Largeur;
    protected $Hauteur;
    protected $Source;

    public function __construct($source, $largeur=80, $hauteur=80){
        $this->Largeur =$largeur;
        $this->Hauteur =$hauteur;
        $this->Source = $source;
    }

    abstract public function Afficher();

    public function __toString(){
        return $this->Source;
    }
} 

class PhotoPortrait extends Photo{

    protected function CodeHtml(){

        try{
            if ($this->Largeur < 10 || $this->Hauteur < 10) {
            throw new Exception("La photo est trop petite : (10 x 10 mini)");
            }
        } catch (Exception $e){
            echo 'un pb est survenu :'.$e->getMessage()."<br/>";
        }
        return "<img src='$this->Source' />";
    }

    public function Afficher(){
        echo $this->CodeHtml();
    }

    public function __toString(){
        parent::__toString();
    }
}

class Telephone{
    private $Numero;
    public $Intitule; // peut être personnalisé

    const MOBILE = 1;
    const DOMICILE = 2;
    const PRO = 3;
    const FAX = 4;
    const AUTRE = 5;

    public function getNumero(){
        return $this->Numero;
    }

    public function setNumero($no){       
        try{
            if($this->CheckNumero($no)==true){
            $this->Numero = $no;
            }else{ 
            $this->Numero="";
            throw new Exception("le numéro $no est invalide");
            } 
        } catch (Exception $e){
            echo $e->getMessage()."<br/>";
        }   
    }

    static public function CheckNumero($no){      
        if(preg_match('/[0-9]{10}/', $no) && strlen($no) == 10)
           return true;
        else
           return false;
    }

    public function __construct($numero, $type = self::MOBILE){
        switch($type){
            case self::MOBILE : $this->Intitule = "MOBILE";
                break;
            case self::DOMICILE : $this->Intitule = "DOMICILE";
                break;
            case self::PRO : $this->Intitule = "PRO";
                break;
            case self::FAX : $this->Intitule = "FAX";
                break;
            case self::AUTRE : $this->Intitule = "";   
                break;			
            default : $this->Intitule = "MOBILE";
        }
        $this->setNumero($numero);
    }

    public function Afficher(){
        echo "<br><b>Numero:</b> $this->Numero<br><b>Intitulé :</b> $this->Intitule<br>";
    }    

    public function __toString(){
        return "$this->Numero $this->Intitule";
    }
}

$telMobile = new Telephone("0656871594");
$telMobile->Afficher();


$telFixe = new Telephone("0298245975", Telephone::DOMICILE);
$telFixe->Afficher();

$tel = new Telephone("0800421421", Telephone::AUTRE);
$tel->Intitule = "Service client";
$tel->Afficher();

echo ">> $telMobile " . $telFixe;

echo "<br><br><br><br>";


$contact = new Contact("Duron", "Wilfrid", "0202301221");
//$contact->Telephone = "0634436810";
//$contact->setTelephone("01234567");
//echo "<br> Type de l'objet : ". get_class($contact->Telephone[0]);

$contact->Afficher("Duron");
echo "<b>Contact :</b> $contact <br>";

$photo= new PhotoPortrait("cat.jpg", 20 , 9);

$p = new ContactMedia("fdfsht", "dfqf", "0240404040", $photo);
$p->Afficher("dfqf");
echo "<br>";
//$gestionContact->Supprimer($contact);
//echo "<b>Nombre de contacts :</b> {$gestionContact->NombreContacts()} <br>";
$newPho= new PhotoPortrait("pig.jpg");
$newPho->Afficher();

$contactImg = new ContactMedia ("little", "pig", "0240756958", $newPho);
$contactImg->Afficher("0240756958");
echo "<br/><b>Contact :</b> $contactImg <br>";

$tabContact=array();
$tabContact[]=["little", "cat2", "0203040506", "cat2.jpg"];
$tabContact[]=["little", "cat3", "0203040507", "cat3.jpg"];
$tabContact[]=["toto", "ro1", "0203040508", "totoro1.jpg"];
$tabContact[]=["toto", "ro2", "0203040509", "totoro2.jpg"];
$tabContact[]=["toto", "ro3", "0203040510", "totoro3.jpg"];

$tabObj=array();

for ($i=0; $i < count($tabContact) ; $i++) { 
    $tabObj[$i] = new ContactMedia ($tabContact[$i][0],$tabContact[$i][1], $tabContact[$i][2],new PhotoPortrait($tabContact[$i][3]));
}

$tabObj[]=$contact;
$tabObj[]=$p;
$tabObj[]=$contactImg;

foreach ($tabObj as $cont) {
   $cont->Afficher("0");
}

$contacts = new GestionContact();
$contacts->Ajouter($contact);
$contacts->Ajouter($contactImg);

$contacts->AfficherTous();
$contacts->Afficher("tar");

$z= new Contact("a", "b", "c");


        ?>
    </body>
</html>
