<?php
require_once('../../Entity/connexion_db.php');
require_once('../../Entity/compagnie.php');
session_start();

if($_SESSION['admin'] == false){
    header('location: ../index.php');
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
            <li class="active"><a href="http://localhost/OracleACSIProject/src/admin/admin.php">Home</a></li>
            <li ><a href="http://localhost/OracleACSIProject/src/admin/destination/ajoutDestination.php">Destination</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/compagnie/ajoutCompagnie.php">Compagnie</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/vol/ajoutVol.php">Vol</a></li>
            <li><a href="http://localhost/OracleACSIProject/src/admin/aeroport/ajoutAeroport.php">Aeroport</a></li>
        </ul>
    </div>
</nav>

<h1>Bienvenue dans l'interface admin</h1>


</body>
</html>
