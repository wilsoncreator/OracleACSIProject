<?php

class reserve
{
    var $user;
    var $vol;

    /**
     * reserve constructor.
     * @param $user
     * @param $vol
     */
    public function __construct($user, $vol)
    {
        $this->user = $user;
        $this->vol = $vol;
    }

    function addReserve($user, $vol){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO reserve (id_vol, id_usr) VALUES (" . $vol . ", " . $user . ")");
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


}