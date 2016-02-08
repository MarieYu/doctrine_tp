<?php 
//trait_UserConnect.php
session_start();
require_once('../bootstrap.php');

use Entity\User;

//récupération en session du login (username) et du mdp pour la connexion
if (isset($_POST['username'], $_POST['password'])){
	$login = htmlentities($_POST['username']);
	$pwd = htmlentities($_POST['password']);

	//on récupère l'objet $user avec toutes les données dans la BDD à partir du moment où username et pwd concordants
	$user = $entityManager->getRepository('Entity\User')->findOneBy(array(
		'username' => $login,
		'password' => $pwd,
		));

	//mettre l'utilisateur en session après vérif des données:
	if(!is_null($user)){
		$_SESSION['user'] = serialize($user);//tranforme $user en objet
		//var_dump($_SESSION['user']);
		header('Location: post.php');
	}
	else{
		die('Erreur de login ou de mot de passe');
	}

}



?>