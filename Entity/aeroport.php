<?php

class aeroport
{

    var $id;
    var $libelle;
    var $dest;

    /**
     * aeroport constructor.
     * @param $libelle
     * @param $dest
     */
    public function __construct($libelle, $dest)
    {
        $this->libelle = $libelle;
        $this->dest = $dest;
    }

    function addAeroport($libelle, $dest){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO aeroport (libelle_aero, id_dest) VALUES ('" . $libelle . "'," . $dest . ")");
    }

    function updateAeroport($libelle, $id){
        $bdd = connexion_db::getInstance();
        $bdd->exec("UPDATE aeroport SET libelle_aero='".$libelle."' WHERE id_aero =".$id.";");
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param mixed $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getDest()
    {
        return $this->dest;
    }

    /**
     * @param mixed $dest
     */
    public function setDest($dest)
    {
        $this->dest = $dest;
    }
}