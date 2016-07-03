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
    <img class="dest-img" src="http://escapesmagazine.info/wp-content/uploads/2014/08/lyon-immobilier-neuf-01.jpg" alt="Generic placeholder image">
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
                    <th>Prix</th>
                </tr>
                <tr>
                    <td><img class="dest-logo" src="http://www.pmdm.fr/wp/wp-content/uploads/2009/02/monogramme_copie.jpg"></td>
                    <td>05/07/2016 14:30</td>
                    <td>Paris-Orly</td>
                    <td>05/07/2016 15:40</td>
                    <td>Lyon-Saint-Exupery</td>
                    <td>132</td>
                    <td>150€</td>
                </tr>
            </table>

            <form>
                <table class="reserv-table">
                    <tr>
                        <td>
                            <label for="nb_places">Nombre de places : </label>
                            <select id="nb_places" name="nb_places">
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                            </select>
                        </td>
                        <td>
                            <input type="submit" value="Réserver">
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
        <p>&copy; 2015 Company, Inc. &middot; <a href="#">Termes</a> &middot; <a href="#">Conditions générales d'utilisation</a></p>
    </footer>

</div><!-- /.container -->