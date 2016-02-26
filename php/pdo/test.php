<?php //test.php

require_once('user.php');
require_once('UserDAO.php');

$user = new User();
$dao = new UserDAO(Db::getPdo());

//$user->setLogin("Gabriel")->setPwd(1234);

//$dao->insert($user);

//$user->setLogin("Gabriel222")->setPwd(12345);

$a=$dao->findStartingWith("s");

var_dump($a);



