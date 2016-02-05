<?php 
require('../bootstrap.php');

use Entity\Post;


//recup du $_POST
if(isset($_POST['id'],$_POST['subject'],$_POST['message'])){
	$id = (int)$_POST['id'];
	//si $id= -1 c'est la valeur par défaut, donc c'est qu'il s'agit d'un nouveau post
	if($id === -1){
		$post = new Post($_POST['subject'], $_POST['message']);
		
	}
	//$id!=-1 donc il s'adit d'un post en modification
	else{
		$post = $entityManager->getRepository('Entity\Post')->find($id);
		$post->setSubject($_POST['subject'])->setMessage($_POST['message']);//utilisation des setters
	}
	$entityManager->persist($post);
	$entityManager->flush($post);
}



header('Location: post.php');



?>