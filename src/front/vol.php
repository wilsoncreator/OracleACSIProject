<?php

session_start();
if(!isset($_SESSION["ID"])){
    session_destroy();
    header("location:connection.php");
}

if(empty($_GET['id_vol'] )||!isset($_GET['id_vol'])){
    header("location:../index.php");
}



require_once('../../Entity/connexion_db.php');
require_once('../../Entity/reserve.php');
require_once('../../Entity/vol.php');

$bdd = connexion_db::getInstance();

$vols = $bdd->query("SELECT * FROM vol WHERE id_vol =".$_GET['id_vol'].";");
$vol = $vols->fetch();
if(!isset($vol["id_vol"])){
    header("location:../index.php");
}

if(isset($_POST["nb_places"])){
    $vols = $bdd->query("SELECT nb_places_vol, id_vol, prix_vol, id_dest FROM vol WHERE id_vol=".$_GET['id_vol'].";");
    $vol = $vols->fetch();
    if($_POST["nb_places"] <= $vol["nb_places_vol"]) {
        $reservation = new reserve($_SESSION['ID'], $_GET['id_vol'], $_POST["nb_places"], $vol["prix_vol"] * $_POST["nb_places"]);
        $reservation->addReserve($reservation->getUser(), $reservation->getVol(), $reservation->getNbplaces(), $reservation->getPrixtotal());
        $nbplaces = $vol["nb_places_vol"] - $_POST["nb_places"];
        $bdd->exec("UPDATE vol SET nb_places_vol = " . $nbplaces . " WHERE id_vol = " . $_GET['id_vol'] . ";");
        $bdd->exec("UPDATE destination SET nbreservation = nbreservation+1 WHERE id_dest=" . $vol['id_dest'] . ";");
    }

    else {
        echo("<script>alert(\"Il n\'y a plus assez de places sur ce vol\")</script>");
    }
}
?>

<!DOCTYPE html>
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
    $vols = $bdd->query("SELECT id_dest FROM vol WHERE id_vol=".$_GET['id_vol'].";");
    $vol = $vols->fetch();
    $destination = $bdd->query("SELECT image_dest, nbreservation FROM destination WHERE id_dest=".$vol['id_dest'].";");
    $dest = $destination->fetch();

    echo("<img class=\"dest-img\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\">");
?>
</div>

<div class="container marketing">

    <div class="row">
        <div class="col-lg-4 destination">
            <h2>Résumé du vol</h2>
            <table class="table table-striped dest-table">
                <tr>
                    <th></th>
                    <th>Départ</th>
                    <th>Aéroport de départ</th>
                    <th>Arrivée</th>
                    <th>Aéroport d'arrivée</th>
                    <th>Places restantes</th>
                    <th>Prix unitaire</th>
                </tr>
                <?php

                    $vols = $bdd->query("SELECT * FROM vol WHERE id_vol=".$_GET['id_vol'].";");
                    $vol = $vols->fetch();
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
                </tr >");

                ?>
            </table>

            <form method="post">
                <table class="reserv-table">
                    <tr>
                        <td>
                            <label for="nb_places">Nombre de places : </label>
                            <select id="nb_places" name="nb_places">
                            <?php

                            for($i = 1; $i <= $vol["nb_places_vol"]; $i++){
                                echo("<option value=".$i.">".$i."</option>");
                            }
                            ?>
                            </select>
                        </td>
                        <td>
                            <?php
                            echo("<input onclick=\"if(!confirm('Voulez-vous confirmer votre réservation pour ce vol ?')) return false;\" type=\"submit\" value=\"Réserver\">");
                            ?>
                        </td>
                    </tr>
                </table>
            </form>

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