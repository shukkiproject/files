<?php

namespace Imie\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Blog controller.
 *
 * @Route("/")
 */
class BlogController extends Controller
{
    
    /**
     * @Route("/")
     */
    public function indexAction(){    
        $response = $this->forward('ImieBlogBundle:Article:index', array('page'=> '1'));
        return $response; 
    } 

     /**
     * @Route("/admin")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

     /**
     * @Route("/admin/users")
     */
    public function adminUsersAction()
    {
        return new Response('<html><body>Admin Users page!</body></html>');
    }
 //    public function ajouterAction()
 //    {
 //        // return $this->render('ImieBlogBundle:Default:index.html.twig');
 //        return new Response('ajouter');
 //    }
 //    public function modifierAction($id)
 //    {
 //        // return $this->render('ImieBlogBundle:Default:index.html.twig');
 //        return new Response('modifier'. $id);
 //    }
 //    public function supprimerAction($id)
 //    {
 //        // return $this->render('ImieBlogBundle:Default:index.html.twig');
 //        return new Response('supprimer'. $id);
 //    }
 //    public function voirAction($id)
 //    {
 //        // return $this->render('ImieBlogBundle:Default:index.html.twig');
 //        return new Response('voir'. $id);
 //    }
 //    public function ajCommentaireAction()
 //    {
 //        // return $this->render('ImieBlogBundle:Default:index.html.twig');
 //        return new Response('ajCommentaire');
 //    }
 //    public function suppCommentaireAction($id)
 //    {
 //        // return $this->render('ImieBlogBundle:Default:index.html.twig');
 //        return new Response('suppCommentaire'. $id);
	// }
 //    public function afficherTousAction($page)
 //    {
 //        // return $this->render('ImieBlogBundle:Default:index.html.twig');
 //        return new Response('afficehrTous'. $page);
 //    }
}
