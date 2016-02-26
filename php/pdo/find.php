<?php

    
	require_once("UserDAO.php");

    $dao = new UserDAO(Db::getPdo());

    $user = $dao->find();


?>