<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Erwan
 * Date: 08/12/14
 * Time: 10:00
 * To change this template use File | Settings | File Templates.
 */
namespace Model;

class ProgDAO extends Model
{

    public function getProgCeSoir(){
        $sql = 'SELECT nom_programme, duree, nom_realisateur, nom_chaine, heure FROM programmation pn INNER JOIN programmes ps ON pn.programme_id=ps.programme_id INNER JOIN realisateur r ON r.realisateur_id=ps.realisateur_id INNER JOIN chaine c ON c.chaine_id=pn.chaine_id WHERE date_diffusion="2015-05-01";';

        $progCeSoir = array();
        $result=$this->executeRequest($sql);

        while($retourChaine = $result->fetch(\PDO::FETCH_OBJ)){
            $c = new ProgDTO();
            $c->setNomProg($retourChaine->nom_programme);
            $c->setDuree($retourChaine->duree);
            $c->setNomReal($retourChaine->nom_realisateur);
            $c->setNomChaine($retourChaine->nom_chaine);
            $c->setHeure($retourChaine->heure);
            
            $progCeSoir[]=$c;
        }
        return $progCeSoir;
    }

    
}
