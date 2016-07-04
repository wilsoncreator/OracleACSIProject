<?php
session_start();
if(!isset($_SESSION["ID"])){
    session_destroy();
    header("location:../index.php");
}

require_once('../../Entity/connexion_db.php');


$bdd = connexion_db::getInstance();

$utilisateur = $bdd->query("SELECT * FROM utilisateur WHERE id_usr = ".$_SESSION["ID"].";");
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
        <h2>Vos informations</h2>
        <?php
        $user = $utilisateur->fetch();

            echo("<table class=\"table inscr-table\">
                <tr>
                    <td><label>Civilité :</label></td>
                    <td>
                        <label>".$user["civilite_usr"]."</label><br>
                    </td>
                </tr>
                <tr>
                    <td><label>Nom :</label></td>
                    <td>
                        <label>".$user["nom_usr"]."</label><br>
                    </td>
                </tr>
                <tr>
                    <td><label>Prénom</label></td>
                    <td>
                        <label>".$user["prenom_usr"]."</label><br>
                    </td>
                </tr>

                <tr>
                    <td><label>Mail</label></td>
                    <td>
                        <label>".$user["mail_usr"]."</label><br>
                    </td>
                </tr>

                <tr>
                    <td><label>Date de naissance</label></td>
                    <td>
                        <label>".$user["date_naiss_usr"]."</label><br>
                    </td>
                </tr>
            </table>");
        ?>

    </div>

    <!-- FOOTER -->
    <footer>
        <!-- <p class="pull-right"><a href="#"><img class="pull-arrow" src="img/1564-1626-thickbox.jpg" alt="Pull arrow"></a></p> -->
        <p>&copy; 2016 ROSSIGNOL - MORENO - BARDEL &middot;</p>
    </footer>

</div><!-- /.container -->

</body>
</html>
