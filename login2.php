<?php
	session_start();
	$_SESSION["login"]=$_REQUEST["login"];
	$_SESSION["mot_de_passe"]=$_REQUEST["mot_de_passe"];  // Récupération du mot de passe
	$login= $_SESSION["login"];
	$motdep=$_SESSION["mot_de_passe"];
	$_SESSION["auth"]=FALSE;

	// Script de vérification du mot de passe d'administration, en utilisant la table Connexion

	if(empty($login) || empty($motdep))
		header("Location:login_error.php");
	else
     {
		/* Accès à la base */
		include ("mysql.php");

		$requete = "SELECT `mot_de_passe`, `nom_bât` FROM `bâtiments` WHERE login='$login'";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete");

		$ligne = mysqli_fetch_row($resultat);
		if ($ligne && $motdep==$ligne[0] AND $ligne[1])
		 {
			$_SESSION["auth"]=TRUE;
			
			$_SESSION["batiment"] = $ligne[1];

            mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('affichage_gestion.php');</script>";
		 }
		else
		 {
			$_SESSION = array(); // Réinitialisation du tableau de session
            session_destroy();   // Destruction de la session
            unset($_SESSION);    // Destruction du tableau de session
            mysqli_close($id_bd);
            echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
		 }
     } 
 ?>
