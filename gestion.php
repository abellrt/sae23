<?php
	//We start the session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Gestion Batiments</title>
		<link rel="stylesheet" type="text/css" href="./styles/smi.css" />
	</head>

	<body>
		<!-- Header display -->
		<?php 
			include("entete.html"); 
		?>
		<section>
		<!-- Access form to enable managers to access their buildings. -->
			<p>
				<br />
				<em><strong>Accès Gestion des Bâtiments</strong></em>
				<br />
			</p>
			<form action="login2.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Saissez le nom d'utilisateur</legend>
					<label for="login2">utilisateur : </label>
					<input type="text" name="login" id="login" /> </br>
					<label for="mot_de_passe">Mot de passe : </label>
					<input type="password" name="mot_de_passe" id="mot_de_passe" />
				</fieldset>
				<p>
					<input type="submit" value="Valider" />
				</p>
			</form>
			<hr />
		</section>
		<footer>
		<!-- Back to the home page -->
			<p><a href="index.html">Retour à l'accueil</a></p>
		</footer>
	</body>
</html>
