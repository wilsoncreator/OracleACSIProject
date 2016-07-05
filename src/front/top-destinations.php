<?php

session_start();
if(!isset($_SESSION["ID"])){
    session_destroy();
}
require_once('../../Entity/connexion_db.php');

$bdd = connexion_db::getInstance();
$i = 0;
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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
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


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <div class="row dest-row">

        <h2>Destinations les plus visitées</h2>
        <?php

        $destinations = $bdd->query("SELECT * FROM destination ORDER BY nbreservation DESC LIMIT 5;");
        $i = 1;
        while($dest = $destinations->fetch()){
            if($i == 1){
        echo("<div class=\"col-lg-4 top-destination dest-1\">
            <h1 class=\"top-destination-titre\">1</h1>
            <img class=\"img-circle dest-top-img\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\" width=\"200\" height=\"200\">
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".substr($dest["description_dest"],0,100)."...</p>
            <p><a href=\"destination.php?destination_id=".$dest["id_dest"]."\" class=\"btn btn-default\">Voir détails</a></p>
        </div><!-- /.col-lg-4 -->");}

            if($i == 2){
                echo("<div class=\"col-lg-4 top-destination dest-2\">
            <h1 class=\"top-destination-titre\">2</h1>
            <img class=\"img-circle\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\" width=\"200\" height=\"200\">
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".substr($dest["description_dest"],0,100)."...</p>
            <p><a href=\"destination.php?destination_id=".$dest["id_dest"]."\" class=\"btn btn-default\">Voir détails</a></p>
        </div><!-- /.col-lg-4 -->");}

            if($i == 3){
                echo("<div class=\"col-lg-4 top-destination dest-3\">
            <h1 class=\"top-destination-titre\">3</h1>
            <img class=\"img-circle\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\" width=\"200\" height=\"200\">
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".substr($dest["description_dest"],0,100)."...</p>
            <p><a href=\"destination.php?destination_id=".$dest["id_dest"]."\" class=\"btn btn-default\">Voir détails</a></p>
        </div><!-- /.col-lg-4 -->");}

            if($i == 4){
                echo("<div class=\"col-lg-4 top-destination dest-4\">
            <h1 class=\"top-destination-titre\">4</h1>
            <img class=\"img-circle\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\" width=\"200\" height=\"200\">
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".substr($dest["description_dest"],0,100)."...</p>
            <p><a href=\"destination.php?destination_id=".$dest["id_dest"]."\" class=\"btn btn-default\">Voir détails</a></p>
        </div><!-- /.col-lg-4 -->");}

        if($i == 5){
            echo("<div class=\"col-lg-4 top-destination dest-5\">
            <h1 class=\"top-destination-titre\">5</h1>
            <img class=\"img-circle\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\" width=\"200\" height=\"200\">
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".substr($dest["description_dest"],0,100)."...</p>
            <p><a href=\"destination.php?destination_id=".$dest["id_dest"]."\" class=\"btn btn-default\">Voir détails</a></p>
        </div><!-- /.col-lg-4 -->");} $i++;}
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../resources/scripts/jquery.min.js"><\/script>')</script>
    <script src="../resources/scripts/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <!-- <script src="../../assets/js/vendor/holder.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
