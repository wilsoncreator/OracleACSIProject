<?php
require_once('../../../Entity/connexion_db.php');
require_once('../../../Entity/compagnie.php');
session_start();

if($_SESSION['admin'] == true) {
    //echo 'OK';

    if(isset($_POST['compagnie']) && isset($_POST['logo'])){
        try {
            // $req = $bdd->exec("INSERT INTO compagnie (libelle_comp) VALUES ('" . $_POST['compagnie'] . "')");
            // echo 'compagnie ajoutée';
            $compagnie = new Compagnie($_POST['compagnie'], $_POST['logo']);
            $compagnie ->addCompagnie($compagnie->getNom(), $compagnie->getLogo());
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la compagnie' .$ex->getMessage();
        }
    }
}

else {
    header('location: ../../index.php');
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
            <li ><a href="http://localhost/OracleACSIProject/src/admin/destination/ajoutDestination.php">Destination</a></li>
            <li class="active"><a href="http://localhost/OracleACSIProject/src/admin/compagnie/ajoutCompagnie.php">Compagnie</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/vol/ajoutVol.php">Vol</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/aeroport/ajoutAeroport.php">Aeroport</a></li>
        </ul>
    </div>
</nav>

<!-- Ajout de compagnie -->

<form  method="post" action="">
    <h1>Ajouter compagnie</h1>
    <input type="text" class="form-control" placeholder="Nom compagnie" name="compagnie" required><br>
    <input type="text" class="form-control" placeholder="Logo compagnie" name="logo" required><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>