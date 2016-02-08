<?php 
//before.php

require('../bootstrap.php');

session_start(); //bien mettre le session_start après le bootstrap

//utilisateur est déjà en session ici, on doit indiquer à Doctrine que c'est un objet doctrine
if (isset($_SESSION['user'])){
	$user = $entityManager->merge(unserialize($_SESSION['user']));//transforme objet $_SESSION['user'] en string
}
else{
	$user = null;
}



?>