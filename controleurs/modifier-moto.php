<?php
require_once '../models/connexion.php';
require_once '../models/autoload.php';

$bd=bd();
$moto_ctrl =new MotoController($bd);
if(isset($_GET['idmoto']))
{
    $idmoto=$_GET['idmoto'];
    $valuer=$moto_ctrl->get((int) $idmoto);
    //echo $email;
}

if(isset($_POST['marque']) and $_POST['modele'] and $_POST['cylindre'] and $_POST['prix'] and $_POST['categorie'] and $_POST['numeroDeSerie']
and $_POST['couleur'] )
{
  
    $moto_ctrl =new MotoController($bd);
    $moto=new Moto($_POST);
    $moto_ctrl->modifier($moto);
    // header("location: index.php");
}
?>
<?php include("../incluse/entete.php"); ?> 
             
                                         <!-- Le corps du travail -->

                                         <div class="le-div-general-du-formulaire">   
 <form action="../models/traitement.php" method="POST" class="formulaire" enctype="multipart/form-data">
    <fieldset>
        <legend> <button class="btn buttuon_dossier"> NOUVELLE MOTO</button></legend>
    <div class="div-du-sous-titre-parent-et-des-tirest">
    <div class="row la-ligne-blanche">
    <div class=" col les-tirest"></div>
  </div>
  <h1 class="text1">Enregistrer un nouvel engin</h1>
  <div id="div_Formulairepatient">

      <div >
            <label  class="labelcommun" for="Marque"> <b> Marque</b></label><br>
            <input  class="inputcommun" type="text" id="Marque"  name="marque" required value="<?= $valuer->getMarque()?>"> <br><br>
            <label class="labelcommun"  for="Modèle"><b>Modèle</b></label><br>
            <input  class="inputcommun" type="text" id="Modèle" name="modele" required value="<?= $valuer->getModele()?>"><br><br>
            <label  class="labelcommun" for="Cylindre"><b>Cylindre</b></label><br>
            <input  class="inputcommun" type="text" id="Cylindre" name="cylindre" required value="<?= $valuer->getCylindre()?>"><br><br>
            <label  class="labelcommun prixlabel" for="Prix"><b>Prix </b></label>
            <input class="inputcommun prixinput"  type="text" id="Prix" name="prix" required value="<?= $valuer->getPrix()?>">

        <div class="row la-classe-de-enregistrer-et-de-annuler">
            <div class="col">
               <input class="btn btn-primary Enregistrer" type="submit" value="Enregistrer une moto" >
            </div>
            <div class="col">
                <input class="btn btn-primary Annuler" type="reset" value="Annuler l'enregistrement d'une moto">
            </div>
        </div>
        
      </div>
      <div >
            <label  class="labelcommun" for="Catégorie"><b>Catégorie</b></label><br>
            <input class="inputcommun"  type="text" id="Catégorie" name="categorie" required value="<?= $valuer->getCategorie()?>"><br><br>
            <label class="labelcommun" for="serie"><b>Numéro de serie</b></label><br>
            <input  class="inputcommun" type="text" id="serie" name="numeroDeSerie" required value="<?= $valuer->getNumeroDeSerie()?>"><br><br>
            <label  class="labelcommun"for="Couleur"><b>Couleur</b></label><br>
            <input  class="inputcommun" type="text" id="Couleur" name="couleur" required value="<?= $valuer->getCouleur()?>">
      </div>

</div>
</fieldset>
</form>
</div>

</div>

                                        <!-- Le Footer de l'interface d'utilisateur -->

                                        <?php include("../incluse/footer.php"); ?> 

         
</body>
</html>