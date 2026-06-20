<?php

session_start();

if (isset($_POST['ajouter_batiment'])) {
    $nom = htmlspecialchars($_POST['nom_bat']);
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if ($nom != "" && $login != "" && $mdp != "") {
        
        $connexion = mysqli_connect("localhost", "facci", "rt","sae23");
        if (!$connexion) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }
        mysqli_set_charset($connexion, "utf8");

        // Requête préparée avec des ? (syntaxe procédurale)
        $requete = "INSERT INTO bâtiments (nom_bat, login, mdp) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($connexion, $requete);
        
        if ($stmt) {
            // "sss" signifie qu'on envoie 3 chaînes de caractères (string, string, string)
            mysqli_stmt_bind_param($stmt, "sss", $nom, $login, $mdp);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            $_SESSION['flash_message'] = "Bâtiment ajouté avec succès !";
        }
        
        mysqli_close($connexion);

	if (!isset($_SESSION['liste_bat'])) {
            $_SESSION['liste_bat'] = [];
        }
        $_SESSION['liste_bat'][] = [
            'nom_bat' => $nom,
            'login'   => $login,
            'mdp'     => $mdp
        ];
        
        $_SESSION['flash_message'] = "Bâtiment ajouté !";
        
        header("Location: tableaux_data.php");
        exit();
        header("Location: .tableaux_data.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href=".../styles/smi.css" />
   <link rel="stylesheet" type="text/css" href=".../styles/tableau.css" />
    <title>Ajouter un bâtiment</title>
</head>
<body>

    <main>
        <header>
            <h1>Ajouter un bâtiment</h1>
            <p><a href="../tableaux_data.php">Retour à la liste</a></p>
        </header>
		<!-- form used to add information in the table bâtiment -->
        <form method="POST" action="ajouter.php">
            <p>
                <label for="nom_bat">Nom du bâtiment:</label><br>
                <input type="text" id="nom_bat" name="nom_bat" required>
            </p>
            <p>
                <label for="login">Login (Identifiant) :</label><br>
                <input type="text" id="login" name="login" required>
            </p>
            <p>
                <label for="mdp">Mot de passe :</label><br>
                <input type="password" id="mdp" name="mdp" required>
            </p>
            <button type="submit" name="ajouter_batiment">Enregistrer en BDD</button>
        </form>
    </main>

</body>
</html> 
