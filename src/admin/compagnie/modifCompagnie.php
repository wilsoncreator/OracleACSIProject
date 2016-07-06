<?php
require_once('../../../Entity/connexion_db.php');
require_once('../../../Entity/compagnie.php');
session_start();
$bdd = connexion_db::getInstance();

if($_SESSION['admin'] == true && isset($_GET["comp_id"])) {
    //echo 'OK';

    $modif = $bdd->query("SELECT * FROM compagnie WHERE id_comp =".$_GET["comp_id"].";");
    $comp = $modif->fetch();

    if(isset($_POST['compagnie'])  && isset($_POST['image']) ){
        try {
            $compagnie = new compagnie(addslashes($_POST['compagnie']), $_POST['image']);
            $compagnie->updatecompagnie($compagnie->getNom(), $compagnie->getLogo(), $_GET["comp_id"]);
            header("location:compagnie-liste.php");
        }

        catch(Exception $ex){
            echo 'erreur lors de l\a modification de la compagnie' .$ex->getMessage();
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
    <h1>Modifier compagnie: ".$comp["libelle_comp"]."</h1>
    <input type=\"text\" class=\"form-control\" placeholder=\"Nom compagnie\" name=\"compagnie\" value=\"".$comp["libelle_comp"]."\" required><br>
    <input type=\"text\" value=\"".$comp["logo_comp"]."\" class=\"form-control\" placeholder=\"src image\" name=\"image\" required><br>
    ");
    ?>



    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Modifier</button>
</form>