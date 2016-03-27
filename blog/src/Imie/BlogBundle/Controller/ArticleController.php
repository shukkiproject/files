<?php

namespace Imie\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Imie\BlogBundle\Entity\Article;
use Imie\BlogBundle\Form\ArticleType;
use Imie\BlogBundle\Entity\Commentaire;
use Imie\BlogBundle\Form\CommentaireType;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Article controller.
 *
 * @Route("/article")
 */
class ArticleController extends Controller
{
    /**
     * Lists all Article entities.
     *
     * @Route("/page/{page}", defaults={"page" = 1}, name="article_index")
     * @Method("GET")
     */
    public function indexAction($page)
    {
        
        $eachPage=5;
        $start=($page-1)*$eachPage;
        
        // var_dump($start);
        // var_dump($page);
        $em = $this->getDoctrine()->getManager();

        $repo=$em->getRepository('ImieBlogBundle:Article');

        $total = $repo->findAll();
        $articles = $repo->showAllByRecent($start, $eachPage);
        $nbPage=ceil(count($total)/$eachPage);
        
        return $this->render('article/index.html.twig', array(
            'articles' => $articles,
            'nbPage' => $nbPage,
        ));


// to get just one result:
// $product = $query->setMaxResults(1)->getOneOrNullResult();
        // $paginator = new Paginator($query, $fetchJoinCollection = true);

        // $c = count($paginator);
        // foreach ($paginator as $post) {
        //     echo $post->getHeadline() . "\n";
        // }
    }

    /**
     * Creates a new Article entity.
     *
     * @Route("/new", name="article_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(new ArticleType(), $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->persist($article->getImage());
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Article entity.
     *
     * @Route("/{id}", name="article_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Article $article, Request $request)
    {
        //create edit and delete
        $deleteForm = $this->createDeleteForm($article);

        //show all the details of the article with comments and cat
        $em = $this->getDoctrine()->getManager();
        $details = $em->getRepository('ImieBlogBundle:Article')->showDetails($article->getId());
        // var_dump($details);

        //show the new commentaire input form
        $commentaire = new Commentaire();
        $commentaire->setArticle($details); //or construct in the entity
        $form = $this->createForm(new CommentaireType(), $commentaire);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em2 = $this->getDoctrine()->getManager();
            $em2->persist($commentaire);
            $em2->flush();

            return $this->redirectToRoute('article_show', array('id' => $details->getId()));
        }

        return $this->render('article/show.html.twig', array(
            'details' => $details,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Article entity.
     *
     * @Route("/{id}/edit", name="article_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm(new ArticleType(), $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Article entity.
     *
     * @Route("/{id}", name="article_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a Article entity.
     *
     * @param Article $article The Article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
