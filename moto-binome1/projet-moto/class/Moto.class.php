<?php
class Moto
{
    private $id;
    private $cathegorie;
    private $marque;
    private $model;
    private $cylindre;
    private $numero_seri;
    private $prix;

    // Appel du constructeur
 
    public function __construct(array $donnee){

        foreach ($donnee as $key => $value) {
    
            $methode='set'.ucfirst($key);
            
            if((method_exists($this,$methode))){
              $this->$methode($value);
            }
        }
      }
     
    // Liste des getters

    public function getId()
    {
        return $this->id;
    }
    public function getCathegorie()
    {
        return $this->cathegorie;
    }
    public function getMarque()
    {
        return $this->marque;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getCylindre()
    {
        return $this->cylindre;
    }
    public function getNumero_seri()
    {
        return $this->numero_seri;
    }
    public function getPrix()
    {
        return $this->prix;
    }

    // Liste des setters

    public function setId($id)
    {
        $this->id=$id;
    }
    public function setCathegorie($cathegorie)
    {
        $this->cathegorie=$cathegorie;
    }
    public function setMarque($marque)
    {
        $this->marque=$marque;
    }
    public function setModel($model)
    {
        $this->model=$model;
    }
    public function setCylindre($cylindre)
    {
        $this->cylindre=$cylindre;
    }
    public function setNumero_seri($numero_seri)
    {
        $this->numero_seri=$numero_seri;
    }
    public function setPrix($prix)
    {
        $this->prix=$prix;
    }
}