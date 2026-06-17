<?php 
	session_start(); 
	if ($_SESSION["auth"]!=TRUE)
		header("Location:login_error.php");
?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Choix entre ajout ou suppression de données</title>
		<link rel="stylesheet" type="text/css" href="./styles/smi.css" />
	</head>

	<body>
<?php 
			include("entete.html"); 
		?>
		<section>
            <p><a href="choix_type.php">Ajoutez d'une données</a></p>
			<p><a href="choix_type2.php">Supprission d'une données</a></p>
             <p><a href="modif.php">Modifiez d'une données</a></p>   
			<p><a href="index.html">Retour à l'accueil</a></p>
		</section>
	</body>
</html>
