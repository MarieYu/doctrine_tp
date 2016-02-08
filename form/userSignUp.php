<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<fieldset>
		<legend>Formulaire d'inscription nouvel utilisateur</legend>
		<form action="trait_userSignUp.php" method="POST" >
			<label> Pseudo :  
				<input type="text" name="username" value="">
			</label>
			<label> Prénom : 
				<input type="text" name="firstname" value="">
			</label>
			<label> Nom : 
				<input type="text" name="lastname" value="">
			</label>
			<label> Date de naissance :  
				<input type="date" name="birthDate" value="">
			</label>
			<label> Email : 
				<input type="text" name="email" value="">
			</label>
			<label> Mot de passe : 
				<input type="password" name="password" value="">
			</label>
			<label> Description : 
				<textarea name="description" value=""></textarea>
			</label>
			<input type="submit" value="valider">
		</form>
	</fieldset>
</body>
</html>