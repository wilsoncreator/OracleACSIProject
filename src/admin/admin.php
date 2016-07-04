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
    <link rel="stylesheet" type="text/css" href="../../css/aero.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php include('navbar.html'); ?>

<h2>Bienvenue dans l'interface admin</h2>


</body>
</html>
