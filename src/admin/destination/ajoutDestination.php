<?php
require_once('../../../Entity/connexion_db.php');
session_start();

if($_SESSION['admin'] == true) {
    //echo 'OK';

    if(isset($_POST['destination']) && isset($_POST['destination_descr']) && isset($_POST['image']) ){
        try {
            $req = $bdd->exec("INSERT INTO destination (libelle_dest, description_dest, image_dest) VALUES ('" . $_POST['destination'] . "','" . $_POST['destination_descr'] . "','" . $_POST['image'] . "' )");
            echo 'destination ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la destination' .$ex->getMessage();
        }
    }
}

else {
    echo 'KO';
} ?>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="http://localhost/OracleACSIProject/src/admin/admin.php">Home</a></li>
            <li class="active"><a href="http://localhost/OracleACSIProject/src/admin/destination/ajoutDestination.php">Destination</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/compagnie/ajoutCompagnie.php">Compagnie</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/vol/ajoutVol.php">Vol</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/aeroport/ajoutAeroport.php">Aeroport</a></li>
        </ul>
    </div>
</nav>

<form  method="post" action="">
    <h1>Ajouter Destination</h1>
    <input type="text" class="form-control" placeholder="Nom Destination" name="destination" required><br>
    <textarea class="form-control" name="destination_descr" rows="3" placeholder="Description" required></textarea><br>
    <input type="text" class="form-control" placeholder="src image" name="image" required><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>