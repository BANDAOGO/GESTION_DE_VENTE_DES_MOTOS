<?php
    session_start();
    require('connexion.php');



    // //moto
    
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $cylindre = $_POST['cylindre'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $numeroDeSerie = $_POST['numeroDeSerie'];
    $couleur = $_POST['couleur'];
    
   //On insère les données reçues d'une moto
   $bd= bd();
   $insert = $bd->prepare("
   INSERT INTO moto (  marque, modele, cylindre, prix, categorie, numeroDeSerie, couleur)
   VALUES(?,?,?,?,?,?,?)");

   $insert->execute(array( $marque, $modele, $cylindre, $prix, $categorie, $numeroDeSerie, $couleur)); 
    
   header("location:../vues/liste_des_motos.php");

?>