<?php
include("mysql.php");
$batiment_gestionnaire = $_SESSION["batiment"];
include("choix_capteur.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>SAE23</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="./styles/smi.css" media="screen" />
</head>
<body>
<header>
  <h1>Espace Gestionnaire : Bâtiment <?php echo $batiment_gestionnaire; ?></h1>
</header>
<section>
        <h2>Filtrer les données</h2>
        <form action="choix_filtre.php" method="POST">
            
            <label for="capteur">Choisir le capteur :</label>
            <select name="capteur" id="capteur" required>
                <option value="">-- Sélectionner --</option>
                <?php while ($row = mysqli_fetch_assoc($res_capteurs)) { ?>
                <option value="<?php echo $row['nom_capteur']; ?>">
                <?php echo "Salle " . $row['nom_salle'] . " - " . $row['type_capteur']; 
            echo "</option>";
                }
            ?>
<label for="date_debut">Date de début :</label>
            <input type="datetime-local" name="date_debut" id="date_debut" value="<?php echo isset($_POST['date_debut']) ? $_POST['date_debut'] : ''; ?>" required>

            <label for="date_fin">Date de fin :</label>
            <input type="datetime-local" name="date_fin" id="date_fin" value="<?php echo isset($_POST['date_fin']) ? $_POST['date_fin'] : ''; ?>" required>

            <button type="submit" name="valider">valider</button>
        </form>
    </section>