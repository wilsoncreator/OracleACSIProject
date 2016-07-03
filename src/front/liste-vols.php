<?php
session_start();
if(!isset($_SESSION["ID"])){
    session_destroy();
}
require_once('../../Entity/connexion_db.php');

$bdd = connexion_db::getInstance();

if (isset($_GET["datedep"]) && isset($_GET["aerodep"]) && isset($_GET["aeroarr"]) && isset($_GET["places"]) && isset($_GET["prix"]))
{

}
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
    <link href="../../resources/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../../resources/css/aero.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<?php include('navbar.php'); ?>

<div class="container marketing">

    <div class="row">
        <div class="col-lg-4 destination liste-vols">
            <h2>Vols disponibles</h2>
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
                <!-- Là il faut boucler sur les vols qu'on veut -->
                <tr>
                    <td><img class="dest-logo" src="http://www.pmdm.fr/wp/wp-content/uploads/2009/02/monogramme_copie.jpg"></td>
                    <td>05/07/2016 14:30</td>
                    <td>Paris-Orly</td>
                    <td>05/07/2016 15:40</td>
                    <td>Lyon-Saint-Exupery</td>
                    <td>132</td>
                    <td>150€</td>
                    <td>
                        <form action="vol.php">
                            <input type="submit" value="Réserver">
                        </form>
                    </td>
                </tr>
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