<?php

namespace BdRentalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BdRentalBundle\Entity\BD;
use BdRentalBundle\Form\BDType;

/**
 * BD controller.
 *
 * @Route("/bd")
 */
class BDController extends Controller
{
    /**
     * Lists all BD entities.
     *
     * @Route("/", name="bd_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bDs = $em->getRepository('BdRentalBundle:BD')->findAll();

        return $this->render('bd/index.html.twig', array(
            'bDs' => $bDs,

        ));
    }

    /**
     * Lists all BD dispo.
     *
     * @Route("/dispo", name="bd_dispo")
     * @Method("GET")
     */    
    public function dispoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bDs = $em->getRepository('BdRentalBundle:BD')->getAllDispo();

        $bdDispo = [];

        foreach ($bDs as $bd) {
            if(count($bd->getLocations())===0){
                $bdDispo[]=$bd;
            }
        }

        return $this->render('bd/dispo.html.twig', array(
            'bDs' => $bdDispo,
        ));
    }
    /**
     * Creates a new BD entity.
     *
     * @Route("/new", name="bd_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $bD = new BD();
        $form = $this->createForm('BdRentalBundle\Form\BDType', $bD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bD);
            $em->flush();

            return $this->redirectToRoute('bd_show', array('id' => $bD->getId()));
        }

        return $this->render('bd/new.html.twig', array(
            'bD' => $bD,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a BD entity.
     *
     * @Route("/{id}", name="bd_show")
     * @Method("GET")
     */
    public function showAction(BD $bD)
    {
        $deleteForm = $this->createDeleteForm($bD);

        return $this->render('bd/show.html.twig', array(
            'bD' => $bD,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing BD entity.
     *
     * @Route("/{id}/edit", name="bd_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, BD $bD)
    {
        $deleteForm = $this->createDeleteForm($bD);
        $editForm = $this->createForm('BdRentalBundle\Form\BDType', $bD);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bD);
            $em->flush();

            return $this->redirectToRoute('bd_edit', array('id' => $bD->getId()));
        }

        return $this->render('bd/edit.html.twig', array(
            'bD' => $bD,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a BD entity.
     *
     * @Route("/{id}", name="bd_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, BD $bD)
    {
        $form = $this->createDeleteForm($bD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bD);
            $em->flush();
        }

        return $this->redirectToRoute('bd_index');
    }

    /**
     * Creates a form to delete a BD entity.
     *
     * @param BD $bD The BD entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BD $bD)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bd_delete', array('id' => $bD->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
