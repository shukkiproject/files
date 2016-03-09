<?php

namespace Imie\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    public function indexAction()
    {
        return $this->render('ImieBlogBundle:Blog:index.html.twig');
        // return new Response('homepage');
    }
    public function ajouterAction()
    {
        // return $this->render('ImieBlogBundle:Default:index.html.twig');
        return new Response('ajouter');
    }
    public function modifierAction($id)
    {
        // return $this->render('ImieBlogBundle:Default:index.html.twig');
        return new Response('modifier'. $id);
    }
    public function supprimerAction($id)
    {
        // return $this->render('ImieBlogBundle:Default:index.html.twig');
        return new Response('supprimer'. $id);
    }
    public function voirAction($id)
    {
        // return $this->render('ImieBlogBundle:Default:index.html.twig');
        return new Response('voir'. $id);
    }
    public function ajCommentaireAction()
    {
        // return $this->render('ImieBlogBundle:Default:index.html.twig');
        return new Response('ajCommentaire');
    }
    public function suppCommentaireAction($id)
    {
        // return $this->render('ImieBlogBundle:Default:index.html.twig');
        return new Response('suppCommentaire'. $id);
	}
    public function afficherTousAction($page)
    {
        // return $this->render('ImieBlogBundle:Default:index.html.twig');
        return new Response('afficehrTous'. $page);
    }
}
