<!DOCTYPE html>
 <html lang="fr">
  <head>
   <meta charset="UTF-8" />
   <title>Sae23</title>
   <link rel="stylesheet" type="text/css" href="./styles/smi.css" />
  </head>
  <body>
   <header>
		<div><h1><br />Affiche gestion bâtiments E<br /><br /></h1></div>
	</header>
	<section>
	<?php
	include ("mysql.php");
	?>
	<table>
	<tr><th>Bâtiments</th> <th>Nom de la Salle</th> <th>Type du Capteurs</th> <th>Valeurs</th> <th>date</th> <th>Heure</th></tr>
	<?php
	include ("choixlignestableE.php");
	foreach ($resultat as $val )
	echo "<tr><td>". $val['nom_bât'] ."</td> <td>". $val['nom_salle'] ."</td> <td>". $val['type_capteur'] ."</td> <td>". $val['valeurs'] ."</td> <td>". $val['date'] ."</td> <td>".$val['horaire']."</td></tr>";
	?>
	</table>
	</section>
	<section>
	<h2>SalleE208</h2>
	<?php
	include ("calculE208.php");
	echo "La moyenne de la température pour la salle E208 est $moyenneTemp °C <br />";
	echo "Le minimum de la température pour la salle E208 est $minTemp °C <br />";
	echo "Le maximum de la température pour la salle E208 est $maxTemp °C <br />";

	echo "La moyenne de l'humidité pour la salle E208 est $moyenneHumid % <br />";
	echo "Le minimum de l'humidité pour la salle E208 est $minHumid % <br />";
	echo "Le maximum de l'humidité pour la salle E208 est $maxHumid % <br />";

	echo "La moyenne du CO2 pour la salle E208 est $moyenneCO2 ppm <br />";
	echo "Le minimum du CO2 pour la salle E208 est $minCO2 ppm <br />";
	echo "Le maximum du CO2 pour la salle E208 est $maxCO2 ppm <br />";

	echo "La moyenne de la pression pour la salle E208 est $moyennePres hPa <br />";
	echo "Le minimum de la pression pour la salle E208 est $minPres hPa <br />";
	echo "Le maximum de la pression pour la salle E208 est $maxPres hPa <br />";
	
	?>
	</section>
	<section>
	<h2>SalleE103</h2>
	<?php
		include ("calculE103.php");

		echo "La moyenne de la température pour la salle E103 est $moyenneTempE103 °C <br />";
		echo "Le minimum de la température pour la salle E103 est $minTempE103 °C <br />";
		echo "Le maximum de la température pour la salle E103 est $maxTempE103 °C <br />";

		echo "La moyenne de l'humidité pour la salle E103 est $moyenneHumidE103 % <br />";
		echo "Le minimum de l'humidité pour la salle E103 est $minHumidE103 % <br />";
		echo "Le maximum de l'humidité pour la salle E103 est $maxHumidE103 % <br />";

		echo "La moyenne du CO2 pour la salle E103 est $moyenneCO2E103 ppm <br />";
		echo "Le minimum du CO2 pour la salle E103 est $minCO2E103 ppm <br />";
		echo "Le maximum du CO2 pour la salle E103 est $maxCO2E103 ppm <br />";

		echo "La moyenne de la pression pour la salle E103 est $moyennePresE103 hPa <br />";
		echo "Le minimum de la pression pour la salle E103 est $minPresE103 hPa <br />";
		echo "Le maximum de la pression pour la salle E103 est $maxPresE103 hPa <br />";
	?>
	</section>
	</body>