<?php
require_once('../../Entity/connexion_db.php');
require_once('../../Entity/compagnie.php');
session_start();

if($_SESSION['admin'] == true){
    //echo 'OK';

    if(isset($_POST['compagnie'])){
        try {
           // $req = $bdd->exec("INSERT INTO compagnie (libelle_comp) VALUES ('" . $_POST['compagnie'] . "')");
           // echo 'compagnie ajoutée';
            $compagnie = new Compagnie();
            $compagnie ->addCompagnie($_POST['compagnie']);
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la compagnie' .$ex->getMessage();
        }
    }

    else if(isset($_POST['destination']) && isset($_POST['destination_descr']) && isset($_POST['image']) ){
        try {
            $req = $bdd->exec("INSERT INTO destination (libelle_dest, description_dest, image_dest) VALUES ('" . $_POST['destination'] . "','" . $_POST['destination_descr'] . "','" . $_POST['image'] . "' )");
            echo 'destination ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de la destination' .$ex->getMessage();
        }
    }

    else if(isset($_POST['aeroport']) && isset($_POST['destination_name'])){
        try {
            $req = $bdd->exec("INSERT INTO aeroport (id_dest, libelle_aero) VALUES ('" . $_POST['destination_name'] . "','" . $_POST['aeroport'] . "' )");
            echo 'aeroport ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout de l\' aeroport '.$ex->getMessage().$_POST['destination_name'];
        }
    }

    else if(isset($_POST['prix_vol']) ){
        try {
            $req = $bdd->exec("INSERT INTO vol (prix_vol, date_depart, date_arrivee, nb_places_vol, nb_corresp_vol, id_comp, id_dest, id_aero, id_aero_AEROPORT) VALUES ('" . $_POST['prix_vol'] . "','" . $_POST['date_dep_vol'] . "','" . $_POST['date_arr_vol'] . "','" . $_POST['nbplaces_vol'] . "','" . $_POST['nbcorress_vol'] . "','" . $_POST['compagnie_vol'] . "','" . $_POST['destination_vol'] . "','" . $_POST['aero_dep_vol'] . "','" . $_POST['aero_arr_vol'] . "')");
            echo 'aeroport ajoutée';
        }

        catch(Exception $ex){
            echo 'erreur lors de l\'ajout du vol '.$ex->getMessage().$_POST['aero_dep_vol'].$_POST['aero_arr_vol'];
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="#">Home</a></li>
            <li class="active"><a href="http://localhost/OracleACSIProject/src/admin/admin.php">Destination</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/admin-compagnie.php">Compagnie</a></li>
            <li><a href="#">Page 3</a></li>
        </ul>
    </div>
</nav>
<!-- Ajout de compagnie -->

<form  method="post" action="">
    <h1>Ajouter compagnie</h1>
    <input type="text" class="form-control" placeholder="Nom compagnie" name="compagnie" required><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>

<!-- Ajout de destination -->

<form  method="post" action="">
    <h1>Ajouter Destination</h1>
    <input type="text" class="form-control" placeholder="Nom Destination" name="destination" required><br>
    <textarea class="form-control" name="destination_descr" rows="3" placeholder="Description" required></textarea><br>
    <input type="text" class="form-control" placeholder="src image" name="image" required><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>

<!-- Ajout d'aeroport -->

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

<!-- Ajout de vol -->

<form  method="post" action="">
    <h1>Ajouter Vol</h1>
    <input type="number" step="any" class="form-control" placeholder="Prix du vol" name="prix_vol" required><br>
    <input type="datetime-local" class="form-control" placeholder="Date de départ" name="date_dep_vol" required><br>
    <input type="datetime-local" class="form-control" placeholder="Date d'arrivée" name="date_arr_vol" required><br>
    <input type="number" class="form-control" placeholder="Nombre de places" name="nbplaces_vol" required><br>
    <input type="number" class="form-control" placeholder="Nombre de correspondances" name="nbcorress_vol" required><br>
    <select name="destination_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM destination');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_dest'].">".$data['libelle_dest']."</option>";
        }
        ?>
    </select><br><br>
    <select name="aero_dep_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM aeroport');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_aero'].">".$data['libelle_aero']."</option>";
        }
        ?>
    </select><br><br>

    <select name="aero_arr_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM aeroport');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_aero'].">".$data['libelle_aero']."</option>";
        }
        ?>
    </select><br><br>

    <select name="compagnie_vol" id="sel1" class="form-control">
        <?php

        $list = $bdd->query('SELECT * FROM compagnie');
        while ($data = $list->fetch()) {
            echo "<option value =".$data['id_comp'].">".$data['libelle_comp']."</option>";
        }
        ?>
    </select><br><br>


    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Add</button>
</form>


</body>
</html>
