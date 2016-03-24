<?php

namespace SavingCatsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use SavingCatsBundle\Entity\Cat;
use SavingCatsBundle\Form\CatType;
use Symfony\Component\HttpFoundation\Request;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class CatRestController extends Controller
{
	//get 1 cat by name
  	public function getCatAction($maidenName){
    $cat = $this->getDoctrine()->getRepository('SavingCatsBundle:Cat')->findOneByMaidenName($maidenName);

	    if(!is_object($cat)){
	      throw $this->createNotFoundException();
	    }
        
    return $cat;
    // return $this->render('SavingCatsBundle:cat:show.html.twig', array(
    //         'cats' => $cats,
        // ));
  }
  	//get all cats
    public function getCatsAction(){
        $cats = $this->getDoctrine()->getRepository('SavingCatsBundle:Cat')->findAllAsc();
        return $cats;
      
    }


  	//update availability
  	// http://127.0.0.1:8000/api/cats/{id}/availability.{_format}
	public function putCatAvailabilityAction($id)
    {       
    		$cat = $this->getDoctrine()->getRepository('SavingCatsBundle:Cat')->findOneById($id);
    		$cat->setAvailability(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            return $cat;
    }
    
 //  	//update quality2 by form data
 //  	// http://127.0.0.1:8000/api/cats/1
	// public function putCatAction($id, Request $request)
 //    {       
 //    		$data=$request->request->get('quality2');

 //    		// var_dump($data);
 //    		// var_dump($quality2);
 //    		// die;

 //    		$cat = $this->getDoctrine()->getRepository('SavingCatsBundle:Cat')->findOneById($id);
 //    		$cat->setQuality2($data);
 //            $em = $this->getDoctrine()->getManager();
 //            $em->persist($cat);
 //            $em->flush();
 //            return $cat;
 //    }

    //change quality2 by post
    //http://127.0.0.1:8000/api/cats/2/qualities
    	public function putCatQualitiesAction($id, Request $request)
    {       

    		$cat = $this->getDoctrine()->getRepository('SavingCatsBundle:Cat')->findOneById($id);
    		$data=$request->request->get('quality2');
    		$cat->setQuality2($data);

            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

        return $cat;
    }

    //not finished!! 
  	public function postCatAction(Request $request){
 
  		$cat = new Cat();

        $form = $this->createForm('SavingCatsBundle\Form\CatType', $cat);
        $form->bind($request);
        // $form->handleRequest($request);
        // $entity->setOrganizer($form->get('organizer')->getData());

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('cat_show', array('id' => $cat->getId()));
        }

        return $form;
        
  	}

    public function deleteCatsAction($id){
    $cat = $this->getDoctrine()->getRepository('SavingCatsBundle:Cat')->findOneById($id);

        if(!is_object($cat)){
      throw $this->createNotFoundException();
    }

    $delcat = $this->getDoctrine()->getManager();
    $delcat->remove($cat);
    $delcat->flush();

    	return "ok";
  }

}