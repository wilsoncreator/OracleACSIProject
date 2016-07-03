<?php

class reserve
{
    var $user;
    var $vol;
    var $nbplaces;
    var $prixtotal;

    /**
     * reserve constructor.
     * @param $user
     * @param $vol
     * @param $nbplaces
     */
    public function __construct($user, $vol, $nbplaces, $prixtotal)
    {
        $this->user = $user;
        $this->vol = $vol;
        $this->nbplaces = $nbplaces;
        $this->prixtotal = $prixtotal;
    }


    function addReserve($user, $vol, $nbplaces, $prixtotal){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO reserve (id_vol, id_usr, nbplaces, prixtotal) VALUES (" . $vol . ", " . $user . ", " . $nbplaces . ", " . $prixtotal . ")");
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getVol()
    {
        return $this->vol;
    }

    /**
     * @param mixed $vol
     */
    public function setVol($vol)
    {
        $this->vol = $vol;
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
    public function getPrixtotal()
    {
        return $this->prixtotal;
    }

    /**
     * @param mixed $prixtotal
     */
    public function setPrixtotal($prixtotal)
    {
        $this->prixtotal = $prixtotal;
    }


}