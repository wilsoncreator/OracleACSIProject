<?php

session_start();
if(!isset($_SESSION["ID"])){
    session_destroy();
}

if(isset($_POST["id_aero"]) && isset($_POST["nbplaces"])){
    header("location:front/liste-vols.php?id_aero=".$_POST["id_aero"]."&places=".$_POST["nbplaces"]);
}

require_once('../Entity/connexion_db.php');

$bdd = connexion_db::getInstance();
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
    <link rel="icon" href="/OracleACSIProject/resources/images/logo.png">

    <title>AeroLines</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--  <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../css/aero.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<?php include('front/navbar.php'); ?>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" ></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
        <div class="item ">
            <img class="first-slide" src="../resources/images/inscription.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Pas encore inscrit ?</h1>
                    <p>Enregistrez-vous dès maintenant et profitez de nos offres promotionnelles. </br> Simple et efficace !</p>
                    <p><a class="btn btn-lg btn-primary" href="front/inscription.php" role="button">Inscrivez-vous</a></p>
                </div>
            </div>
        </div>



        <div class="item active">
            <img class="second-slide" src="../resources/images/photo.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Bons plans du moment</h1>
                    <p>Partez en voyage pour moins de 100€ !</p>
                    <p>Choisissez votre lieu de départ</p>
                    <form method="post">
                    <select name="id_aero" id="sel1" class="form-control">
                        <?php

                        $list = $bdd->query('SELECT * FROM aeroport');
                        while ($data = $list->fetch()) {
                            $destination = $bdd->query("SELECT libelle_dest FROM destination WHERE id_dest = ".$data['id_aero'].";");
                            $dest = $destination->fetch();
                            echo "<option value =".$data['id_aero'].">".$dest["libelle_dest"]." - ".$data['libelle_aero']."</option>";
                        }
                        ?>
                    </select><br><br>
                        <input type="number" class="form-control" placeholder="Nombre de passagers" name="nbplaces" required><br>

                        <p><button type="submit" class="btn btn-lg btn-primary" role="button">Rechercher</button></p>
                    </form>
                </div>
            </div>
        </div>
        <div class="item">
            <?php
            $destination = $bdd->query("SELECT image_dest FROM destination ORDER BY nbreservation DESC LIMIT 1");
            $dest = $destination->fetch();
            echo("<img class=\"third-slide\" src=\"".$dest["image_dest"]."\" alt=\"Third slide\">");
            ?>

            <div class="container">
                <div class="carousel-caption">
                    <h1>Le hit parade des destinations</h1>
                    <p>Informez-vous sur le top 5 des voyages les plus prisés !</p>

                    <p><a class="btn btn-lg btn-primary" href="front/top-destinations.php" role="button">Top destinations</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <div class="row">
    <!-- Three columns of text below the carousel -->
    <?php
    require_once('../Entity/connexion_db.php');

    $bdd = connexion_db::getInstance();

    $destinations = $bdd->query("SELECT * FROM destination ORDER BY nbvue DESC;");
    while($dest = $destinations->fetch()){
        echo("<div class=\"col-lg-4 index-dest\">
            <img class=\"img-circle\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\" width=\"140\" height=\"140\">
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".substr($dest["description_dest"],0,250)."...</p>
            <p><a class=\"btn btn-default\" href=\"front/destination.php?destination_id=".$dest["id_dest"]."\" role=\"button\">Voir détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->");
    }
    ?>
</div>
    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>
        <!-- <p class="pull-right"><a href="#"><img class="pull-arrow" src="img/1564-1626-thickbox.jpg" alt="Pull arrow"></a></p> -->
        <p>&copy; 2016 ROSSIGNOL - MORENO - BARDEL &middot;</p>
    </footer>

</div><!-- /.container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../resources/scripts/jquery.min.js"><\/script>')</script>
<script src="../resources/scripts/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
