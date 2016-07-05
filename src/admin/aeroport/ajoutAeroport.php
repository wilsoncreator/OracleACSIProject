<?php
require_once('../../../Entity/connexion_db.php');
require_once('../../../Entity/aeroport.php');
$bdd = connexion_db::getInstance();
session_start();

if($_SESSION['admin'] == true) {
    //echo 'OK';
    if(isset($_POST['aeroport']) && isset($_POST['destination_name'])){
        try {
            $aeroport = new aeroport(addslashes($_POST['aeroport']), $_POST['destination_name']);
            $aeroport->addAeroport($aeroport->getLibelle(), $aeroport->getDest());
            echo 'aeroport ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de l\' aeroport '.$ex->getMessage().$_POST['destination_name'];
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
<?php include('../navbar.html'); ?>

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