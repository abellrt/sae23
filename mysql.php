<?php
/* Script for connecting to the sae23 database*/

  $id_bd = mysqli_connect( "localhost", "facci" ,"rt" ,"sae23")
    or die("Connexion au serveur et/ou à la base de données impossible");

  /* Character encoding management */
  mysqli_query($id_bd, "SET NAMES 'utf8'");

?>
