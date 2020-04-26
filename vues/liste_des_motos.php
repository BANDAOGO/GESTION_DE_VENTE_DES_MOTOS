<?php 
require_once '../models/connexion.php';
require_once '../models/autoload.php';

$bd= bd();
$moto_ctrl =new MotoController($bd);
$list_moto=$moto_ctrl->liste();
if(isset($_GET['idmoto']))
{
    $moto_ctrl->delete($_GET['idmoto']);
    // header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="CSS/liste_des_motos.css" />
        <title>Liste des motos</title>
    </head>
    <body>
    <?php include("../incluse/entete.php"); ?>

</header>

            <h4>LISTE DES MOTOS</h4>
        <div class="cont-table">
            <table class="table table-bordered table-responsive-sm">
            <thead>
                            <tr>
                                <th class="text-center">
                                    N°
                                </th>
                                <th class="text-center">
                                    Marque
                                </th>
                                <th class="text-center">
                                    Modele
                                </th>
                                <th class="text-center">
                                    Cylindre
                                </th>
                                <th class="text-center">
                                    Prix
                                </th>
                                <th class="text-center">
                                    Categorie
                                </th>
                                <th class="text-center">
                                    NumeroDeSerie
                                </th>
                                <th class="text-center">
                                    Couleur
                                </th>
                              

                                <th class="text-center">
                                    Edite
                                </th>

                                <th class="text-center">
                                    Delete
                                </th>

                            </tr>
                            </thead>
                           <tbody>
                           <tr>             
                                       <?php
    
                                       foreach($list_moto as $key => $value) {
    
                                       ?>
                                         <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$value->getMarque()?></td>
                                            <td><?=$value->getModele()?></td>
                                            <td><?=$value->getCylindre()?></td>
                                            <td><?=$value->getPrix()?></td>
                                            <td><?=$value->getCategorie()?></td>
                                            <td><?=$value->getNumeroDeSerie()?></td>
                                            <td><?=$value->getCouleur()?></td>
                                            
                                            <td><a href="../controleurs/modifier-moto.php?idmoto=<?= $value->getIdmoto()?>"  type="button"><img src="../images/icons8_Delete_48px.png" alt="" class="signe"> </a></td>
                                            <td><a href="liste_des_motos.php?idmoto=<?= $value->getIdmoto()?>" type="button"> <img src="../images/delete_sign_48px.png" alt="" class="signe"> </a></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                            </table>      
                </div>
                
                <div class="buttons">
                    <div class='button'>
                       <a href="../controleurs/index.php"> <input class="btn btn-outline-success" id="btn-ajout" type="submit" value="Nouvelle moto"> </a>
                    </div>
                </div>

        
</div>         
    </body>
    <?php include("../incluse/footer.php"); ?>
</html>
