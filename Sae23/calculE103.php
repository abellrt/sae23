<?php
$sommeTempE103 = 0; 
$compteTempE103 = 0; 
$maxTempE103 = 0; 
$minTempE103 = 99; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E103" && $val['type_capteur'] == "temperature") {
        $sommeTempE103 += $val['valeurs'];
        $compteTempE103++;
        
        if ($val['valeurs'] > $maxTempE103) { 
            $maxTempE103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minTempE103) { 
            $minTempE103 = $val['valeurs']; 
        }
    }
}

if ($compteTempE103 > 0) 
    $moyenneTempE103 = $sommeTempE103 / $compteTempE103;
else 
    $moyenneTempE103 = "N/A";


if ($minTempE103 == 99) 
    $minTempE103 = "N/A"; 


$sommeHumidE103 = 0; 
$compteHumidE103 = 0; 
$maxHumidE103 = 0; 
$minHumidE103 = 99;

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E103" && $val['type_capteur'] == "humidity") {
        $sommeHumidE103 += $val['valeurs'];
        $compteHumidE103++;
        
        if ($val['valeurs'] > $maxHumidE103) { 
            $maxHumidE103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minHumidE103) { 
            $minHumidE103 = $val['valeurs']; 
        }
    }
}

if ($compteHumidE103 > 0) 
    $moyenneHumidE103 = $sommeHumidE103 / $compteHumidE103;
else 
    $moyenneHumidE103 = "N/A";


if ($minHumidE103 == 99)  
    $minHumidE103 = "N/A"; 


$sommeCO2E103 = 0; 
$compteCO2E103 = 0; 
$maxCO2E103 = 0; 
$minCO2E103 = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E103" && $val['type_capteur'] == "co2") {
        $sommeCO2E103 += $val['valeurs'];
        $compteCO2E103++;
        
        if ($val['valeurs'] > $maxCO2E103) { 
            $maxCO2E103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minCO2E103) { 
            $minCO2E103 = $val['valeurs']; 
        }
    }
}

if ($compteCO2E103 > 0) 
    $moyenneCO2E103 = $sommeCO2E103 / $compteCO2E103;
else 
    $moyenneCO2E103 = "N/A";


if ($minCO2E103 == 9999) 
    $minCO2E103 = "N/A"; 


$sommePresE103 = 0; 
$comptePresE103 = 0; 
$maxPresE103 = 0; 
$minPresE103 = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E103" && $val['type_capteur'] == "pressure") {
        $sommePresE103 += $val['valeurs'];
        $comptePresE103++;
        
        if ($val['valeurs'] > $maxPresE103) { 
            $maxPresE103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minPresE103) { 
            $minPresE103 = $val['valeurs']; 
        }
    }
}

if ($comptePresE103 > 0) 
    $moyennePresE103 = $sommePresE103 / $comptePresE103;
else 
    $moyennePresE103 = "N/A";


if ($minPresE103 == 9999) 
    $minPresE103 = "N/A";
?>