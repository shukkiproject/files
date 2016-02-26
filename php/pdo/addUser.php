<?php

session_start();

require_once("user.php");
require_once("UserDAO.php");

if(isset($_POST['login'], $_POST['pwd'])){
 
  $user = new User();
  $user->setLogin(strip_tags($_POST['login']))
       ->setPwd($_POST['pwd']);

  $dao = new UserDAO(Db::getPdo());
  $dao->insert($user);

  $_SESSION['msg'] = "Utilisateur ajouté.";

}

header('Location: index.php');
?>