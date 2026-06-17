<?php
	// Démarrage de la session
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Choix gestion</title>
		<link rel="stylesheet" type="text/css" href="./styles/smi.css" />
	</head>

	<body>
		<!-- Affichage entete -->
		<?php 
			include("entete.html"); 
		?>
		<section>
			<p>
				<br />
				<em><strong>choix du batiments : Acc&egrave;s limit&eacute; aux personnes autoris&eacute;es</strong></em>
				<br />
			</p>
			<ul>
			<li><a href="gestionbatB.php">Acc&egrave;s bâtiments B</a> </li>
			<li><a href="gestionbatE.php">Acc&egrave;s bâtiments E</a></li>
			</ul>
			<hr />
		</section>
		<footer>
			<p><a href="index.html">Retour à l'accueil</a></p>
		</footer>
	</body>
</html>