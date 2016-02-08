<?php
require('before.php');

use Entity\Comment;
//var_dump($_POST);die();

//récup l'objet post en cours sur lequel on souhaite ajouter des comments
$post = $entityManager->getRepository('Entity\Post')->find($_POST['id']);

$comment = new Comment($_POST['message'], $user, $post);
$entityManager->persist($comment);
$entityManager->flush($comment);


header('Location: comment.php?id='.$_POST['id']);

?>