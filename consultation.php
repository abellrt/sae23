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
	<tr><th>Bâtiments</th> <tr><th>Nom de la Salle</th> <tr><th>Valeur</th> <tr><th>date</th> <tr><th>Heure</th>
	<?php
	include ("choixlignestable.php");
	foreach ($resultat as $val )
	echo "<tr><td>." $val['nom_bât'] ."</td> <td>". $val['nom_salle'] ."</td> <td>". $val['type'] ."</td> <td>". $val['valeurs'] ."</td> <td>". $val['date'] ."</td> <td>". $val['horaire'] ."</td></tr>">;
	?>
	</table>
	</section>
	</body>