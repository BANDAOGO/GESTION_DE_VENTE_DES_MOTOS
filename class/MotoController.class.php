<?php

class MotoController
{

  private $_db;

   public function __construct($db)
   {
       $this->_db=$db;
   }

   public function ajouter(Moto $moto)
   {
     $sql=$this->_db->prepare("INSERT INTO moto SET marque =:marque, modele =:modele, cylindre =:cylindre, 
     prix =:prix, categorie =:categorie, numeroDeSerie=:numeroDeSerie, couleur=:couleur");
     $sql->bindValue(":marque",$moto->getMarque());
     $sql->bindValue(":modele",$moto->getModele());
     $sql->bindValue(":cylindre",$moto->getCylindre());
     $sql->bindValue(":prix",$moto->getPrix());
     $sql->bindValue(":categorie",$moto->getCategorie());
     $sql->bindValue(":numeroDeSerie",$moto->getNumeroDeSerie());
     $sql->bindValue(":couleur",$moto->getCouleur());
     $sql->execute();
   }

   public function get($id)
   {
     $sql=$this->_db->query("SELECT * FROM moto WHERE id=".$id);
     $row=$sql->fetch();
     $sql->closeCursor();
     $p=new Moto($row);
     return $p;
   }

   public function supprimer($id)
   {
     $sql=$this->_db->exec("DELETE  FROM moto WHERE id=".$id);
     return $sql>0;
   }
   
   public function afficher_list()
   {
     $moto=[];
     $sql=$this->_db->prepare("SELECT * FROM moto ORDER BY marque, modele ASC");
     $rows=$sql->fetchAll();
     $sql->closeCursor();
     foreach ($rows as $row) {

     $moto[]=new Moto($row);
     }
     return $moto;
   }

 public function modifier(Moto $moto)
   {
     try{ 
            $sql=$this->_db->prepare("UPDATE  moto SET marque =:marque, modele =:modele, cylindre =:cylindre, 
            prix =:prix, categorie =:categorie, numeroDeSerie=:numeroDeSerie, couleur=:couleur WHERE id=:id");
            $sql->execute(array('marque'=>$moto->getMarque(),'modele'=>$moto->getModele(),'cylindre'=>$moto->getCylindre(),
            'prix'=>$moto->getPrix(),'categorie'=>$moto->getCategorie(),'numeroDeSerie'=>$moto->getNumeroDeSerie(),'couleur'=>$moto->getCouleurmoto()));   
     } catch (Exception $ex) {
         echo $ex->getMessage();
     }
   }
}
