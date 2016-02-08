<?php
//session_start();
require_once('before.php');
	//on a accès à la variable $user de partout grâce qu fichier before.php dans lequel on récupère l'ob
//var_dump($user);

//filtre en GET pour récupérer les Posts ayant un sujet donné:
if(isset($_GET['search'])){
	$titre = 'recherchés';
	$sub=htmlentities($_GET['search']);
	$posts = $entityManager->getRepository('Entity\Post')->searchPost($sub);
	//$search = $entityManager->createQuery("SELECT post FROM 'Entity\Post' post WHERE post.subject LIKE '%".$sub."%' ORDER BY post.date DESC");
	//$results = $search->getResult();
	//var_dump($results);

}
else{
	$titre = '(tous)';
	//afficher les messages par ordre décroissant 
	$posts = $entityManager->getRepository('Entity\Post')->findBy(array(), array('date' => 'DESC'));
	//var_dump($posts);
}

if(isset($_GET['id'])){
	$modifPost = $entityManager->getRepository('Entity\Post')->find($_GET['id']);
}
//affichage conditionnel selon connexion utilisateur ou non:
if($user){
	$name = $user->getFirstname();
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<div>
		<h1>POSTS</h1>
		<?php if ($user): ?>
			<div>
				Bonjour <?= $name ?> !
				<a href="logout.php">Déconnexion</a>			
			<?php else:?>
				<a href="userSignUp.php">S'inscrire pour poster des messages</a><br/>
				<a href="userConnection.php">Connexion</a>
			</div>
		<?php endif; ?>
		<hr/>
		<form action="trait_post.php" method="POST" >
			<?php if (isset($modifPost)) : ?>
				<h2>Modifier ce post</h2>
			<?php endif; ?>
			<label>Sujet  <input type="text" name="subject" value="<?= isset($modifPost) ? $modifPost->getSubject() : '' ?>"/></label><br/>
			<label>Message<br/>
				<textarea name="message" ><?= isset($modifPost) ? $modifPost->getMessage() : '' ?></textarea></label>
			<input type="submit" value="<?= isset($modifPost) ? 'Mettre à jour' : 'Envoyer' ?>"/>
			<input type="hidden" name="id" value="<?= isset($modifPost) ? $modifPost->getId() : -1 ?>" > <!--id=-1 par défaut -->
			
		</form>
	</div>
	<br/>
	<div>
		<?php if (isset($posts)): ?>	
				<h2>Liste des posts <?= $titre ?></h2>	
				
				<form action="post.php" method="GET">
					<input type="text" name="search" placeholder="Rechercher">
					<input type="submit" value="rechercher">
				</form>
				<hr/>

					<?php if ($titre == 'recherchés' ): ?>
						<a href="post.php" >retour à la liste des posts</a>
					<?php endif; ?>
				<table>
					<thead>
						<tr>
							<th>Date</th>
							<!-- <th>Auteur</th> -->
							<th>Sujet</th>
							<th>Message</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($posts as $elem): ?>

						<tr>
							<td><?= $elem->getDate() ?></td>
							<td><?= $elem->getId() ?></td>
							<!-- <td><?= $elem->getAuthor() ?></td> -->
							<td><?= $elem->getMessage() ?></td>
							<td>
								<a href="comment.php?id=<?= $elem->getId() ?>"><i class="fa fa-eye"></i></a>
								<a href="post.php?id=<?= $elem->getId() ?>"><i class="fa fa-pencil"></i></a>
								<!-- <a href="post.php?id=<?= $elem->getId() ?>&act=suppr"><i class="fa fa-trash"></i></a> -->
								<input type="hidden" name="id" />
							</td>
							
						</tr>
					<?php endforeach; ?>
					</tbody>
		<?php endif; ?>
	</div>


</body>
</html>