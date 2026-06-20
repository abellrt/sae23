<?php


session_start();
$mess_succes = "";


// Buildings table initialisation
if (!isset($_SESSION['liste_bat'])) {
    $_SESSION['liste_bat'] = []; 
}
$liste_bati = $_SESSION['liste_bat'];

/* connection to bâtiments table */
$connexion = mysqli_connect("localhost", "facci","rt","sae23");
if (!$connexion) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
mysqli_set_charset($connexion, "utf8");

$requete = "SELECT * FROM bâtiments";
$resultat = mysqli_query($connexion, $requete);


// Rooms table initialisation
if (!isset($_SESSION['liste_salles'])) {
    // Quelques données de test par défaut si le tableau est vide
    $_SESSION['liste_salles'] = []; 
}
$liste_salles = $_SESSION['liste_salles'];

 //--- connection to salles table ---
$requete_salles = "SELECT * FROM salles";
$resultat_salles = mysqli_query($connexion, $requete_salles);


// Sensors table initialisation
if (!isset($_SESSION['liste_capteurs'])) {
    // Quelques données de test par défaut si le tableau est vide
    $_SESSION['liste_capteurs'] = []; 
}
$liste_capteurs = $_SESSION['liste_capteurs'];

// --- connection to capteurs table ---
$requete_capteurs = "SELECT * FROM capteurs";
$resultat_capteurs = mysqli_query($connexion, $requete_capteurs);



// flash message recovery 
if (isset($_SESSION['flash_message'])) {
    $mess_succes = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace de Gestion</title>
        <link rel="stylesheet" type="text/css" href="../styles/smi.css" />
   <link rel="stylesheet" type="text/css" href="../styles/tableau.css" />
</head>
<body>

    <main>
        <header>
            <h1>Gestion des données l'IUT</h1>
        </header>

        <?php if ($mess_succes != "") { ?>
            <p><?php echo $mess_succes; ?></p>
        <?php } ?>
		<! -- Each tables separate in different "section" tags -->
        <section>
            <h2>Bâtiments enregistrés</h2>
            <p><a href="batiment/ajouter.php">Ajouter un bâtiment</a></p>
            <table border="1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bâtiment</th>
                        <th>Login</th>
                        <th>Mot de passe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($liste_bati) == 0) { ?> 
                        <tr>
                            <td colspan="5">Le tableau des bâtiments est vide.</td> <!-- This message appears in the table if $liste_bati == 0 -->
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($liste_bati as $index => $user) { ?> <!-- foreach is used to iterate through the values of an array -->
                            <tr>
                                <td><?php echo $index + 1; ?></td> <!-- incrementation of the index -->
                                <td><?php echo $user['nom_bât']; ?></td>
                                <td><?php echo $user['login']; ?></td>
                                <td><?php echo $user['mdp']; ?></td>
                                <td>
                                   <a href="batiment/supprimer.php?id=<?php echo $index; ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <br><hr><br>

        <section>
            <h2>Salles enregistrées</h2>
            <p><a href="salles/ajouter_salle.php">Ajouter une salle</a></p>
            <table border="1">
                <thead>
                    <tr>
                        <th>N°</th> <th>ID Bâtiment</th>
                        <th>Nom de la Salle</th>
                        <th>Type</th>
                        <th>Capacité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($liste_salles) == 0) { ?>
                        <tr>
                            <td colspan="6">Le tableau des salles est vide.</td> </tr>
                    <?php } else { ?>
                        <?php foreach ($liste_salles as $index => $salle) { ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td> <td><?php echo isset($salle['id_bât']) ? $salle['id_bât'] : 'Non défini'; ?></td> 
                                <td><?php echo isset($salle['nom_salle']) ? $salle['nom_salle'] : 'Non défini'; ?></td>
                                <td><?php echo isset($salle['type']) ? $salle['type'] : 'Non défini'; ?></td>
                                <td><?php echo isset($salle['capacite_accueil']) ? $salle['capacite_accueil'] : 0; ?> places</td>
                                <td>
                                   <a href="salles/supprimer_salle.php?id=<?php echo $index; ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <br><hr><br>

        <section>
            <h2>Capteurs enregistrés</h2>
            <p><a href="capteurs/ajouter_capteurs.php">Ajouter un capteur</a></p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nom de la Salle</th>
                        <th>Nom du Capteur</th>
                        <th>Type de Capteur</th>
                        <th>Unité de mesure</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($liste_capteurs) == 0) { ?>
                        <tr>
                            <td colspan="5">Le tableau des capteurs est vide.</td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($liste_capteurs as $index => $capteur) { ?>
                            <tr>
                                <td><?php echo $capteur['nom_salle']; ?></td> 
                                <td><?php echo $capteur['nom_capteur']; ?></td>
                                <td><?php echo $capteur['type_capteur']; ?></td>
                                <td><?php echo $capteur['unité']; ?></td>
                                <td>
                                   <a href="capteurs/supprimer_capteurs.php?id=<?php echo $index; ?>">Supprimer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>
