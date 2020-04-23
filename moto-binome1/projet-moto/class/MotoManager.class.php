<?php
class MotoManager
{
    private $_db;
 
    // Le constructeur prend en paramettre l'instance PDO
    public function __construct($db)
    {
        $this->_db=$db;
    }
    public function add(Moto $moto)
    {
        $resq=$this->_db->prepare("INSERT INTO moto SET cathegorie=:cathegorie, marque=:marque, model=:model, cylindre=:cylindre, numero_seri=:numero_seri, prix=:prix");
        $resq->bindValue(':cathegorie', $moto->getCathegorie());
        $resq->bindValue(':marque', $moto->getMarque());
        $resq->bindValue(':model', $moto->getModel());
        $resq->bindValue(':cylindre', $moto->getCylindre());
        $resq->bindValue(':numero_seri', $moto->getNumero_seri());
        $resq->bindValue(':prix', $moto->getPrix());
        $resq->execute();
    }

    public function get($id)
   {
     $sql=$this->_db->query("SELECT * FROM moto WHERE id=".$id);
     $row=$sql->fetch();
     $sql->closeCursor();
     $mot=new Moto($row);
     return $mot;
   }

    public function liste()
    {
        $moto=[];
        $resq=$this->_db->query('SELECT * FROM moto ORDER BY marque');
        $donnee=$resq->fetchAll();
        $resq->closeCursor();
        foreach ($donnee as $donnees)
        {
            $moto[]=new Moto ($donnees);
        }
        return $moto;
    }

    public function liste_yamaha()
    {
        $moto=[];
        $resq=$this->_db->query('SELECT * FROM moto WHERE marque="yamaha"');
        $donnee=$resq->fetchAll();
        $resq->closeCursor();
        foreach ($donnee as $donnees)
        {
            $moto[]=new Moto ($donnees);
        }
        return $moto;
    }

    public function liste_rato()
    {
        $moto=[];
        $resq=$this->_db->query('SELECT * FROM moto WHERE marque="rato"');
        $donnee=$resq->fetchAll();
        $resq->closeCursor();
        foreach ($donnee as $donnees)
        {
            $moto[]=new Moto ($donnees);
        }
        return $moto;
    }

    public function liste_kaiser()
    {
        $moto=[];
        $resq=$this->_db->query('SELECT * FROM moto WHERE marque="kaiser"');
        $donnee=$resq->fetchAll();
        $resq->closeCursor();
        foreach ($donnee as $donnees)
        {
            $moto[]=new Moto ($donnees);
        }
        return $moto;
    }

    public function delete($id)
    {
        $resq=$this->_db->exec("DELETE * FROM moto WHERE id=".$id);
        return $resq>0;
    }

    public function update(Moto $moto)
    {
        //echo $patient->getId();
         try{ 
                $sql=$this->_db->prepare('UPDATE moto SET cathegorie=:cathegorie,nom=:nom,marque=:marque,model=:model,cylindre=:cylindre,
                numero_seri=:numero_seri,prix=:prix WHERE id=:id');
                $d=$sql->execute(array('cathegorie'=>$moto->getCathegorie(),
                'marque'=>$moto->getMarque(),
                'model'=>$moto->getModel(),
                'cylindre'=>$moto->getCylindre(),
                'numero_seri'=>$moto->getNumero_seri(),
                'prix'=>$moto->getPrix(),
                'id'=>$moto->getId()
              ));  
         } catch (Exception $ex) {
             echo $ex->getMessage();
         }
       }
}