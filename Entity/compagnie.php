<?php
class compagnie
{

    var $id;
    var $nom;

    function addCompagnie($nom){
        $bdd = connexion_db::getInstance();
        $bdd->exec("INSERT INTO compagnie (libelle_comp) VALUES ('" . $nom . "')");
    }
}