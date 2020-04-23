<?php
  require_once 'connexion.php';
  require_once 'autoload.php';

  $db=bdd();
  $motoManager=new MotoManager($db);
  $list_moto=$motoManager->liste();
  $list_yamaha=$motoManager->liste_yamaha();
  $list_rato=$motoManager->liste_rato();
  $list_kaiser=$motoManager->liste_kaiser();

  if (isset($_POST['cathegorie']) and $_POST['marque'] and $_POST['model'] and $_POST['cylindre'] 
  and $_POST['numero_seri'] and $_POST['prix'])
  {
    $motoManager=new MotoManager($db);
    $motos=new Moto($_POST);
    $motoManager->add($motos);
  }

  if(isset($_GET['id']))
  {
      $motoManager->delete($_GET['id']);
      header("location: motos.php");
  }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Gestion des motos</title>
</head>
<body>

    <div class="container" id="container">
        <div class="container" id="banniere">
            <div class="div-1">
                <img src="picture/img1.jpg" alt="logo de gauche" class="logo">
            </div>
            <div class="welcom">
                <p>ETABLISSEMENT OUEDRAOGO ET FRERE</p>
                <P>Vente de motos de toutes marques</P>
            </div>

            <div class="div-2">
                <img src="picture/1436_default_1568652221.png" alt="logo de droit" class="logo">
            </div>
            
        </div>
        <div class="bienvenu">GESTION DES MOTOS</div>
      <div class="global-content">
        <div class="contenu">
            <aside class="content-video">
                <h3 id="navig">Menu navigation</h3>
                <h3 id="c3" class="menu-vertic" > <a href="#content-page"> CLIENTS </a></h3>
                <h3 id="c4" class="menu-vertic" > <a href="#"> MOTOS </a></h3>
                <h3 id="c5" class="menu-vertic" > <a href="ventes.php"> VENTES </a></h3>
            </aside> 
            
            <aside class="content-video2">
                <h3 id="navig2">&copy; simplon.co</h3>
                    <p class="menu-vertic2"> <a href="#">www.simplon.co</a> </p>
                    <p class="menu-vertic2"> <a href="#">simpliss@outlook.com</a> </p>
                    <p class="menu-vertic2">Tel: 79 25 42 44</p>
                    <p class="menu-vertic2">Tel: 61 34 65 54</p>
                    <p class="menu-vertic2">Tel: 67 18 60 63</p>
            </aside> 
        </div>
          <div class="global-page">
            <div class="cache" id="liste">
                 <div class="row">
                   <div class="col-lg-3">
                       <div class="panel panel-success text-center nbr">
                           <div class="panel-heading c-nbr">
                             <strong> NOMBRES TOTAL DES YAMAHA</strong>
                           </div>
                         <div class="panel-body">
                              <?php echo count($list_yamaha)?>
                              <p onclick="afficher(2)"> <a href="#"> Liste </a></p>
                         </div>
                       </div>
                   </div>

                   <div class="col-lg-3">
                       <div class="panel panel-success text-center nbr">
                           <div class="panel-heading c-nbr">
                             <strong> NOMBRES TOTAL DES RATO</strong>
                           </div>
                         <div class="panel-body">
                              <?php echo count($list_rato)?>
                              
                              <p onclick="afficher(3)"> <a href="#"> Liste </a></p>
                         </div>
                       </div>
                   </div>

                   <div class="col-lg-3">
                       <div class="panel panel-success text-center nbr">
                           <div class="panel-heading c-nbr">
                             <strong> NOMBRES TOTAL DES KAISER</strong>
                           </div>
                         <div class="panel-body">
                              <?php echo count($list_kaiser)?>
                              
                              <p onclick="afficher(4)"> <a href="#"> Liste </a></p>
                         </div>
                       </div>
                       </div>
                       </div>
                       <div class="c-table">
                       <div class="sms">LISTE DE TOUTES LES MOTOS</div>
                           <table class="table table-bordered">
                              <thead>
                                <tr id="ligne">
                                  <th id="colone" scope="col">N°</th>
                                  <th id="colone" scope="col">Marque</th>
                                  <th id="colone" scope="col">Modèle</th>
                                  <th id="colone" scope="col">Cylindre</th>
                                  <th id="colone" scope="col">Cathegorie</th>
                                  <th id="colone" scope="col">Num Série</th>
                                  <th id="colone" scope="col">Prix</th>
                                  <th id="colone" scope="col">Edit</th>
                                  <th id="colone" scope="col">Delete</th>
                                  <th id="colone" scope="col">Detail</th>
                                </tr>
                              </thead>
                              <tbody id="tbody">
                              <tr>             
                                       <?php    
                                       foreach($list_moto as $key => $value) {
                                       ?>
                                         <tr>
                                            <td id="colone"><?=$key+1?></td>
                                            <td id="colone"><?=$value->getMarque()?></td>
                                            <td id="colone"><?=$value->getModel()?></td>
                                            <td id="colone"><?=$value->getCylindre()?></td>
                                            <td id="colone"><?=$value->getCathegorie()?></td>
                                            <td id="colone"><?=$value->getNumero_seri()?></td>
                                            <td id="colone"><?=$value->getPrix()?></td>
                                            <td id="colone"><a href="modif_moto.php?id=<?= $value->getId()?>" type="button" id="edit"> Editer </a></td>
                                            <td id="colone"><a href="motos.php?id=<?= $value->getId()?>" type="button" id="del"> delete </a></td>
                                            <td id="colone"><a href="detail_moto.php?id=<?= $value->getId()?>"  type="button" id="det"> Detail </a></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                              </tbody>
                            </table>
                            <p>TOTAL: <?php echo count($list_moto)?></p>

                            <div class="panel-footer">
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(5)">Nouveau</button>
                            </div>

                        </div>
                   </div>

                   <div class="cache" id="yamaha">
                   <div class="c-table">
                       <div class="sms">LISTE DES YAMAHA</div>
                           <table class="table table-bordered">
                              <thead>
                              <tr id="ligne">
                                  <th id="colone" scope="col">N°</th>
                                  <th id="colone" scope="col">Marque</th>
                                  <th id="colone" scope="col">Modèle</th>
                                  <th id="colone" scope="col">Cylindre</th>
                                  <th id="colone" scope="col">Cathegorie</th>
                                  <th id="colone" scope="col">Num Série</th>
                                  <th id="colone" scope="col">Prix</th>
                                  <th id="colone" scope="col">Edit</th>
                                  <th id="colone" scope="col">Delete</th>
                                  <th id="colone" scope="col">Detail</th>
                                </tr>
                              </thead>
                              <tbody id="tbody">
                              <tr>             
                                       <?php    
                                       foreach($list_yamaha as $key => $value) {
                                       ?>
                                         <tr>
                                            <td id="colone"><?=$key+1?></td>
                                            <td id="colone"><?=$value->getMarque()?></td>
                                            <td id="colone"><?=$value->getModel()?></td>
                                            <td id="colone"><?=$value->getCylindre()?></td>
                                            <td id="colone"><?=$value->getCathegorie()?></td>
                                            <td id="colone"><?=$value->getNumero_seri()?></td>
                                            <td id="colone"><?=$value->getPrix()?></td>
                                            <td id="colone"><a href="modif_moto.php?id=<?= $value->getId()?>" type="button" id="edit"> Editer </a></td>
                                            <td id="colone"><a href="motos.php?id=<?= $value->getId()?>" type="button" id="del"> delete </a></td>
                                            <td id="colone"><a href="detail_moto.php?id=<?= $value->getId()?>"  type="button" id="det"> Detail </a></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                              </tbody>
                            </table>
                            <p>TOTAL: <?php echo count($list_yamaha)?></p>

                            <div class="panel-footer">
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(5)">Nouveau</button>
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(1)">Fermer</button>
                            </div>

                        </div>
                   </div>

                   <div class="cache" id="rato">
                   <div class="c-table">
                       <div class="sms">LISTE DES RATO</div>
                       <table class="table table-bordered">
                              <thead>
                              <tr id="ligne">
                                  <th id="colone" scope="col">N°</th>
                                  <th id="colone" scope="col">Marque</th>
                                  <th id="colone" scope="col">Modèle</th>
                                  <th id="colone" scope="col">Cylindre</th>
                                  <th id="colone" scope="col">Cathegorie</th>
                                  <th id="colone" scope="col">Num Série</th>
                                  <th id="colone" scope="col">Prix</th>
                                  <th id="colone" scope="col">Edit</th>
                                  <th id="colone" scope="col">Delete</th>
                                  <th id="colone" scope="col">Detail</th>
                                </tr>
                              </thead>
                              <tbody id="tbody">
                              <tr>             
                                       <?php    
                                       foreach($list_rato as $key => $value) {
                                       ?>
                                         <tr>
                                            <td id="colone"><?=$key+1?></td>
                                            <td id="colone"><?=$value->getMarque()?></td>
                                            <td id="colone"><?=$value->getModel()?></td>
                                            <td id="colone"><?=$value->getCylindre()?></td>
                                            <td id="colone"><?=$value->getCathegorie()?></td>
                                            <td id="colone"><?=$value->getNumero_seri()?></td>
                                            <td id="colone"><?=$value->getPrix()?></td>
                                            <td id="colone"><a href="modif_moto.php?id=<?= $value->getId()?>" type="button" id="edit"> Editer </a></td>
                                            <td id="colone"><a href="motos.php?id=<?= $value->getId()?>" type="button" id="del"> delete </a></td>
                                            <td id="colone"><a href="detail_moto.php?id=<?= $value->getId()?>"  type="button" id="det"> Detail </a></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                              </tbody>
                            </table>
                            <p>TOTAL: <?php echo count($list_rato)?></p>

                            <div class="panel-footer">
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(5)">Nouveau</button>
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(1)">Fermer</button>
                            </div>

                        </div>
                   </div>

                   <div class="cache" id="kaiser">
                   <div class="c-table">
                       <div class="sms">LISTE DES KAISER</div>
                       <table class="table table-bordered">
                              <thead>
                              <tr id="ligne">
                                  <th id="colone" scope="col">N°</th>
                                  <th id="colone" scope="col">Marque</th>
                                  <th id="colone" scope="col">Modèle</th>
                                  <th id="colone" scope="col">Cylindre</th>
                                  <th id="colone" scope="col">Cathegorie</th>
                                  <th id="colone" scope="col">Num Série</th>
                                  <th id="colone" scope="col">Prix</th>
                                  <th id="colone" scope="col">Edit</th>
                                  <th id="colone" scope="col">Delete</th>
                                  <th id="colone" scope="col">Detail</th>
                                </tr>
                              </thead>
                              <tbody id="tbody">
                              <tr>             
                                       <?php    
                                       foreach($list_kaiser as $key => $value) {
                                       ?>
                                         <tr>
                                            <td id="colone"><?=$key+1?></td>
                                            <td id="colone"><?=$value->getMarque()?></td>
                                            <td id="colone"><?=$value->getModel()?></td>
                                            <td id="colone"><?=$value->getCylindre()?></td>
                                            <td id="colone"><?=$value->getCathegorie()?></td>
                                            <td id="colone"><?=$value->getNumero_seri()?></td>
                                            <td id="colone"><?=$value->getPrix()?></td>
                                            <td id="colone"><a href="modif_moto.php?id=<?= $value->getId()?>" type="button" id="edit"> Editer </a></td>
                                            <td id="colone"><a href="motos.php?id=<?= $value->getId()?>" type="button" id="del"> delete </a></td>
                                            <td id="colone"><a href="detail_moto.php?id=<?= $value->getId()?>"  type="button" id="det"> Detail </a></td>
                                         </tr>
                                        <?php
                                        }
                                        ?>   
                                    </tr>
                              </tbody>
                            </table>
                            <p>TOTAL: <?php echo count($list_kaiser)?></p>

                            <div class="panel-footer">
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(5)">Nouveau</button>
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(1)">Fermer</button>
                            </div>

                        </div>
                   </div>

                   <div class="cache" id="formulaire">
                   <div class="c-table">
                       <div class="sms">FORMULAIRE D'INSERTION</div>

                       <form action="motos.php"method="post" enctype="multipart/form-data"> 
                       <div class="row">
                              <div class="col">
                              <input type="text" class="form-control" name="cathegorie" placeholder="Cathégorie" required ="required">
                               
                              </div>
                              <div class="col">
                              <input type="text" class="form-control" name="marque" placeholder="Marque" required ="required">
                                
                            </div>
                            </div><br>
                            <div class="row">
                              <div class="col">
                              <input type="text" class="form-control" name="model" placeholder="Modèle" required ="required">
                      
                              </div>
                              <div class="col">
                              <input type="text" class="form-control" name="cylindre" placeholder="Cylindre" required ="required">
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" name="numero_seri" placeholder="N° Serie" required ="required">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="prix" placeholder="Prix" required ="required">
                              </div>
                            </div><br>
                            <div class="panel-footer">
                                <input type="submit" class="btn btn-success pull-right btn" value='Enregistrer'>
                                <button type="button" class="btn btn-success pull-right btn" onclick="afficher(1)">Fermer</button>
                            </div>
                         </form>

                        </div>
                   </div>

                   </div>

                   <div class="cache" id="modifer">
                   <div class="c-table">
                       <div class="sms">FORMULAIRE DE MODIFICATION</div>

                       <form action="#"method="post" enctype="multipart/form-data"> 
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" name="marque" placeholder="Marque" required ="required">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="modele" placeholder="Modèle" required ="required">
                            </div>
                            </div><br>
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" name="cylindre" placeholder="Cylindre" required ="required">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="categorie" placeholder="Catégorie" required ="required">
                              </div>
                            </div><br>
                            <div class="row">
                              <div class="col">
                                <input type="text" class="form-control" name="serie" placeholder="N° Serie" required ="required">
                              </div>
                              <div class="col">
                                <input type="text" class="form-control" name="prix" placeholder="Prix" required ="required">
                              </div>
                            </div><br>
                            <div class="row">
                         </form>

                            <div class="panel-footer">
                                <button type="button" class="btn btn-success pull-right btn">Modifier</button>
                                <button type="button" class="btn btn-success pull-right btn"onclick="afficher(1)">Fermer</button>
                            </div>

                        </div>
                   </div>

            </div>

            <div class="cache" id="kaiser">
                   <div class="c-table">
                   <label for="">Nom:</label> <br>
                   <label for="">Nom:</label> <br>
                   <label for="">Nom:</label> <br>
                   <label for="">Nom:</label> <br>
                   <label for="">Nom:</label> <br>

                            <div class="panel-footer">
                                <button type="button" class="btn btn-success pull-right btn">Nouveau</button>
                                <button type="button" class="btn btn-success pull-right btn">Fermer</button>
                            </div>

                        </div>
                   </div>
          </div>
      </div>
    </div>
    <script src="js/script.js" type="text/javascript" charset="utf-8">
          
    </script>
</body>
</html>