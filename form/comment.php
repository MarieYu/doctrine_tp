<?php
require_once('before.php');

//var_dump($_GET);

if(isset($_GET['id'])){

	//afficher les messages par ordre décroissant 
	$post = $entityManager->getRepository('Entity\Post')->find($_GET['id']);
	//var_dump($post);

	//afficher les comments liés à un post:
	$comments = $entityManager->getRepository('Entity\Comment')->findBy(array('post' => $post), array('date' => 'ASC'));
	// var_dump($comments);
	//$comments = $entityManager->getRepository('Entity\Comment')->findBy(array(), array('date' => 'ASC')); //pour TP2
	//var_dump($comments);
	//$comments = $post->getComments();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<a href="http://localhost/~imie/Doctrine/tp1/form/post.php">Retour aux posts</a>

		<div>
			<?php if(isset($post)) :?>
			 	<table>
					<thead>
						<tr>
							<th>Date</th>
							<th>Sujet</th>
							<th>Message</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td><?= $post->getDate() ?></td>
							<td><?= $post->getSubject() ?></td>
							<td ><?= $post->getMessage() ?></td>
						</tr>
					</tbody>
				</table>
			<?php endif; ?>
		</div>
		
		<div>
			<?php if(isset($comments)): ?>
				<h3>Les commentaires relatifs au post "<?= $post->getSubject() ?>"</h3>
				<?php foreach($comments as $elem): ?>
					<li><?= $elem->getDate() .' : ' . $elem->getMessage() ?></li><br/>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<hr/>
		<div>
			<h3>Ajouter un commentaire</h3>	
			<form action="trait_comment.php" method="POST" >
				<label><textarea name="message"/></textarea></label>
				<input type="submit" value="envoyer"/>			
				<input type="hidden" name="id" value="<?=$_GET['id']?>"/>
			</form>	
		</div>

</body>
</html>