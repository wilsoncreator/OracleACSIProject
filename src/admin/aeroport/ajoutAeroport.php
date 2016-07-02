<?php
require_once('../../../Entity/connexion_db.php');
$bdd = connexion_db::getInstance();
session_start();

if($_SESSION['admin'] == true) {
    //echo 'OK';
    if(isset($_POST['aeroport']) && isset($_POST['destination_name'])){
        try {
            $req = $bdd->exec("INSERT INTO aeroport (id_dest, libelle_aero) VALUES ('" . $_POST['destination_name'] . "','" . $_POST['aeroport'] . "' )");
            echo 'aeroport ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de l\' aeroport '.$ex->getMessage().$_POST['destination_name'];
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
            <li ><a href="http://localhost/OracleACSIProject/src/admin/destination/ajoutDestination.php">Destination</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/compagnie/ajoutCompagnie.php">Compagnie</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/vol/ajoutVol.php">Vol</a></li>
            <li class="active"><a href="http://localhost/OracleACSIProject/src/admin/aeroport/ajoutAeroport.php">Aeroport</a></li>
        </ul>
    </div>
</nav>

<form  method="post" action="">
    <h1>Ajouter Aeroport</h1>
    <input type="text" class="form-control" placeholder="Nom aeroport" name="aeroport" required><br>
    <select name="destination_name" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM destination');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_dest'].">".$data['libelle_dest']."</option>";
        }
        ?>
    </select><br><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>