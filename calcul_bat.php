<?php

foreach ($resultat as $val) {
    $salle=$val['nom_salle'];

    if ($val['type_capteur'] =="temperature"){
        if (!isset($minTemp[$salle])) {
            $minTemp[$salle] = 99;
            $maxTemp[$salle] = 0;
            $sommeTemp[$salle] = 0;
            $compteTemp[$salle] = 0;
        }
    $sommeTemp[$salle] += $val['valeurs'];
    $compteTemp[$salle]++;
    $moyenneTemp[$salle]=$sommeTemp[$salle]/$compteTemp[$salle];
    if ($maxTemp[$salle] < $val['valeurs']){
        $maxTemp[$salle] = $val['valeurs'];
    }
    if ($minTemp[$salle] > $val['valeurs']){
        $minTemp[$salle] = $val['valeurs'];
    }
    }

    if ($val['type_capteur'] == "humidity") {
        if (!isset($minHumid[$salle])) {
            $minHumid[$salle] = 100; // Le max théorique de l'humidité est 100%
            $maxHumid[$salle] = 0;
            $sommeHumid[$salle] = 0;
            $compteHumid[$salle] = 0;
        }
        $sommeHumid[$salle] += $val['valeurs'];
        $compteHumid[$salle]++;
        $moyenneHumid[$salle] = $sommeHumid[$salle] / $compteHumid[$salle];

        if ($maxHumid[$salle] < $val['valeurs']) {
            $maxHumid[$salle] = $val['valeurs'];
        }
        if ($minHumid[$salle] > $val['valeurs']) {
            $minHumid[$salle] = $val['valeurs'];
        }
    }

    if ($val['type_capteur'] == "co2") {
        if (!isset($minCO2[$salle])) {
            $minCO2[$salle] = 5000; // On met une valeur par défaut très haute pour le CO2
            $maxCO2[$salle] = 0;
            $sommeCO2[$salle] = 0;
            $compteCO2[$salle] = 0;
        }
        $sommeCO2[$salle] += $val['valeurs'];
        $compteCO2[$salle]++;
        $moyenneCO2[$salle] = $sommeCO2[$salle] / $compteCO2[$salle];

        if ($maxCO2[$salle] < $val['valeurs']) {
            $maxCO2[$salle] = $val['valeurs'];
        }
        if ($minCO2[$salle] > $val['valeurs']) {
            $minCO2[$salle] = $val['valeurs'];
        }
    }

    if ($val['type_capteur'] == "pressure") {
        if (!isset($minPres[$salle])) {
            $minPres[$salle] = 2000; // On met une valeur par défaut très haute pour la pression hPa
            $maxPres[$salle] = 0;
            $sommePres[$salle] = 0;
            $comptePres[$salle] = 0;
        }
        $sommePres[$salle] += $val['valeurs'];
        $comptePres[$salle]++;
        $moyennePres[$salle] = $sommePres[$salle] / $comptePres[$salle];

        if ($maxPres[$salle] < $val['valeurs']) {
            $maxPres[$salle] = $val['valeurs'];
        }
        if ($minPres[$salle] > $val['valeurs']) {
            $minPres[$salle] = $val['valeurs'];
        }
    }
}
?>