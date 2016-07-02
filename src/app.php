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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../css/accueil.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">AEROLines</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Me connecter</a></li>
                        <li><a href="#about">À propos</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Divers<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Activités sur place</a></li>
                                <li><a href="#">Bons plans</a></li>
                                <li><a href="#">Où partir ?</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Profil</li>
                                <li><a href="#">Déconnexion</a></li>
                                <li><a href="#">Mes commandes</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="img/slide/stonehenge.jpg" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Pas encore inscrit ?</h1>
                    <p>Enregistrez-vous dès maintenant et profitez de nos offres promotionnelles. </br> Simple et efficace !</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Inscrivez-vous</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="img/slide/Sydney-Opera-House-18.jpg" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Le voyage le plus attendu de la semaine</h1>
                    <p>Découvrez la destination actuelle que les vacanciers préfèrent choisir !</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Lire la suite</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="img/slide/8f97386e1b3a43ab23b3810c5a27d098_large.jpeg" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Le hit parade des destinations</h1>
                    <p>Informez-vous sur le top 10 des voyages les plus sélectionnés du moment !</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Top destinations</a></p>
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

    $destinations = $bdd->query("SELECT * FROM destination;");
    while($dest = $destinations->fetch()){
        echo("<div class=\"col-lg-4\">
            <img class=\"img-circle\" src=\"".$dest["image_dest"]."\" alt=\"Generic placeholder image\" width=\"140\" height=\"140\">
            <h2>".$dest["libelle_dest"]."</h2>
            <p>".$dest["description_dest"]."</p>
            <p><a class=\"btn btn-default\" href=\"#\" role=\"button\">Voir détails &raquo;</a></p>
        </div><!-- /.col-lg-4 -->");
    }
    ?>

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
