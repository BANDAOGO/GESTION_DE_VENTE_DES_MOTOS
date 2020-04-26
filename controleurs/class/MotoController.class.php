<?php
class MotoController
{
    private $_db;
 
    // Le constructeur prend en paramettre l'instance PDO
    public function __construct($db)
    {
        $this->_db=$db;
    }
    public function add(Moto $moto)
    {
        $resq=$this->_db->prepare("INSERT INTO moto SET marque=:marque, modele=:modele, cylindre=:cylindre,prix=:prix, categorie=:categorie,   numeroDeSerie=:numeroDeSerie, couleur=:couleur");
        $resq->bindValue(':marque', $moto->getMarque());
        $resq->bindValue(':modele', $moto->getModele());
        $resq->bindValue(':cylindre', $moto->getCylindre());
        $resq->bindValue(':prix', $moto->getPrix());
        $resq->bindValue(':categorie', $moto->getCategorie());
        $resq->bindValue(':numeroDeSerie', $moto->getNumeroDeSerie());
        $resq->bindValue(':couleur', $moto->getCouleur());
        $resq->execute();
    }

    public function get($idmoto)
   {
     $sql=$this->_db->query("SELECT * FROM moto WHERE idmoto=".$idmoto);
     $row=$sql->fetch();
     $sql->closeCursor();
     $mot=new Moto($row);
     return $mot;
   }

    public function liste()
    {
        $moto=[];
        $resq=$this->_db->query("SELECT * FROM moto ORDER BY marque ASC");
        $donnee=$resq->fetchAll();
        $resq->closeCursor();
        foreach ($donnee as $donnees)
        {
            $moto[]=new Moto ($donnees);
        }
        return $moto;
    }

    public function delete($idmoto)
    {
        $resq=$this->_db->exec("DELETE  FROM moto WHERE idmoto=".$idmoto);
        return $resq>0;
    }

    public function update(Moto $moto)
    {
        //echo $moto->getId();
         try{ 
                $sql=$this->_db->prepare('UPDATE moto SET marque=:marque, modele=:modele,cylindre=:cylindre, prix=:prix, categorie=:categorie,
                numeroDeSerie=:numeroDeSerie, couleur=:couleur WHERE idmoto=:idmoto');
                $d=$sql->execute(array('idmoto'=>$moto->getIdmoto(),
                'marque'=>$moto->getMarque(),
                'modele'=>$moto->getModele(),
                'cylindre'=>$moto->getCylindre(),
                'prix'=>$moto->getPrix(),
                'categorie'=>$moto->getCategorie(),
                'numeroDeSerie'=>$moto->getNumeroDeSerie(),
                'couleur'=>$moto->getCouleur()
              ));  
         } catch (Exception $ex) {
             echo $ex->getMessage();
         }
       }
}