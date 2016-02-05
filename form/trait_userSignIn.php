<?php
//trait_userSignIn.php

require('../bootstrap.php');

use Entity\User;

if(isset($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['birthDate'],
	$_POST['email'], $_POST['password'], $_POST['description'])){

	$username = htmlentities($_POST['username']);
	$firstname = htmlentities($_POST['firstname']);
	$lastname = htmlentities($_POST['lastname']);
	$birthDate = htmlentities($_POST['birthDate']);
	$email = htmlentities($_POST['email']);
	$password = htmlentities($_POST['password']);
	$description = htmlentities($_POST['description']);

	$user = new User($_POST['email'], $_POST['username'], $_POST['password'], $_POST['description'],
	 $_POST['firstname'], $_POST['lastname'], $_POST['birthDate']);

	$entityManager->persist($user);
	$entityManager->flush($user);
}

?>