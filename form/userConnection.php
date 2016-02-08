<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<fieldset>
		<legend>Connexion</legend>
		<form action="trait_userConnect.php" method="POST" >
			<label> Pseudo :  
				<input type="text" name="username" value=""/>
			</label>
			<label> Mot de passe :  
				<input type="password" name="password" value=""/>
			</label>
			<input type="submit" value="se connecter"/>
		</form>
	<a href="logout.php">Détruire la session</a>
	</fieldset>
</body>
</html>