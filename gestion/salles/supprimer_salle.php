<?php
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') { //secure the website with 4433 port congigured on XAMPP
    header("Location: https://" . $_SERVER['HTTP_HOST'] . ":4433" . $_SERVER['REQUEST_URI']);
    exit();
}

session_start();

// Processing the deletion
if (isset($_POST['confirmer_suppression'])) {
    $id_a_supprimer = $_POST['id_idx'];
	
	$connexion = mysqli_connect("localhost", "facci", "rt","sae23");
    if (!$connexion) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
    mysqli_set_charset($connexion, "utf8");

    $requete = "DELETE FROM salles WHERE id_salle = ?";
    $stmt = mysqli_prepare($connexion, $requete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_a_supprimer);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['flash_message'] = "Salle supprimée de la base de données !";
    } else {
        $_SESSION['flash_message'] = "Erreur lors de la préparation de la suppression.";
    }
    mysqli_close($connexion);

    if (isset($_SESSION['liste_salles'][$id_a_supprimer])) {
        unset($_SESSION['liste_salles'][$id_a_supprimer]);
        $_SESSION['liste_salles'] = array_values($_SESSION['liste_salles']);
        $_SESSION['flash_message'] = "Salle supprimée !";	
    }
    header("Location: ../tableaux_data.php");
    exit(); 
}

// Display of Confirmation
$index = isset($_GET['id']) ? $_GET['id'] : null;

if ($index === null || !isset($_SESSION['liste_salles'][$index])) {
    header("Location: ../tableaux_data.php");
    exit();
}
$salle = $_SESSION['liste_salles'][$index];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de suppression</title>
    <link rel="stylesheet" type="text/css" href="../styles/smi.css" />
   <link rel="stylesheet" type="text/css" href="../styles/tableau.css" />
</head>
<body>

    <main>
        <header>
            <h1>Confirmation de suppression</h1>
            <p><a href="../tableaux_data.php">Retour à la liste</a></p>
        </header>
		<!-- message to confirm the deletion of a line -->
        <section>
            <p>Êtes-vous sûr de vouloir supprimer définitivement cette salle ?</p>
            
            <ul>
                <li><strong>Salle :</strong> <?php echo isset($salle['nom']) ? $salle['nom'] : 'Inconnue'; ?></li>
                <li><strong>Type :</strong> <?php echo isset($salle['type']) ? $salle['type'] : 'Inconnu'; ?></li>
            </ul>

            <form method="POST" action="supprimer_salle.php">
                <input type="hidden" name="id_idx" value="<?php echo $index; ?>">
                
                <p>
                    <button type="submit" name="confirmer_suppression">Confirmer la suppression</button>
                    ou 
                    <a href="../tableaux_data.php">Annuler</a>
                </p>
            </form>
        </section>
    </main>

</body>
</html>
