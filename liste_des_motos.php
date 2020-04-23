<?php 
require_once 'connexion.php';
require_once 'autoload.php';

$bd= bd();
$moto_ctrl =new MotoController($bd);
$list_patient=$moto_ctrl->afficher_list();

if(isset($_GET['id']))
{
    $moto_ctrl->supprimer($_GET['id']);
    // header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Liste des motos</title>
    </head>
    <body>
<div class="global">
    <header>

<div class='images'>
    <img class='image' src="picture/logo.png" alt="Le logo de Simplon">
</div>
    <h3 class='bienvenue_bircof'>BIENVENUE DANS GESTION DE VENTE DE MOTO</h3>
<div class='images'>
    <img class='image' src="picture/banniere.jpg" alt="Une photo de famille Simploniens au Burkina Faso">
</div>

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
                                    Detail
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
    
                                       foreach($list_patient as $key => $value) {
    
                                       ?>
                                         <tr>
                                            <td><?=$key+1?></td>
                                            <td><?=$value->getMarque()?></td>
                                            <td><a href="detail_patient.php?id=<?= $value->getId()?>" type="button"> <img src="picture/businessman_48px.png" alt="" class="signe"> </a></td>
                                            <td><a href="modif_patient.php?id=<?= $value->getId()?>"  type="button"><img src="picture/pencil_tip_48px.png" alt="" class="signe"> </a></td>
                                            <td><a href="index.php?id=<?= $value->getId()?>" type="button"> <img src="picture/delete_sign_48px.png" alt="" class="signe"> </a></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                            </table>      
                </div>
                
                <div class="buttons">
                    <div class='button'>
                       <a href="index.php"> <input class="btn btn-outline-success" id="btn-ajout" type="submit" value="Nouveau"> </a>
                    </div>
                </div>

        
</div>         
    </body>
</html>
