<?php 
require_once("session.php");
require_once("define.php");
require_once("cookie.php");

function loginForm(){
	$login="<form action='connexion.php' method='post' >
		<fieldset>
			<input type='text' name='ident' placeholder='Login' required>
			<input type='password' name='pwd' placeholder='Password' required>
			<label>Remember Me!
			<input type='checkbox' name='rmb'></label>
			<input type='submit' name='submit' value='Go'>
		</fieldset>
		</form>";

	echo $login;
}

function bienvenue(){
	echo "<div>Bienvenue ".USER." | <a href='deconnexion.php' >Deconnexion</a>";

}

function controlLogin(){
	
	if (!isset($_SESSION[USER])) {
			loginForm();	
		} else {
			bienvenue();
		}
		
	}


 ?>

