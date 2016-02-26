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



class Telephone{
    public $Numero;
    public $Intitule; // peut être personnalisé

    const MOBILE = "MOBILE";
    const DOMICILE = "DOMICILE";
    const PRO = "PRO";
    const FAX = "FAX";
    const AUTRE = "";

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
        
        $this->setNum($numero);
    }

    /*public function __construct($numero, $name){
        $this->setNum($numero);
        $this->setIntitule($name);
    }*/

    public function Afficher(){
        echo "<br><b>Numero:</b> $this->Numero<br><b>Intitulé :</b> $this->Intitule <br>";
    }    

    public function __toString(){
       return $this->Numero." ".$this->Intitule;
    }
    public function setNum($no){
        if ($this->CheckNum($no)==true) {
            $this->Numero=$no;
        } else {
            
            echo "Le numéro $no n'est pas valide.";
        }
    }
    static public function checkNum($numero){
        if (preg_match('/[0-9]{10}/', $numero) && strlen($numero)==10) {
            return true;
        } else { return false; }
    }

    public function setIntitule($name){
        if (in_array($name, [self::MOBILE, self::DOMICILE, self::PRO, self::FAX, self::AUTRE]))
        {
           $this->Intitule=$name;
        } else {echo "Ce intitule n'existe pas."; }
    }

    public function getNum(){
        return $this->Numero;
    }

    public function getIntitule(){
        return $this->Intitule;
    }
    
}

/*$telMobile = new Telephone("0656871594");
$telMobile->Afficher();

$telFixe = new Telephone("0298245975", Telephone::DOMICILE);
$telFixe->Afficher();

$tel = new Telephone("0800421421", Telephone::AUTRE);
$tel->Intitule = "Service client";
$tel->Afficher();

echo ">> $telMobile " . $telFixe."<br/>";

unset($telMobile);

if (isset($telMobile)) {
    $tel = clone $telMobile;
    echo ">> telMobile: $telMobile tel $tel <br/>";

    $tel->Numero = "0800421421";
    echo ">> telMobile: $telMobile tel $tel <br/>";

} else { echo "Ce numéro n'existe pas <br/>"; }
*/
$no="fdqshfljhd";
if (Telephone::checkNum($no)) {
    $telMob= new Telephone($no);
} else { echo "bad number!";}


$telNum = new Telephone(1012002255, "MOBILE");
echo "<br/>";
$telNum->setIntitule("PRO");
echo "<br/>";
$telNum->setNum("PRO");
echo "<br/>";
$telNum->Afficher();
echo "<br/>";
$tel2 = new Telephone("012dfqskfjdoqs567", "abc");
echo "<br/>";

        ?>
    </body>
</html>
