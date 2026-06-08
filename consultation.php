<!DOCTYPE html>
 <html lang="fr">
  <head>
   <meta charset="UTF-8" />
   <title>Sae23</title>
   <link rel="stylesheet" type="text/css" href="./styles/smi.css" />
  </head>
  <body>
   <header>
		<div><h1><br />Consultation<br /><br /></h1></div>
	</header>
	<section>
	<?php
	include ("mysql.php");
	?>
	<table>
	<tr><th>Bâtiments</tr></th> <tr><th>Nom de la Salle</tr></th> <tr><th>Valeur</tr></th> <tr><th>date</tr></th> <tr><th>Heure</tr></th>
	<?php
	$requete = "SELECT * FROM `mesures`";
	$resultat = mysqli_query($id_bd, $requete)
					or die("Execution de la requete impossible : $requete");
				mysqli_close($id_bd);
	foreach ($mesures as $mesures )
	echo "<tr><td>$nom_bât</td> <td>$nom_salle</td> <td>$valeurs</td> <td>$date</td> <td>$horaire</td></tr>">;
	?>
	</table>
	</section>
	</body>