<?php
require_once('../../../Entity/connexion_db.php');
require_once('../../../Entity/destination.php');
session_start();

if($_SESSION['admin'] == true) {
    //echo 'OK';

    if(isset($_POST['destination']) && isset($_POST['destination_descr']) && isset($_POST['image']) ){
        try {
            $destination = new destination($_POST['destination'], $_POST['image'], $_POST['destination_descr']);
            $destination->addDestination($destination->getNom(), $destination->getPhoto(), $destination->getDescription());
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la destination' .$ex->getMessage();
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
<?php include('../navbar.html'); ?>


<form  method="post" action="">
    <h1>Ajouter Destination</h1>
    <input type="text" class="form-control" placeholder="Nom Destination" name="destination" required><br>
    <textarea class="form-control" name="destination_descr" rows="3" placeholder="Description" required></textarea><br>
    <input type="text" class="form-control" placeholder="src image" name="image" required><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>