<?php


session_start();

// Deletion processiong ---
if (isset($_POST['confirmer_suppression'])) {
    $id_a_supprimer = $_POST['id_idx'];
	
	$connexion = mysqli_connect("localhost", "facci", "rt","sae23");
    if (!$connexion) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
    mysqli_set_charset($connexion, "utf8");

    $requete = "DELETE FROM bâtiments WHERE id_bat = ?";
    $stmt = mysqli_prepare($connexion, $requete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_a_supprimer);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['flash_message'] = "Bâtiment supprimé de la base de données !";
    } else {
        $_SESSION['flash_message'] = "Erreur lors de la préparation de la suppression.";
    }
    mysqli_close($connexion);
	
    if (isset($_SESSION['liste_bat'][$id_a_supprimer])) {
        unset($_SESSION['liste_bat'][$id_a_supprimer]);
        $_SESSION['liste_bat'] = array_values($_SESSION['liste_bat']);
        $_SESSION['flash_message'] = "Bâtiment supprimé de la Session !";	
    }

    header("Location: ../tableaux_data.php");
    exit(); 
}

// Display of the Confirmation sheet(GET) ---
$index = isset($_GET['id']) ? $_GET['id'] : null;

if ($index === null || !isset($_SESSION['liste_bat'][$index])) {
    header("Location: ../tableaux_data.php");
    exit();
}

$user = $_SESSION['liste_bat'][$index];
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
            <p>Êtes-vous sûr de vouloir supprimer définitivement ce bâtiment ?</p>
            
            <ul>
                <li><strong>Bâtiment :</strong> <?php echo $user['nom_bat']; ?></li>
                <li><strong>Login :</strong> <?php echo $user['login']; ?></li>
            </ul>

            <form method="POST" action="supprimer.php">
                <input type="hidden" name="id_idx" value="<?php echo $index; ?>">
                
                <p>
                    <button type="submit" name="confirmer_suppression">Confirmer la suppression</button><!-- The button will bring us to tableaux_data.php -->
                    ou 
                    <a href="../tableaux_data.php">Annuler</a>
                </p>
            </form>
        </section>
    </main>

</body>
</html>
