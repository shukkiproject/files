<?php
session_start();

require_once("UserDAO.php");

if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $dao = new UserDAO(Db::getPdo());  
    
    $user=$dao->find($_GET['id']);
    
    $dao->insert($user);


    
}

header('Location: index.php');
?>