<?php
$req_capteurs = "SELECT DISTINCT c.nom_capteur, c.type_capteur, s.nom_salle 
                 FROM capteurs c
                 INNER JOIN salles s ON c.nom_salle = s.nom_salle
                 INNER JOIN bâtiments b ON s.ID_bât = b.ID_bât
                 WHERE b.nom_bât = '$batiment_gestionnaire'
                 ORDER BY s.nom_salle ASC, c.type_capteur ASC";
                 $res_capteurs = mysqli_query($id_bd, $req_capteurs);
                 mysqli_close($id_bd);
?>