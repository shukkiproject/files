<?php
session_start();


require_once("UserDAO.php");

    $dao = new UserDAO(Db::getPdo());  
    
    $dao->deleteAll();
     
    $_SESSION['msg'] = "Tout supprimé.";
    
header('Location: index.php');
?>