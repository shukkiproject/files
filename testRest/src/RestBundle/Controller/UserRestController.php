<?php

namespace RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\RestBundle\Controller\Annotations\View;
use RestBundle\Entity\Users;

class UserRestController extends Controller
{



    public function getUserAction($username){
    $user = $this->getDoctrine()->getRepository('RestBundle:Users')->findOneByUsername($username);
    if(!is_object($user)){
      throw $this->createNotFoundException();
    }
    return $user;
  }

      public function getUsersAction(){
        $users = $this->getDoctrine()->getRepository('RestBundle:Users')->findAll();
        return $users;
    }

    public function deleteUserAction($userId){
    $user = $this->getDoctrine()->getRepository('RestBundle:Users')->findOneById($userId);

        if(!is_object($user)){
      throw $this->createNotFoundException();
    }

    $deluser = $this->getDoctrine()->getManager();
    $deluser->remove($user);
    $deluser->flush();

    	return "ok";
  }

  	public function postUsersAction(Request $request){
  		$user = new Users();


  }

public function newAction(Request $request)
    {
        $user = new Users();
        $form = $this->createForm('RestBundle\Form\UsersType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('users_show', array('id' => $user->getId()));
        }

        return $this->render('users/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

}
