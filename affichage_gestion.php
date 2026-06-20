<!DOCTYPE html>
<html lang="fr">
<!-- Web page displaying the gestion of building-->
 <head>
   <meta charset="UTF-8" />
   <title>Sae23</title>
   <link rel="stylesheet" type="text/css" href="./styles/smi.css" />
   <link rel="stylesheet" type="text/css" href="./styles/tableau.css" />
 </head>
 <body>
   <header>
        <section><h1><br />Affiche gestion bâtiments<br /><br /></h1></section>
    </header>
    <section>
    <?php
    // Calling the script to connect to the database
    include ("mysql.php");
    ?>
    <!-- Data display board -->
    <table class="tableau-responsive">
    <caption>Tableau des données du Bâtiment</caption>
    <tr><th>Bâtiments</th> <th>Nom de la Salle</th> <th>Type du Capteurs</th> <th>Valeur</th> <th>date</th> <th>Heure</th></tr>
    <?php
    include ("choixgestion.php");
    foreach ($resultat as $val) {
        echo "<tr><td>". $val['nom_bât'] ."</td> <td>". $val['nom_salle'] ."</td> <td>". $val['type_capteur'] ."</td> <td>". $val['valeurs'] ."</td> <td>". $val['date'] ."</td> <td>".$val['horaire']."</td></tr>";
    }
    ?>
    </table>
    </section>

    <?php 
    // Calling the script to calculation
    include ("calcul_bat.php"); 
    foreach (array_keys($moyenneTemp) as $salle) { 
    ?>
        <section>
            <h2>Salle <?php echo $salle; ?></h2>
            <?php
            //Displays the average, minimum and maximum values for temperature, humidity, CO₂ and pressure
            echo "La moyenne de la température pour la salle $salle est $moyenneTemp[$salle] °C <br>";
            echo "Le minimum de la température pour la salle $salle est $minTemp[$salle] °C <br>";
            echo "Le maximum de la température pour la salle $salle est $maxTemp[$salle] °C <br>";
            echo "<br>";
            echo "La moyenne de l'humidité pour la salle $salle est $moyenneHumid[$salle] % <br>";
            echo "Le minimum de l'humidité pour la salle $salle est $minHumid[$salle] % <br>";
            echo "Le maximum de l'humidité pour la salle $salle est $maxHumid[$salle] % <br>";
            echo "<br>";
            echo "La moyenne du CO2 pour la salle $salle est $moyenneCO2[$salle] ppm <br>";
            echo "Le minimum du CO2 pour la salle $salle est $minCO2[$salle] ppm <br>";
            echo "Le maximum du CO2 pour la salle $salle est $maxCO2[$salle] ppm <br>";
            echo "<br>";
            echo "La moyenne de la pression pour la salle $salle est $moyennePres[$salle] hPa <br />";
            echo "Le minimum de la pression pour la salle $salle est $minPres[$salle] hPa <br>";
            echo "Le maximum de la pression pour la salle $salle est $maxPres[$salle] hPa <br>";
            ?>
    
        </section>
<?php 
}
?>
        </body>
</html>
