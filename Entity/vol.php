<?php


class vol
{
    var $id;
    var $prix;
    var $depart;
    var $arrivee;
    var $nbplaces;
    var $nbcorresp;
    var $compagnie;
    var $destination;
    var $aerodepart;
    var $aeroarrive;

    /**
     * vol constructor.
     * @param $prix
     * @param $depart
     * @param $arrivee
     * @param $nbplaces
     * @param $nbcorresp
     * @param $compagnie
     * @param $destination
     * @param $aerodepart
     * @param $aeroarrive
     */
    public function __construct($prix, $depart, $arrivee, $nbplaces, $nbcorresp, $compagnie, $destination, $aerodepart, $aeroarrive)
    {
        $this->prix = $prix;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
        $this->nbplaces = $nbplaces;
        $this->nbcorresp = $nbcorresp;
        $this->compagnie = $compagnie;
        $this->destination = $destination;
        $this->aerodepart = $aerodepart;
        $this->aeroarrive = $aeroarrive;
    }

    function addVol($prix, $depart, $arrivee, $nbplaces, $nbcorresp, $compagnie, $destination, $aerodepart, $aeroarrive){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO vol (prix_vol, date_depart, date_arrivee, nb_places_vol, nb_corresp_vol, id_comp, id_dest, id_aero, id_aero_AEROPORT) VALUES (".$prix.",'".$depart."','".$arrivee."',".$nbplaces.",'".$nbcorresp."',".$compagnie.",".$destination.",".$aerodepart.",".$aeroarrive.")");
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
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * @param mixed $depart
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }

    /**
     * @return mixed
     */
    public function getArrivee()
    {
        return $this->arrivee;
    }

    /**
     * @param mixed $arrivee
     */
    public function setArrivee($arrivee)
    {
        $this->arrivee = $arrivee;
    }

    /**
     * @return mixed
     */
    public function getNbplaces()
    {
        return $this->nbplaces;
    }

    /**
     * @param mixed $nbplaces
     */
    public function setNbplaces($nbplaces)
    {
        $this->nbplaces = $nbplaces;
    }

    /**
     * @return mixed
     */
    public function getNbcorresp()
    {
        return $this->nbcorresp;
    }

    /**
     * @param mixed $nbcorresp
     */
    public function setNbcorresp($nbcorresp)
    {
        $this->nbcorresp = $nbcorresp;
    }

    /**
     * @return mixed
     */
    public function getCompagnie()
    {
        return $this->compagnie;
    }

    /**
     * @param mixed $compagnie
     */
    public function setCompagnie($compagnie)
    {
        $this->compagnie = $compagnie;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param mixed $destination
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return mixed
     */
    public function getAerodepart()
    {
        return $this->aerodepart;
    }

    /**
     * @param mixed $aerodepart
     */
    public function setAerodepart($aerodepart)
    {
        $this->aerodepart = $aerodepart;
    }

    /**
     * @return mixed
     */
    public function getAeroarrive()
    {
        return $this->aeroarrive;
    }

    /**
     * @param mixed $aeroarrive
     */
    public function setAeroarrive($aeroarrive)
    {
        $this->aeroarrive = $aeroarrive;
    }



}