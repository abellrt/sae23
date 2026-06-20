<?php
	// Start of the session
	session_start();
?>
<!-- web page to be displayed if there is a problem logging in -->
<!DOCTYPE html>
<html lang="fr">
	<head>
	   <meta charset="UTF-8" />
	   <title>Identification erron&eacute;e</title>
	   <link rel="stylesheet" type="text/css" href="./styles/smi.css" />
	 </head>

	<body>
		<!-- Header display and erase session -->
		<?php 
			$_SESSION = array(); 
			session_destroy();   
			unset($_SESSION);    
			include("entete.html");
		?>
		<section>
			<p>
				<br />
				<em><strong>Administration de la base : Acc&egrave;s limit&eacute; aux personnes autoris&eacute;es</strong></em>
				<br />
			</p>
			<br />
			<p class="erreur">Mot de passe non saisi ou erron&eacute; !!!</p>
			<br />
			<hr />
		</section>
		<footer>
			<p><a href="index.html">Retour a l'accueil </a></p>
		</footer>
	</body>
</html>
