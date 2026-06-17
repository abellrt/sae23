<?php
$sommeTempB201 = 0; 
$compteTempB201 = 0; 
$maxTempB201 = 0; 
$minTempB201 = 99; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B201" && $val['type'] == "temperature") {
        $sommeTempB201 += $val['valeurs'];
        $compteTempB201++;
        
        if ($val['valeurs'] > $maxTempB201) { 
            $maxTempB201 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minTempB201) { 
            $minTempB201 = $val['valeurs']; 
        }
    }
}

if ($compteTempB201 > 0) 
    $moyenneTempB201 = $sommeTempB201 / $compteTempB201;
else 
    $moyenneTempB201 = "N/A";


if ($minTempB201 == 99) 
    $minTempB201 = "N/A"; 


$sommeHumidB201 = 0; 
$compteHumidB201 = 0; 
$maxHumidB201 = 0; 
$minHumidB201 = 99;

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B201" && $val['type'] == "humidity") {
        $sommeHumidB201 += $val['valeurs'];
        $compteHumidB201++;
        
        if ($val['valeurs'] > $maxHumidB201) { 
            $maxHumidB201 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minHumidB201) { 
            $minHumidB201 = $val['valeurs']; 
        }
    }
}

if ($compteHumidB201 > 0) 
    $moyenneHumidB201 = $sommeHumidB201 / $compteHumidB201;
else 
    $moyenneHumidB201 = "N/A";


if ($minHumidB201 == 99)  
    $minHumidB201 = "N/A"; 


$sommeCO2B201 = 0; 
$compteCO2B201 = 0; 
$maxCO2B201 = 0; 
$minCO2B201 = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B201" && $val['type'] == "co2") {
        $sommeCO2B201 += $val['valeurs'];
        $compteCO2B201++;
        
        if ($val['valeurs'] > $maxCO2B201) { 
            $maxCO2B201 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minCO2B201) { 
            $minCO2B201 = $val['valeurs']; 
        }
    }
}

if ($compteCO2B201 > 0) 
    $moyenneCO2B201 = $sommeCO2B201 / $compteCO2B201;
else 
    $moyenneCO2B201 = "N/A";


if ($minCO2B201 == 9999) 
    $minCO2B201 = "N/A"; 


$sommePresB201 = 0; 
$comptePresB201 = 0; 
$maxPresB201 = 0; 
$minPresB201 = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "B201" && $val['type'] == "pressure") {
        $sommePresB201 += $val['valeurs'];
        $comptePresB201++;
        
        if ($val['valeurs'] > $maxPresB201) { 
            $maxPresB201 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minPresB201) { 
            $minPresB201 = $val['valeurs']; 
        }
    }
}

if ($comptePresB201 > 0) 
    $moyennePresB201 = $sommePresB201 / $comptePresB201;
else 
    $moyennePresB201 = "N/A";


if ($minPresB201 == 9999) 
    $minPresB201 = "N/A";
?>