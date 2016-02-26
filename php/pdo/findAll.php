<?php

    
	require_once("UserDAO.php");

    $dao = new UserDAO(Db::getPdo());

    $users = $dao->findAll();


?>