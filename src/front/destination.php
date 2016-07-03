<!DOCTYPE html>
<?php
if(empty($_GET['destination_id'] )||!isset($_GET['destination_id'])){
    header("location:../index.php");
}

require_once('../../Entity/connexion_db.php');

$bdd = connexion_db::getInstance();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>AeroLines</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--  <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../../css/aero.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<?php include('navbar.php'); ?>

<div class="dest-img-container">
    <?php

    $destination = $bdd->query("SELECT image_dest FROM destination WHERE id_dest =".$_GET['destination_id'].";");
    $dest = $destination->fetch();
    echo("
    <img class=\"dest-img\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\">");
    ?>
</div>

<div class="container marketing">

    <div class="row">
        <div class="col-lg-4 destination">
            <?php
            $destination = $bdd->query("SELECT * FROM destination WHERE id_dest =".$_GET['destination_id'].";");
            $dest = $destination->fetch();
            echo("
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".$dest["description_dest"]."</p>
            <br>"); ?>
            <h3>Vols disponibles</h3>
            <table class="table table-striped dest-table">
                <tr>
                    <th></th>
                    <th>Départ</th>
                    <th>Aéroport de départ</th>
                    <th>Arrivée</th>
                    <th>Aéroport d'arrivée</th>
                    <th>Places restantes</th>
                    <th>Prix</th>
                    <th></th>
                </tr>
                <!-- Là il faut boucler sur tous les vols pour la destination -->
                <?php

                $vols = $bdd->query("SELECT * FROM vol WHERE id_dest=".$_GET['destination_id'].";");
                while($vol = $vols->fetch()) {
                    $compagnie_logo = $bdd->query("SELECT logo_comp FROM COMPAGNIE WHERE id_comp=".$vol["id_comp"].";");
                    $compagnie=$compagnie_logo->fetch();
                    $aero_depart = $bdd->query("SELECT libelle_aero FROM AEROPORT WHERE id_aero=".$vol["id_aero"].";");
                    $aero_dep = $aero_depart->fetch();
                    $aero_arrivee = $bdd->query("SELECT libelle_aero FROM AEROPORT WHERE id_aero=".$vol["id_aero_AEROPORT"].";");
                    $aero_arr = $aero_arrivee->fetch();
                    echo("
                    <tr >
                    <td ><img class=\"dest-logo\" src = \"".$compagnie["logo_comp"]."\" ></td >
                    <td >".$vol["date_depart"]."</td >
                    <td >".$aero_dep["libelle_aero"]."</td >
                    <td >".$vol["date_arrivee"]."</td >
                    <td >".$aero_arr["libelle_aero"]."</td >
                    <td >".$vol["nb_places_vol"]."</td >
                    <td >".$vol["prix_vol"]."€</td >
                    <td >
                        <form action = \"vol.php\" >
                            <input type = \"submit\" value = \"Réserver\" >
                        </form >
                    </td >
                </tr >");
                }
?>
            </table>

        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>
        <!-- <p class="pull-right"><a href="#"><img class="pull-arrow" src="img/1564-1626-thickbox.jpg" alt="Pull arrow"></a></p> -->
        <p>&copy; 2015 Company, Inc. &middot; <a href="#">Termes</a> &middot; <a href="#">Conditions générales d'utilisation</a></p>
    </footer>

</div><!-- /.container -->

