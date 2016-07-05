<?php
session_start();
if(!isset($_SESSION["ID"])){
    session_destroy();
    header("location:../index.php");
}

require_once('../../Entity/connexion_db.php');

$bdd = connexion_db::getInstance();

    $reserve = $bdd->query("SELECT * FROM reserve WHERE id_usr = ".$_SESSION["ID"].";");




?>
<!DOCTYPE html>
<html lang="fr">
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

<div class="container marketing">

    <div class="row">
        <div class="col-lg-4 destination liste-vols">
            <h2 class="titre">Mes réservations</h2>
            <table class="table table-striped dest-table">
                <tr>
                    <th></th>
                    <th>Départ</th>
                    <th>Aéroport de départ</th>
                    <th>Arrivée</th>
                    <th>Aéroport d'arrivée</th>
                    <?php
                    if (isset($_GET["datedep"]) && isset($_GET["aerodep"]) && isset($_GET["aeroarr"]) && isset($_GET["places"]) && isset($_GET["prix"])){
                        echo("<th>Places restantes</th>");
                    }

                    else{
                        echo("<th>Billets achetés</th>");
                    }
                    ?>

                    <th>Prix</th>
                    <th></th>
                </tr>
                <!-- Là il faut boucler sur les vols qu'on veut -->
                <?php
            while($reservations = $reserve->fetch()){
                $vols = $bdd->query("SELECT * FROM vol WHERE id_vol = ".$reservations["id_vol"].";");
                $vol = $vols->fetch();

                        $compagnie_logo = $bdd->query("SELECT logo_comp FROM COMPAGNIE WHERE id_comp=" . $vol["id_comp"] . ";");
                        $compagnie = $compagnie_logo->fetch();
                        $aero_depart = $bdd->query("SELECT libelle_aero FROM AEROPORT WHERE id_aero=" . $vol["id_aero"] . ";");
                        $aero_dep = $aero_depart->fetch();
                        $aero_arrivee = $bdd->query("SELECT libelle_aero FROM AEROPORT WHERE id_aero=" . $vol["id_aero_AEROPORT"] . ";");
                        $aero_arr = $aero_arrivee->fetch();
                        echo("
                <tr >
                    <td ><img class=\"dest-logo\" src = \"" . $compagnie["logo_comp"] . "\" ></td >
                    <td >" . $vol["date_depart"] . "</td >
                    <td >" . $aero_dep["libelle_aero"] . "</td >
                    <td >" . $vol["date_arrivee"] . "</td >
                    <td >" . $aero_arr["libelle_aero"] . "</td >
                    <td >" . $reservations["nbplaces"] . "</td >
                    <td >" . $reservations["prixtotal"] . "€</td >
                    <td >
                        
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
        <p>&copy; 2016 ROSSIGNOL - MORENO - BARDEL &middot;</p>
    </footer>

</div><!-- /.container -->