<?php
$requete = "SELECT 
            b.nom_bât, 
            s.nom_salle, 
			c.type_capteur,
            m.valeurs, 
            m.date, 
            m.horaire
        FROM mesures m
        INNER JOIN capteurs c ON m.nom_capteur = c.nom_capteur
        INNER JOIN salles s ON c.nom_salle = s.nom_salle
        INNER JOIN bâtiments b ON s.ID_bât = b.ID_bât
		WHERE b.nom_bât = 'E'
        ORDER BY m.id DESC";
			$resultat = mysqli_query($id_bd, $requete)
					or die("Execution de la requete impossible : $requete");
				mysqli_close($id_bd);
?>