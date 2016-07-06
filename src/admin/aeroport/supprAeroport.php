<?php

require_once('../../../Entity/connexion_db.php');
require_once('../../../Entity/destination.php');
session_start();
$bdd = connexion_db::getInstance();

if($_SESSION['admin'] == true && isset($_GET["aero_id"])){

    $aeroports = $bdd->query("SELECT * FROM aeroport WHERE id_aero=".$_GET["aero_id"].";");
    $aero = $aeroports->fetch();
    $bdd->exec("DELETE FROM vol WHERE id_aero=".$aero["id_aero"]." OR id_aero_AEROPORT=".$aero["id_aero"].";");
    $bdd->exec("DELETE FROM aeroport WHERE id_aero=".$_GET["aero_id"].";");
    header('location:aeroport-liste.php');


}

else {
    header('location: ../../index.php');
}