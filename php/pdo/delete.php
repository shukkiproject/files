<?php
session_start();

require_once("UserDAO.php");

if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $dao = new UserDAO(Db::getPdo());  
    
    $dao->delete($_GET['id']);
     
    $_SESSION['msg'] = "Utilisateur supprimé.";
}

header('Location: index.php');
?>