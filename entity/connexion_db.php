<?php
//Paramètres de connexion

$host='localhost';
$username='root';
$password='';
$database='aero_bd';

//Définition de la connexion PDO

try {

    //Connexion à la base de données
    $db=new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8',$username,$password);
}
catch (PDOException $erreur) {

    //Affichage des erreurs
    echo "Erreur ! : " . $erreur->getMessage() . "<br/>";
    die();
}
?>
