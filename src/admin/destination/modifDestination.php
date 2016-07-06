<?php
require_once('../../../Entity/connexion_db.php');
require_once('../../../Entity/destination.php');
session_start();
$bdd = connexion_db::getInstance();

if($_SESSION['admin'] == true && isset($_GET["destination_id"])) {
    //echo 'OK';

    $modif = $bdd->query("SELECT * FROM destination WHERE id_dest =".$_GET["destination_id"].";");
    $dest = $modif->fetch();

    if(isset($_POST['destination']) && isset($_POST['destination_descr']) && isset($_POST['image']) ){
        try {
            $destination = new destination(addslashes($_POST['destination']), $_POST['image'], addslashes($_POST['destination_descr']));
            $destination->updateDestination($destination->getNom(), $destination->getPhoto(), $destination->getDescription(), $_GET["destination_id"]);
            header("location:destination-liste.php");
        }

        catch(Exception $ex){
            echo 'erreur lors de l\a modification de la destination' .$ex->getMessage();
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

    <?php
    echo("
    <h1>Modifier Destination: ".$dest["libelle_dest"]."</h1>
    <input type=\"text\" class=\"form-control\" placeholder=\"Nom Destination\" name=\"destination\" value=\"".$dest["libelle_dest"]."\" required><br>
    <textarea  class=\"form-control\" name=\"destination_descr\" rows=\"3\" placeholder=\"Description\" required>".$dest["description_dest"]."</textarea><br>
    <input type=\"text\" value=\"".$dest["image_dest"]."\" class=\"form-control\" placeholder=\"src image\" name=\"image\" required><br>
    ");
    ?>



    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Modifier</button>
</form>