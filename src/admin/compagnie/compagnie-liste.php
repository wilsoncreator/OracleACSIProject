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
            <p><a class="btn btn-default" href="ajoutCompagnie.php" role="button">Ajouter compagnie &raquo;</a></p>
            <table class="table table-striped dest-table">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th></th>
                    <th></th>
                </tr>
                <!-- Là il faut boucler sur les vols qu'on veut -->
                <?php
                $compagnie = $bdd->query("SELECT * FROM compagnie ORDER BY id_comp ASC");
                while($comp = $compagnie->fetch()) {
                    echo("
                <tr >
                    <td >" . $comp["id_comp"] . "</td >
                    <td >" . $comp["libelle_comp"] . "</td >
                    <td >            <p><a class=\"btn btn-default\" href=\"supprCompagnie.php?comp_id=".$comp["id_comp"]."\" role=\"button\">Supprimer &raquo;</a></p>
</td >
                    <td >            <p><a class=\"btn btn-default\" href=\"modifCompagnie.php?comp_id=".$comp["id_comp"]."\" role=\"button\">Modifier &raquo;</a></p>
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
