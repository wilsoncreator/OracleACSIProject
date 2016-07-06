<?php
class compagnie
{

    var $id;
    var $nom;
    var $logo;

    /**
     * compagnie constructor.
     * @param $nom
     * @param $logo
     */
    public function __construct($nom, $logo)
    {
        $this->nom = $nom;
        $this->logo = $logo;
    }


    function addCompagnie($nom, $logo){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO compagnie (libelle_comp, logo_comp) VALUES ('" . $nom . "', '" . $logo . "')");
    }

    function updateCompagnie($nom, $logo, $id){
        $bdd = connexion_db::getInstance();
        $bdd->exec("UPDATE compagnie SET libelle_comp='" . $nom . "', logo_comp='" . $logo ."' WHERE id_comp = ".$id.";");
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
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


}