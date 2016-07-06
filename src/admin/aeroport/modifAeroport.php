<?php
require_once('../../../Entity/connexion_db.php');
require_once('../../../Entity/aeroport.php');
session_start();
$bdd = connexion_db::getInstance();

if($_SESSION['admin'] == true && isset($_GET["aero_id"])) {
    //echo 'OK';

    $modif = $bdd->query("SELECT * FROM aeroport WHERE id_aero =".$_GET["aero_id"].";");
    $aero = $modif->fetch();

    if(isset($_POST['aeroport']) ){
        try {
            $aeroport = new aeroport(addslashes($_POST['aeroport']), $aero["id_dest"]);
            $aeroport->updateAeroport($aeroport->getLibelle(), $aeroport->getDest(),$aeroport->getId());
            header("location:aeroport-liste.php");
        }

        catch(Exception $ex){
            echo 'erreur lors de la modification de l\' aeroport' .$ex->getMessage();
        }
    }


}

else {
    header('location: ../../index.php');
} ?>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<?php include('../navbar.html'); ?>


<form  method="post" action="">

    <?php
    echo("
    <h1>Modifier Aeroport ".$aero["libelle_aero"]."</h1>
    <input type=\"text\" class=\"form-control\" placeholder=\"Nom aeroport\" name=\"aeroport\" value=\"".$aero["libelle_aero"]."\" required><br>
    
     ");

    ?>


    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Modifier</button>
</form>