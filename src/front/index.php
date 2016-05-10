<?php

if(!empty($_POST['login']) && !empty($_POST['password']) )
{

    require_once('../../Entity/connexion_db.php');


    $salt = "1897a";
    $reponse_login = $bdd->query('SELECT login FROM utilisateur');
    $reponse_password = $bdd->query('SELECT password FROM utilisateur');
    $IsAuthentified = false;

    while ($donnees = $reponse_login->fetch() AND $donees2 = $reponse_password->fetch())
    {
        if ($_POST['login'] == $donnees['login'] AND $_POST['password'] == $donees2['password'])
        {
            $get_id = $bdd->query('SELECT id_usr FROM utilisateur WHERE login = "'.$_POST['login'].'"');
            $id = $get_id->fetch();
            $isadmin = $bdd->query('SELECT id_usr FROM admin WHERE id_usr = "'.$id['id_usr'].'"');

            if($isadmin->fetch() != null){
                $IsAuthentified = true;
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['admin'] = true;
                header('location: ../admin/admin.php');
                exit();
            }

            else {
                $IsAuthentified = true;
                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['admin'] = false;
                header('location: ../admin/admin.php');
                exit();
            }

        }
    }

    if(!$IsAuthentified){
        //print_r($bdd->errorInfo());
        echo"<span style=\"color: red\">Mauvais login ou mauvais mot de passe</span>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body class="connexion">
<form class="form-signin" method="post" action="">
    <input type="text" class="form-control" placeholder="Login" name="login" required autofocus><br>
    <input type="password" class="form-control" placeholder="Password" name="password" required><br>
    <button class="btn btn-lg btn-primary btn-block" id="button-login" type="submit">Sign in</button>
</form>
</body>
</html>