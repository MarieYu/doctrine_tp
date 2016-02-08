<?php 
//logout.php
session_start();
session_destroy();

$user = null;//destruction de la variable user

header('Location: post.php');

?>