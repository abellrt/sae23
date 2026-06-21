<?php


session_start();

// Deletion processiong ---
if (isset($_POST['confirmer_suppression'])) {
    $nom_capteur_a_supprimer = $_POST['id_idx']; 
    
    $connexion = mysqli_connect("localhost", "facci", "rt", "sae23");
    if (!$connexion) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
    mysqli_set_charset($connexion, "utf8");

    $requete = "DELETE FROM capteurs WHERE nom_capteur = ?";
    $stmt = mysqli_prepare($connexion, $requete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $nom_capteur_a_supprimer);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['flash_message'] = "Le capteur a été supprimé !";
    }
    mysqli_close($connexion);

    header("Location: ../tableaux_data.php");
    exit(); 
}

// Display of the Confirmation sheet(GET) ---
$nom_capteur_get = isset($_GET['id']) ? $_GET['id'] : null;

if ($nom_capteur_get === null) {
    header("Location: ../tableaux_data.php");
    exit();
}

$user = ['nom_capteur' => $nom_capteur_get, 'type_capteur' => 'Inconnu'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de suppression</title>
    <link rel="stylesheet" type="text/css" href="../../styles/smi.css" />
   <link rel="stylesheet" type="text/css" href="../../styles/tableau.css" />
</head>
<body>

    <main>
        <header>
            <h1>Confirmation de suppression</h1>
            <p><a href="../tableaux_data.php">Retour à la liste</a></p>
        </header>
        <!-- message to confirm the deletion of a line -->
        <section>
            <p>Êtes-vous sûr de vouloir supprimer définitivement ce capteur ?</p>
            
            <ul>
                <li><strong>Nom du capteur :</strong> <?php echo isset($user['nom_capteur']) ? htmlspecialchars($user['nom_capteur']) : 'Inconnu' ; ?></li>
                <li><strong>Type de capteur :</strong> <?php echo isset($user['type_capteur']) ? htmlspecialchars($user['type_capteur']) : 'Inconnu' ; ?></li>
            </ul>

            <form method="POST" action="supprimer_capteurs.php">
                <input type="hidden" name="id_idx" value="<?php echo htmlspecialchars($user['nom_capteur']); ?>">
                
                <p>
                    <button type="submit" name="confirmer_suppression">Confirmer la suppression</button>ou 
                    <a href="../tableaux_data.php">Annuler</a>
                </p>
            </form>
        </section>
    </main>

</body>
</html>
