<!DOCTYPE html>
<!-- Web page displaying the consultation-->
 <html lang="fr">
  <head>
   <meta charset="UTF-8" />
   <title>Sae23</title>
   <link rel="stylesheet" type="text/css" href="./styles/smi.css" />
   <link rel="stylesheet" type="text/css" href="./styles/tableau.css" />
  </head>
  <body>
   <header>
		<section><h1><br />Consultation<br /><br /></h1></section>
	</header>
	<section>
	<?php
	// Calling the script to connect to the database
	include ("mysql.php");
	?>
	<!-- Data display board -->
	<table class="tableau-responsive">
	 <caption>Tableau des données des Bâtiments</caption>
	<tr><th>Bâtiments</th> <th>Nom de la Salle</th> <th>Type du Capteurs</th> <th>Valeur</th> <th>date</th> <th>Heure</th> </tr>
	<?php
	include ("choixlignestable.php");
	foreach ($resultat as $val )
	echo "<tr><td>". $val['nom_bât'] ."</td> <td>". $val['nom_salle'] ."</td> <td>". $val['type_capteur'] ."</td> <td>". $val['valeurs'] ."</td> <td>". $val['date'] ."</td> <td>". $val['horaire'] ."</td></tr>";
	?>
	</table>
	</section>
	</body>
