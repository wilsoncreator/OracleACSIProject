<?php
session_start();
if(!isset($_SESSION["ID"])){
    session_destroy();
}
require_once('../../Entity/connexion_db.php');

$bdd = connexion_db::getInstance();

if (isset($_POST["date_dep"]) && isset($_POST["aero_dep"]) && isset($_POST["aero_arr"]) && isset($_POST["nbplaces"]) && isset($_POST["prixmax"]))
{
    header("location:liste-vols.php?datedep=".$_POST["date_dep"]."&aerodep=".$_POST["aero_dep"]."&aeroarr=".$_POST["aero_arr"]."&places=".$_POST["nbplaces"]."&prix=".$_POST["prixmax"]."");
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
     <link rel="icon" href="/OracleACSIProject/resources/images/logo.png">

    <title>Aerolines</title>

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

    <!-- Formulaire -->
    <div id="Création_compte" class="inscr-div">
        <h2>Rechercher un vol</h2>

        <form method="post" action="">
            <table class="table inscr-table">
                <tr>
                    <td><label for="login">Date de depart</label></td>
                    <td>
                        <input type="date" class="form-control" placeholder="Date de départ" name="date_dep" required><br>
                    </td>
                </tr>
                <tr>
                    <td><label for="login">Aéroport de départ</label></td>
                    <td>
                        <select name="aero_dep" id="sel1" class="form-control">
                            <?php

                            $list = $bdd->query('SELECT * FROM aeroport');
                            while ($data = $list->fetch()) {
                                echo "<option value =".$data['id_aero'].">".$data['libelle_aero']."</option>";
                            }
                            ?>
                        </select><br><br>
                    </td>
                </tr>

                <tr>
                    <td><label for="login">Destination</label></td>
                    <td>
                        <select name="aero_arr" id="sel1" class="form-control">
                            <?php

                            $list = $bdd->query('SELECT * FROM aeroport');
                            while ($data = $list->fetch()) {
                                echo "<option value =".$data['id_aero'].">".$data['libelle_aero']."</option>";
                            }
                            ?>
                        </select><br><br>
                    </td>
                </tr>

                <tr>
                    <td><label for="login">Nombre de voyageurs</label></td>
                    <td>
                        <input type="number" class="form-control" placeholder="Nombre de passagers" name="nbplaces" required><br>
                    </td>
                </tr>

                <tr>
                    <td><label for="login">Prix max/billets</label></td>
                    <td>
                        <input type="number" class="form-control" placeholder="Prix maximum/billets" name="prixmax" required><br>
                    </td>
                </tr>

                <tr id="cellule_bouton">
                    <td style="padding-top: 25px;">
                    </td>
                    <td style="padding-top: 25px;">
                        <input type="submit" name="valider" class="bouton_submit" value="Rechercher">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- FOOTER -->
    <footer>
        <!-- <p class="pull-right"><a href="#"><img class="pull-arrow" src="img/1564-1626-thickbox.jpg" alt="Pull arrow"></a></p> -->
        <p>&copy; 2016 ROSSIGNOL - MORENO - BARDEL &middot;</p>
    </footer>

</div><!-- /.container -->

</body>
</html>