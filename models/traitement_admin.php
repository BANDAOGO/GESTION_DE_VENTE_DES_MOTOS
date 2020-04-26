<?php
    session_start();
    require('connexion_admin.php');




    //admin
    $nomAdmin = htmlspecialchars($_POST['nomAdmin']);
    $password = SHA1(htmlspecialchars($_POST['password']));
 

    //On insère les données reçues de l'admin
    
    $insert = $connect->prepare("
    INSERT INTO admin (nomDutilisateur, password)
    VALUES(?, ?)");

    $insert->execute(array($nomAdmin, $password));
?>