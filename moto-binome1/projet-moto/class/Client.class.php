<?php
class client
{
    private _$id;
    private _$nom;
    private _$prenom;
    private _$cnib;

    public function getId()
    {
        return $this->_id;
    }
    public function getNom()
    {
        return $this->_nom;
    }
    public function getPrenom()
    {
        return $this->_prenom;
    }
    public function getCnib()
    {
        return $this->_cnib;
    }

    public function setId($id)
    {
        $this->_id=$id;
    }
    public function setNom($nom)
    {
        $this->_nom=$nom;
    }
    public function setPrenom($prenom)
    {
        $this->_prenom=$prenom;
    }
    public function setCnib($cnib)
    {
        $this->_cnib=$cnib;
    }
}    