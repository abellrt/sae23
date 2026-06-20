<?php
//We start the session and retrieve the username and password
	session_start();
	$_SESSION["login"]=$_REQUEST["login"];
	$_SESSION["mot_de_passe"]=$_REQUEST["mot_de_passe"];  
	$login= $_SESSION["login"];
	$motdep=$_SESSION["mot_de_passe"];
	$_SESSION["auth"]=FALSE;

	// Script to verify the password and username entered in the form.

	if(empty($login) || empty($motdep))
		header("Location:login_error.php");
	else
     {
		/* Access to the database bâtiments and retrieval of the password and building details.*/
		include ("mysql.php");

		$requete = "SELECT `mot_de_passe`, `nom_bât` FROM `bâtiments` WHERE login='$login'";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete");
/* He checks that the password and building details are correct.*/
		$ligne = mysqli_fetch_row($resultat);
		if ($ligne && $motdep==$ligne[0] AND $ligne[1])
		 {
			$_SESSION["auth"]=TRUE;
			
			$_SESSION["batiment"] = $ligne[1];
/*If the test passes, it redirects to the web page affichage_gestion.php */
            mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('affichage_gestion.php');</script>";
		 }
		 /*If the test fails, it redirects to the web page login_error.php and deletes the session data*/
		else
		 {
			$_SESSION = array(); 
            session_destroy();   
            unset($_SESSION);    
            mysqli_close($id_bd);
            echo "<script type='text/javascript'>document.location.replace('login_error.php');</script>";
		 }
     } 
 ?>
