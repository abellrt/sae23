<?php
session_start();

// Deletion processing ---
if (isset($_POST['confirmer_suppression'])) {
    $nom_salle_a_supprimer = $_POST['id_idx']; 
    
    $connexion = mysqli_connect("localhost", "facci", "rt", "sae23");
    if (!$connexion) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
    mysqli_set_charset($connexion, "utf8");

    $requete = "DELETE FROM salles WHERE nom_salle = ?";
    $stmt = mysqli_prepare($connexion, $requete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $nom_salle_a_supprimer);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['flash_message'] = "La salle a été supprimée !";
    }
    mysqli_close($connexion);

    header("Location: ../tableaux_data.php");
    exit(); 
}

// Display of the Confirmation sheet(GET) ---
$nom_salle_get = isset($_GET['id']) ? $_GET['id'] : null;

if ($nom_salle_get === null) {
    header("Location: ../tableaux_data.php");
    exit();
}

$salle_trouvee = ['nom_salle' => $nom_salle_get, 'type' => 'Non défini'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de suppression de la salle</title>
    <link rel="stylesheet" type="text/css" href="../../styles/smi.css" />
    <link rel="stylesheet" type="text/css" href="../../styles/tableau.css" />
</head>
<body>

    <main>
        <header>
        <!-- message to confirm the deletion of a line -->
            <h1>Confirmation de suppression</h1>
            <p><a href="../tableaux_data.php">Retour à la liste</a></p>
        </header>
        <!-- message to confirm the deletion of a line -->
        <section>
            <p>Êtes-vous sûr de vouloir supprimer définitivement cette salle ?</p>
            
            <ul>
                <li><strong>Nom de la salle :</strong> <?php echo htmlspecialchars($salle_trouvee['nom_salle']); ?></li>
                <li><strong>Type de salle :</strong> <?php echo htmlspecialchars($salle_trouvee['type']); ?></li>
            </ul>

            <form method="POST" action="supprimer_salle.php">
                <input type="hidden" name="id_idx" value="<?php echo htmlspecialchars($salle_trouvee['nom_salle']); ?>">
                <p>
                    <button type="submit" name="confirmer_suppression">Confirmer la suppression</button>ou 
                    <a href="../tableaux_data.php">Annuler</a>
                </p>
            </form>
        </section>
    </main>

</body>
</html>
