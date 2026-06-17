<?php
$sommeTemp = 0; 
$compteTemp = 0; 
$maxTemp = 0; 
$minTemp = 99; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E208" && $val['type'] == "temperature") {
        $sommeTemp += $val['valeurs'];
        $compteTemp++;
        
        if ($val['valeurs'] > $maxTemp) { 
            $maxTemp = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minTemp) { 
            $minTemp = $val['valeurs']; 
        }
    }
}

if ($compteTemp > 0) 
    $moyenneTemp = $sommeTemp / $compteTemp;
 else 
    $moyenneTemp = "N/A";


if ($minTemp == 99) 
    $minTemp = "N/A"; 


$sommeHumid = 0; 
$compteHumid = 0; 
$maxHumid = 0; 
$minHumid = 99;

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E208" && $val['type'] == "humidity") {
        $sommeHumid += $val['valeurs'];
        $compteHumid++;
        
        if ($val['valeurs'] > $maxHumid) { 
            $maxHumid = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minHumid) { 
            $minHumid = $val['valeurs']; 
        }
    }
}

if ($compteHumid > 0) 
    $moyenneHumid = $sommeHumid / $compteHumid;
 else 
    $moyenneHumid = "N/A";


if ($minHumid == 99)  
    $minHumid = "N/A"; 



$sommeCO2 = 0; 
$compteCO2 = 0; 
$maxCO2 = 0; 
$minCO2 = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E208" && $val['type'] == "co2") {
        $sommeCO2 += $val['valeurs'];
        $compteCO2++;
        
        if ($val['valeurs'] > $maxCO2) { 
            $maxCO2 = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minCO2) { 
            $minCO2 = $val['valeurs']; 
        }
    }
}

if ($compteCO2 > 0) 
    $moyenneCO2 = $sommeCO2 / $compteCO2;
 else 
    $moyenneCO2 = "N/A";


if ($minCO2 == 9999) 
    $minCO2 = "N/A"; 



$sommePres = 0; 
$comptePres = 0; 
$maxPres = 0; 
$minPres = 9999; 

foreach ($resultat as $val) {
    if ($val['nom_salle'] == "E208" && $val['type'] == "pressure") {
        $sommePres += $val['valeurs'];
        $comptePres++;
        
        if ($val['valeurs'] > $maxPres) { 
            $maxPres = $val['valeurs']; 
        }
        if ($val['valeurs'] < $minPres) { 
            $minPres = $val['valeurs']; 
        }
    }
}

if ($comptePres > 0) 
    $moyennePres = $sommePres / $comptePres;
else 
    $moyennePres = "N/A";


if ($minPres == 9999) 
    $minPres = "N/A";

?>