<?php

session_start();

// Recovery of bâtiment list for the drop-down menu
$connexion_init = mysqli_connect("localhost", "facci", "rt", "sae23");
mysqli_set_charset($connexion_init, "utf8");
$resultat_bat = mysqli_query($connexion_init, "SELECT * FROM bâtiments");
$liste_batiments = mysqli_fetch_all($resultat_bat, MYSQLI_ASSOC);
mysqli_close($connexion_init);

if (isset($_POST['ajouter_salle'])) {
    // Data recovery from the form
    $id_bat   = htmlspecialchars($_POST['id_bat']);
    $nom      = htmlspecialchars($_POST['nom_salle']);
    $type     = htmlspecialchars($_POST['type']);
    $capacite = htmlspecialchars($_POST['capacite']);

    if ($id_bat != "" && $nom != "" && $type != "" && $capacite != "") {
        
        $connexion = mysqli_connect("localhost", "facci", "rt","sae23");
        if (!$connexion) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }
        mysqli_set_charset($connexion, "utf8");

        // Requête préparée avec des ? 
        $requete = "INSERT INTO salles (ID_bât, nom_salle, type, capacite_accueil) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connexion, $requete);
        
        if ($stmt) {
            // "sss" signifie qu'on envoie 3 chaînes de caractères (string, string, string)
            mysqli_stmt_bind_param($stmt, "isss", $id_bat, $nom, $type, $capacite);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            $_SESSION['flash_message'] = "Salle ajoutée avec succès !";
        }
        
        mysqli_close($connexion);
        
        if (!isset($_SESSION['liste_salles'])) {
            $_SESSION['liste_salles'] = [];
        }
        
        $_SESSION['liste_salles'][] = [
            'id_bât'   => $id_bat,
            'nom_salle'      => $nom,
            'type'     => $type,
            'capacite_accueil' => $capacite
        ];
        
        $_SESSION['flash_message'] = "Salle ajoutée avec succès !";
        
        header("Location: ../tableaux_data.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une salle</title>
    <link rel="stylesheet" type="text/css" href="../../styles/smi.css" />
   <link rel="stylesheet" type="text/css" href="../../styles/tableau.css" />
</head>
<body>

    <main>
        <header>
            <h1>Ajouter une nouvelle salle</h1>
            <p><a href="../tableaux_data.php">Retour à la liste</a></p>
        </header>
		<!-- form used to add a room in function of the building in the drop-down menu -->
        <form method="POST" action="ajouter_salle.php">
            <p>
                <label for="id_bat">Choisir le bâtiment :</label><br>
                <select id="id_bat" name="id_bat" required>
					<!-- drop-down menu -->
                    <option value="">Sélectionnez un bâtiment</option>
                    <?php if (count($liste_batiments) == 0) { ?>
                        <option value="1">Bâtiment par défaut</option>
                    <?php } else { ?>
					    <!-- We get the name of the buildings in the drop-down menu -->
                        <?php foreach ($liste_batiments as $index => $bat) { ?>
                            <option value="<?php echo $bat['ID_bât']; ?>">
                                <?php echo $bat['ID_bât'] . " - " . $bat['nom_bât']; ?>
                            </option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </p>

            <p>
                <label for="nom_salle">Nom de la salle :</label><br>
                <input type="text" id="nom_salle" name="nom_salle" required>
            </p>
            <p>
                <label for="type">Type de salle :</label><br>
                <input type="text" id="type" name="type" required>
            </p>
            <p>
                <label for="capacite">Capacité (places) :</label><br>
                <input type="number" id="capacite" name="capacite" required>
            </p>
            <button type="submit" name="ajouter_salle">Enregistrer la salle</button>
        </form>
    </main>

</body>
</html>
