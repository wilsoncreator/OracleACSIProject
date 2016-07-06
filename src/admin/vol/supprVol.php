<?php

require_once('../../../Entity/connexion_db.php');
session_start();
$bdd = connexion_db::getInstance();

if($_SESSION['admin'] == true && isset($_GET["id_vol"])){

        $bdd->exec("DELETE FROM vol WHERE id_vol=".$_GET["id_vol"].";");

    header('location:vol-liste.php');


}

else {
    header('location: ../../index.php');
}