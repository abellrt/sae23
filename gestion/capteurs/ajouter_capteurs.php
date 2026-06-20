<?php


session_start();
	$liste_salles = isset($_SESSION['liste_salles']) ? $_SESSION['liste_salles'] : [];if (isset($_POST['ajouter_capteurs'])) {
	$nom_salle = htmlspecialchars($_POST['nom_salle']);
    $nom = htmlspecialchars($_POST['nom_capteur']);
    $type = htmlspecialchars($_POST['type']);
    $unite = htmlspecialchars($_POST['unite']);

    if ($nom_salle != "" && $nom != "" && $type != "" && $unite != "") {
        
        $connexion = mysqli_connect("localhost", "facci", "rt","sae23");
        if (!$connexion) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }
        mysqli_set_charset($connexion, "utf8");

        // Requête préparée avec des ? (syntaxe procédurale)
        $requete = "INSERT INTO capteurs (nom_salle, nom_capteur, type, unite) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connexion, $requete);
        
        if ($stmt) {
            // "sss" signifie qu'on envoie 3 chaînes de caractères (string, string, string)
            mysqli_stmt_bind_param($stmt, "sss", $nom_salle, $nom, $type, $unite);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            $_SESSION['flash_message'] = "Capteur ajouté avec succès !";
        }
        
        mysqli_close($connexion);
        
	if (!isset($_SESSION['liste_capteurs'])) {
            $_SESSION['liste_capteurs'] = [];
        }
        $_SESSION['liste_capteurs'][] = [
            'nom_salle' 	=> $nom_salle,
            'nom_capteur'   => $nom,
            'type_capteur'  => $type,
			'unite'     	=> $unite
		
        ];
        
        $_SESSION['flash_message'] = "capteur ajouté !";
        
        header("Location: ../tableaux_data.php");
        exit();
        header("Location: ../tableaux_data.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un capteur</title>
    <link rel="stylesheet" type="text/css" href="../styles/smi.css" />
   <link rel="stylesheet" type="text/css" href="../styles/tableau.css" />
</head>
<body>

    <main>
        <header>
            <h1>Ajouter un capteur</h1>
            <p><a href="../tableaux_data.php">Retour à la liste</a></p>
        </header>
		
		<!-- form used to add information in the table capteur -->
        <form method="POST" action="ajouter_capteurs.php">
            <p>
                <label for="nom_salle">Choisir la salle :</label><br>
                <select id="nom_salle" name="nom_salle" required>
					<!-- drop-down menu -->
                    <option value="">Sélectionnez une salle</option>
                    <?php if (count($liste_salles) == 0) { ?>
                        <option value="1">Salle par défaut</option>
                    <?php } else { ?>
					    <!-- We get the name of the sensors in the drop-down menu -->
                        <?php foreach ($liste_salles as $index => $salle) { ?>
							<option value="<?php echo htmlspecialchars($salle['nom']); ?>">          
								<?php echo ($index + 1) . " - " . $salle['nom']; ?>
                            </option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </p>
			
            <p>
                <label for="nom_bat">Nom du capteur:</label><br>
                <input type="text" id="nom_capteur" name="nom_capteur" required>
            </p>
            <p>
                <label for="type">Type de capteur :</label><br>
                <input type="text" id="type" name="type" required>
            </p>
            <p>
                <label for="unite">Unité de mesure :</label><br>
                <input type="text" id="unite" name="unite" required>
            </p>
            <button type="submit" name="ajouter_capteurs">Enregistrer en BDD</button>
        </form>
    </main>

</body>
</html> 
