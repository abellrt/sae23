<?php
$sommeTempB103 = 0; 
$compteTempB103 = 0; 
$maxTempB103 = 0; 
$minTempB103 = 99; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B103" && $val['type_capteur'] == "temperature") {
        $sommeTempB103 += $val['valeurs'];
        $compteTempB103++;
        
        if ($val['valeurs'] > $maxTempB103) { 
            $maxTempB103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minTempB103) { 
            $minTempB103 = $val['valeurs']; 
        }
    }
}

if ($compteTempB103 > 0) 
    $moyenneTempB103 = $sommeTempB103 / $compteTempB103;
else 
    $moyenneTempB103 = "N/A";


if ($minTempB103 == 99) 
    $minTempB103 = "N/A"; 


$sommeHumidB103 = 0; 
$compteHumidB103 = 0; 
$maxHumidB103 = 0; 
$minHumidB103 = 99;

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B103" && $val['type_capteur'] == "humidity") {
        $sommeHumidB103 += $val['valeurs'];
        $compteHumidB103++;
        
        if ($val['valeurs'] > $maxHumidB103) { 
            $maxHumidB103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minHumidB103) { 
            $minHumidB103 = $val['valeurs']; 
        }
    }
}

if ($compteHumidB103 > 0) 
    $moyenneHumidB103 = $sommeHumidB103 / $compteHumidB103;
else 
    $moyenneHumidB103 = "N/A";


if ($minHumidB103 == 99)  
    $minHumidB103 = "N/A"; 


$sommeCO2B103 = 0; 
$compteCO2B103 = 0; 
$maxCO2B103 = 0; 
$minCO2B103 = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B103" && $val['type_capteur'] == "co2") {
        $sommeCO2B103 += $val['valeurs'];
        $compteCO2B103++;
        
        if ($val['valeurs'] > $maxCO2B103) { 
            $maxCO2B103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minCO2B103) { 
            $minCO2B103 = $val['valeurs']; 
        }
    }
}

if ($compteCO2B103 > 0) 
    $moyenneCO2B103 = $sommeCO2B103 / $compteCO2B103;
else 
    $moyenneCO2B103 = "N/A";


if ($minCO2B103 == 9999) 
    $minCO2B103 = "N/A"; 


$sommePresB103 = 0; 
$comptePresB103 = 0; 
$maxPresB103 = 0; 
$minPresB103 = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B103" && $val['type_capteur'] == "pressure") {
        $sommePresB103 += $val['valeurs'];
        $comptePresB103++;
        
        if ($val['valeurs'] > $maxPresB103) { 
            $maxPresB103 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minPresB103) { 
            $minPresB103 = $val['valeurs']; 
        }
    }
}

if ($comptePresB103 > 0) 
    $moyennePresB103 = $sommePresB103 / $comptePresB103;
else 
    $moyennePresB103 = "N/A";


if ($minPresB103 == 9999) 
    $minPresB103 = "N/A";
?>