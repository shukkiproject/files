<?php
session_start();

require_once("UserDAO.php");

if(isset($_POST['id'], $_POST['login'], $_POST['pwd'])){
 
  // var_dump($_POST['id']);
  // var_dump($_POST['login']);
  // var_dump($_POST['pwd']);
  // die();

  $dao = new UserDAO(Db::getPdo()); 
  $user = new User;
  $user->setId($_POST['id'])
       ->setLogin(strip_tags($_POST['login']))
       ->setPwd($_POST['pwd']);

  $dao->update($user);

}



header('Location: index.php');
?>