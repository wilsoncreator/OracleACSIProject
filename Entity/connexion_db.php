<?php
//Paramètres de connexion et initialisation des variables
$host='localhost';
$username='root';
$password='';
$database='aero_bd';
//Définition de la connexion PDO
try {
    //Connexion à la base de données
    $bdd=new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8',$username,$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $erreur) {
    //Affichage des erreurs
    echo "Erreur ! : " . $erreur->getMessage() . "<br/>";
    die();
}
?>