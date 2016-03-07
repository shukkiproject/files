<?php 
namespace Imie\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class YaourtController extends Controller
{

    public function indexAction($categorie)
    {
    	if($categorie > 18)
        	// return new Response('Hello! Would you like some '.$categorie. '-flavoured yogurt ????');
        	return $this->render('ImieTestBundle:Yaourt:index.html.twig', array('categorie'=> $categorie));
        else
        	return new Response('I don\'t like '.$categorie. '-flavoured yogurt ????');
    }
}
