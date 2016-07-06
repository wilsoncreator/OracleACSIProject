<?php
require_once('../../../Entity/connexion_db.php');
session_start();
$bdd = connexion_db::getInstance();

if($_SESSION['admin'] == false){
    header('location: ../index.php');
}


?>


<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../css/aero.css">
    <meta charset="UTF-8">
    <title>administrateur</title>
</head>
<body>
<?php include('../navbar.html'); ?>

<div class="container marketing">

    <div class="row">
        <div class="col-lg-4 destination liste-vols">
            <h2 class="titre">Bienvenue dans l'interface administrateur</h2>
            <p><a class="btn btn-default" href="ajoutVol.php" role="button">Ajouter vol &raquo;</a></p>
            <table class="table table-striped dest-table">
                <tr>
                    <th>id</th>
                    <th>Compagnie</th>
                    <th>Départ</th>
                    <th>Aéroport de départ</th>
                    <th>Arrivée</th>
                    <th>Aéroport d'arrivée</th>
                    <th>Places restantes</th>
                    <th>Prix du vol</th>
                    <th></th>
                    
                </tr>
                <!-- Là il faut boucler sur les vols qu'on veut -->
                <?php
                $vols = $bdd->query("SELECT * FROM vol");
                while($vol = $vols->fetch()) {

                        $compagnie_logo = $bdd->query("SELECT logo_comp FROM COMPAGNIE WHERE id_comp=" . $vol["id_comp"] . ";");
                        $compagnie = $compagnie_logo->fetch();
                        $aero_depart = $bdd->query("SELECT libelle_aero FROM AEROPORT WHERE id_aero=" . $vol["id_aero"] . ";");
                        $aero_dep = $aero_depart->fetch();
                        $aero_arrivee = $bdd->query("SELECT libelle_aero FROM AEROPORT WHERE id_aero=" . $vol["id_aero_AEROPORT"] . ";");
                        $aero_arr = $aero_arrivee->fetch();
                        echo("
                <tr >
                    <td >" . $vol["id_vol"] . "</td >
                    <td ><img class=\"dest-logo\" src = \"" . $compagnie["logo_comp"] . "\" ></td >
                    <td >" . $vol["date_depart"] . "</td >
                    <td >" . $aero_dep["libelle_aero"] . "</td >
                    <td >" . $vol["date_arrivee"] . "</td >
                    <td >" . $aero_arr["libelle_aero"] . "</td >
                        <td >" . $vol["nb_places_vol"] . "</td >
                        <td >" . $vol["prix_vol"] . "€</td >
                        <td >            <p><a class=\"btn btn-default\" href=\"supprVol.php?id_vol=".$vol["id_vol"]."\" role=\"button\">Supprimer &raquo;</a></p>
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

</body>
</html>
