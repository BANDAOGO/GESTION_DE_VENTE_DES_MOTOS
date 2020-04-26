
<?php

class Moto
{
  private $idmoto;
  private $marque;
  private $modele;
  private $cylindre;
  private $prix;
  private $categorie;
  private $numeroDeSerie;
  private $couleur;

  // les getters

    public function getIdmoto()
    {
        return $this->idmoto;
    }

    public function getMarque()
    {
        return $this->marque;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function getCylindre()
    {
        return $this->cylindre;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getNumeroDeSerie()
    {
        return $this->numeroDeSerie;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    // les setters

    public function setIdmoto($idmoto)
    {
        $this->idmoto = $idmoto;
    }

    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    public function setCylindre($cylindre)
    {
        $this->cylindre = $cylindre;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function setNumeroDeSerie($numeroDeSerie)
    {
        $this->numeroDeSerie = $numeroDeSerie;
    }

    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    public function __construct(array $donnee){

      foreach ($donnee as $key => $value) {

          $methode='set'.ucfirst($key);
          
          if((method_exists($this,$methode))){
            $this->$methode($value);
          }
      }
    }
}


