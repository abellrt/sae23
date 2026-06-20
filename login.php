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
		/* Access to the database administrateur and retrieval of the password and building details.*/
		include ("mysql.php");

		$requete = "SELECT `mot_de_passe` FROM `administrateur` WHERE login='$login'";
		$resultat = mysqli_query($id_bd, $requete)
			or die("Execution de la requete impossible : $requete");
	/* He checks that the password and building details are correct.*/
		$ligne = mysqli_fetch_row($resultat);
		if ($motdep==$ligne[0])
		 {
			$_SESSION["auth"]=TRUE;		
			/*If the test passes, it redirects to the web page affichage_gestion.php */
            mysqli_close($id_bd);
			echo "<script type='text/javascript'>document.location.replace('./gestion/tableaux_data.php');</script>";
		 }
		  /*If the test fails, it redirects to the web page login_error.php and deletes the session data*/
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
