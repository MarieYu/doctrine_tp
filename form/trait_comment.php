<?php
require('../bootstrap.php');

use Entity\Comment;

$comment = new Comment($_POST['message']);
$entityManager->persist($comment);
$entityManager->flush($comment);


header('Location: comment.php?id='.$_POST['id']);

?>