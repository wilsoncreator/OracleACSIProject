<?php

require_once('../../../Entity/connexion_db.php');
session_start();
$bdd = connexion_db::getInstance();

if($_SESSION['admin'] == true && isset($_GET["comp_id"])){

    $compagnie = $bdd->query("SELECT * FROM compagnie WHERE id_comp=".$_GET["comp_id"].";");
    $comp = $compagnie->fetch();
    $bdd->exec("DELETE FROM vol WHERE id_comp=".$comp["id_comp"].";");
    $bdd->exec("DELETE FROM compagnie WHERE id_comp=".$_GET["comp_id"].";");
    header('location:compagnie-liste.php');


}

else {
    header('location: ../../index.php');
}