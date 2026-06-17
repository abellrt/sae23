<!DOCTYPE html>
 <html lang="fr">
  <head>
   <meta charset="UTF-8" />
   <title>Sae23</title>
   <link rel="stylesheet" type="text/css" href="./styles/smi.css" />
  </head>
  <body>
   <header>
		<div><h1><br />Affiche gestion bâtiments B<br /><br /></h1></div>
	</header>
	<section>
	<?php
	include ("mysql.php");
	?>
	<table>
	<tr><th>Bâtiments</tr></th> <tr><th>Nom de la Salle</tr></th> <tr><th>Valeur</tr></th> <tr><th>date</tr></th> <tr><th>Heure</tr></th>
	<?php
	include ("choixlignestableE.php");
	foreach ($resultat as $val )
	echo "<tr><td>. $val['nom_bât'] .</td> <td>. $val['nom_salle'] .</td> <td>. $val['valeurs'] .</td> <td>. $val['date'] .</td> <td>$horaire</td></tr>">;
	?>
	</table>
	</section>
	<section>
	<h2>SalleB103</h2>
	<?php
include ("calculB103.php");

echo "La moyenne de la température pour la salle B103 est $moyenneTempB103 °C <br />";
echo "Le minimum de la température pour la salle B103 est $minTempB103 °C <br />";
echo "Le maximum de la température pour la salle B103 est $maxTempB103 °C <br />";

echo "La moyenne de l'humidité pour la salle B103 est $moyenneHumidB103 % <br />";
echo "Le minimum de l'humidité pour la salle B103 est $minHumidB103 % <br />";
echo "Le maximum de l'humidité pour la salle B103 est $maxHumidB103 % <br />";

echo "La moyenne du CO2 pour la salle B103 est $moyenneCO2B103 ppm <br />";
echo "Le minimum du CO2 pour la salle B103 est $minCO2B103 ppm <br />";
echo "Le maximum du CO2 pour la salle B103 est $maxCO2B103 ppm <br />";

echo "La moyenne de la pression pour la salle B103 est $moyennePresB103 hPa <br />";
echo "Le minimum de la pression pour la salle B103 est $minPresB103 hPa <br />";
echo "Le maximum de la pression pour la salle B103 est $maxPresB103 hPa <br />";
?>
</section>

<h2>Salle B201</h2>
<section>
<?php
include ("calculB201.php");

echo "La moyenne de la température pour la salle B201 est $moyenneTempB201 °C <br />";
echo "Le minimum de la température pour la salle B201 est $minTempB201 °C <br />";
echo "Le maximum de la température pour la salle B201 est $maxTempB201 °C <br />";

echo "La moyenne de l'humidité pour la salle B201 est $moyenneHumidB201 % <br />";
echo "Le minimum de l'humidité pour la salle B201 est $minHumidB201 % <br />";
echo "Le maximum de l'humidité pour la salle B201 est $maxHumidB201 % <br />";

echo "La moyenne du CO2 pour la salle B201 est $moyenneCO2B201 ppm <br />";
echo "Le minimum du CO2 pour la salle B201 est $minCO2B201 ppm <br />";
echo "Le maximum du CO2 pour la salle B201 est $maxCO2B201 ppm <br />";

echo "La moyenne de la pression pour la salle B201 est $moyennePresB201 hPa <br />";
echo "Le minimum de la pression pour la salle B201 est $minPresB201 hPa <br />";
echo "Le maximum de la pression pour la salle B201 est $maxPresB201 hPa <br />";
?>
</section>
	</section>
	</body>