<?php
require_once('../../Entity/connexion_db.php');
session_start();

if($_SESSION['admin'] == true){
    echo 'OK';

    if(isset($_POST['compagnie'])){
        try {
            $req = $bdd->exec("INSERT INTO compagnie (libelle_comp) VALUES ('" . $_POST['compagnie'] . "')");
            echo 'compagnie ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la compagnie' .$ex->getMessage();
        }
    }

    else if(isset($_POST['destination']) && isset($_POST['destination_descr'])){
        try {
            $req = $bdd->exec("INSERT INTO destination (libelle_dest, description_dest) VALUES ('" . $_POST['destination'] . "','" . $_POST['destination_descr'] . "' )");
            echo 'destination ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la destination' .$ex->getMessage();
        }
    }

    else if(isset($_POST['aeroport']) && isset($_POST['destination_aero'])){
        try {
            $req = $bdd->exec("INSERT INTO aeroport (libelle_dest, description_dest) VALUES ('" . $_POST['destination'] . "','" . $_POST['destination_descr'] . "' )");
            echo 'destination ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la destination' .$ex->getMessage();
        }
    }
}

else {
    echo 'KO';
}

?>


<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form  method="post" action="">
    <h1>Ajouter compagnie</h1>
    <input type="text" class="form-control" placeholder="Nom compagnie" name="compagnie" required><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>

<form  method="post" action="">
    <h1>Ajouter Destination</h1>
    <input type="text" class="form-control" placeholder="Nom Destionation" name="destination" required><br>
    <textarea class="form-control" name="destination_descr" rows="3" placeholder="Description" required></textarea><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>


</body>
</html>
