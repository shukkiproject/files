<?php

namespace BdRentalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BdRentalBundle\Entity\Membre;
use BdRentalBundle\Form\MembreType;

/**
 * Membre controller.
 *
 * @Route("/membre")
 */
class MembreController extends Controller
{
    /**
     * Lists all Membre entities.
     *
     * @Route("/", name="membre_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $membres = $em->getRepository('BdRentalBundle:Membre')->findAll();

        return $this->render('membre/index.html.twig', array(
            'membres' => $membres,
        ));
    }

    /**
     * Creates a new Membre entity.
     *
     * @Route("/new", name="membre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $membre = new Membre();
        $form = $this->createForm('BdRentalBundle\Form\MembreType', $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            return $this->redirectToRoute('membre_show', array('id' => $membre->getId()));
        }

        return $this->render('membre/new.html.twig', array(
            'membre' => $membre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Membre entity.
     *
     * @Route("/{id}", name="membre_show")
     * @Method("GET")
     */
    public function showAction(Membre $membre)
    {
        $deleteForm = $this->createDeleteForm($membre);

        return $this->render('membre/show.html.twig', array(
            'membre' => $membre,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Membre entity.
     *
     * @Route("/{id}/edit", name="membre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Membre $membre)
    {
        $deleteForm = $this->createDeleteForm($membre);
        $editForm = $this->createForm('BdRentalBundle\Form\MembreType', $membre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            return $this->redirectToRoute('membre_edit', array('id' => $membre->getId()));
        }

        return $this->render('membre/edit.html.twig', array(
            'membre' => $membre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Membre entity.
     *
     * @Route("/{id}", name="membre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Membre $membre)
    {
        $form = $this->createDeleteForm($membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($membre);
            $em->flush();
        }

        return $this->redirectToRoute('membre_index');
    }

    /**
     * Creates a form to delete a Membre entity.
     *
     * @param Membre $membre The Membre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Membre $membre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membre_delete', array('id' => $membre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
