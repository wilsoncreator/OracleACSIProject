<?php
class compagnie
{

    var $id;
    var $nom;

    /**
     * compagnie constructor.
     * @param $nom
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    function addCompagnie($nom){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO compagnie (libelle_comp) VALUES ('" . $nom . "')");
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