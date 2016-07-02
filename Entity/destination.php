<?php

class destination
{
    var $id;
    var $nom;
    var $photo;
    var $description;

    /**
     * destination constructor.
     * @param $nom
     * @param $photo
     * @param $description
     */
    public function __construct($nom, $photo, $description)
    {
        $this->nom = $nom;
        $this->photo = $photo;
        $this->description = $description;
    }

    function addDestination($nom, $photo, $description){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO destination (libelle_dest, description_dest, image_dest) VALUES ('".$nom."','".$description."','".$photo."')");
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

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}