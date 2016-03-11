<?php

namespace Iabsis\VideothequeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Iabsis\VideothequeBundle\Entity\Illustration;
use Iabsis\VideothequeBundle\Form\IllustrationType;

/**
 * Illustration controller.
 *
 * @Route("/illustration")
 */
class IllustrationController extends Controller
{

    /**
     * Lists all Illustration entities.
     *
     * @Route("/", name="illustration")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IabsisVideothequeBundle:Illustration')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Illustration entity.
     *
     * @Route("/", name="illustration_create")
     * @Method("POST")
     * @Template("IabsisVideothequeBundle:Illustration:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Illustration();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('illustration_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Illustration entity.
     *
     * @param Illustration $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Illustration $entity)
    {
        $form = $this->createForm(new IllustrationType(), $entity, array(
            'action' => $this->generateUrl('illustration_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Illustration entity.
     *
     * @Route("/new", name="illustration_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Illustration();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Illustration entity.
     *
     * @Route("/{id}", name="illustration_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IabsisVideothequeBundle:Illustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Illustration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Illustration entity.
     *
     * @Route("/{id}/edit", name="illustration_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IabsisVideothequeBundle:Illustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Illustration entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Illustration entity.
    *
    * @param Illustration $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Illustration $entity)
    {
        $form = $this->createForm(new IllustrationType(), $entity, array(
            'action' => $this->generateUrl('illustration_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Illustration entity.
     *
     * @Route("/{id}", name="illustration_update")
     * @Method("PUT")
     * @Template("IabsisVideothequeBundle:Illustration:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IabsisVideothequeBundle:Illustration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Illustration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('illustration_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Illustration entity.
     *
     * @Route("/{id}", name="illustration_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IabsisVideothequeBundle:Illustration')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Illustration entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('illustration'));
    }

    /**
     * Creates a form to delete a Illustration entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('illustration_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
